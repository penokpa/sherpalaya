<?php

namespace App\Console\Commands;

use App\Models\Expedition;
use App\Models\Media;
use App\Models\Tour;
use App\Models\Trek;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Find Treks / Expeditions / Tours with missing cover_image_id or
 * feature_image_id and best-effort assign a related Media row from what's
 * already in the library, matching by name slug then by keyword overlap.
 *
 * Dry-run by default. Pass --commit to apply.
 *
 * Match strategy per record, highest score wins:
 *   100 — Media name == "{prefix}{slug}-cover" exactly
 *    90 — Media name == "{slug}-cover"
 *    80 — Media name contains "{slug}-cover"
 *    50 — Media name contains "{slug}"
 *  10/kw — Media name/path contains keyword
 * +10    — name suffix is "-cover"
 * + 5    — name suffix is "-gallery-N" (gallery fallback)
 *
 * Stop-words ("trek", "expedition", "tour", "the", "and", "via", "to",
 * "in", "of", "for") are dropped from keyword scoring so "Everest Base
 * Camp Trek" matches by ["everest","base","camp"], not ["trek"].
 */
class MediaAutoCover extends Command
{
    protected $signature = 'media:auto-cover
        {--commit : Apply assignments. Default is dry-run.}
        {--min-score=40 : Refuse to assign anything scoring lower than this. Lower = more aggressive.}';

    protected $description = 'Best-effort assign missing cover/feature image IDs by matching against available Media';

    private const STOPWORDS = [
        'trek', 'trekking', 'expedition', 'tour', 'climb', 'climbing',
        'the', 'and', 'via', 'with', 'to', 'in', 'of', 'for', 'on', 'at',
        'a', 'an', 'is', 'mt', 'mount',
    ];

    public function handle(): int
    {
        $commit = (bool) $this->option('commit');
        $minScore = (int) $this->option('min-score');

        $targets = [
            ['model' => Trek::class, 'label' => 'Trek', 'prefix' => 'trek-'],
            ['model' => Expedition::class, 'label' => 'Expedition', 'prefix' => 'expedition-'],
            ['model' => Tour::class, 'label' => 'Tour', 'prefix' => 'tour-'],
        ];

        $totalAssigned = 0;
        $totalSkipped = 0;
        $unresolved = [];

        foreach ($targets as $t) {
            $modelClass = $t['model'];
            $records = $modelClass::query()
                ->where(function ($q) {
                    $q->whereNull('cover_image_id')->orWhereNull('feature_image_id');
                })
                ->get();

            if ($records->isEmpty()) {
                continue;
            }

            $this->line('');
            $this->info($t['label'] . " records missing cover/feature: " . $records->count());

            foreach ($records as $rec) {
                $title = $rec->getTranslation('title', 'en');
                $slug = Str::slug($title);
                $keywords = $this->keywords($title);

                $candidates = $this->candidates($keywords);
                $best = $this->pickBest($candidates, $slug, $t['prefix']);

                $coverMissing = is_null($rec->cover_image_id);
                $featureMissing = is_null($rec->feature_image_id);

                if (! $best || $best['score'] < $minScore) {
                    $unresolved[] = "[{$t['label']} #{$rec->id}] {$title}";
                    $totalSkipped += ($coverMissing ? 1 : 0) + ($featureMissing ? 1 : 0);
                    $this->line('  <fg=yellow>?</> #' . $rec->id . ' "' . $title . '" — no confident match'
                        . ($best ? ' (best=#' . $best['media']->id . ' score=' . $best['score'] . ')' : ''));
                    continue;
                }

                $mediaId = $best['media']->id;
                $assignments = [];
                if ($coverMissing) {
                    $assignments['cover_image_id'] = $mediaId;
                    $totalAssigned++;
                }
                if ($featureMissing) {
                    $assignments['feature_image_id'] = $mediaId;
                    $totalAssigned++;
                }

                $this->line('  <fg=green>✓</> #' . $rec->id . ' "' . $title . '"  →  #' . $mediaId
                    . ' (' . $best['media']->name . ', score=' . $best['score'] . ', sets: ' . implode(',', array_keys($assignments)) . ')');

                if ($commit && $assignments) {
                    // Direct DB update so we don't trigger any model save observers
                    // on the parent record.
                    \DB::table($rec->getTable())->where('id', $rec->id)->update($assignments);
                }
            }
        }

        $this->newLine();
        if ($unresolved) {
            $this->warn('Unresolved (' . count($unresolved) . '):');
            foreach ($unresolved as $u) {
                $this->line('  ' . $u);
            }
            $this->newLine();
        }

        $this->info(($commit ? '✓ Applied' : '⚠ Dry-run only') . " — {$totalAssigned} assignments, {$totalSkipped} fields left unresolved.");
        if (! $commit && $totalAssigned > 0) {
            $this->comment('Re-run with --commit to apply.');
        }

        return self::SUCCESS;
    }

    private function keywords(string $title): array
    {
        $words = preg_split('/[\s\-_\/&]+/', Str::lower($title));
        return array_values(array_filter($words, function ($w) {
            return strlen($w) >= 3 && ! in_array($w, self::STOPWORDS, true);
        }));
    }

    /** Pull all Media rows that contain at least one of the keywords anywhere searchable. */
    private function candidates(array $keywords)
    {
        if (! $keywords) {
            return collect();
        }
        $q = Media::query();
        $q->where(function ($outer) use ($keywords) {
            foreach ($keywords as $kw) {
                $outer->orWhere('name', 'LIKE', "%{$kw}%")
                      ->orWhere('path', 'LIKE', "%{$kw}%")
                      ->orWhere('title', 'LIKE', "%{$kw}%");
            }
        });
        return $q->get();
    }

    private function pickBest($candidates, string $slug, string $prefix): ?array
    {
        if ($candidates->isEmpty()) {
            return null;
        }

        $best = null;
        $titleKeywords = $this->keywords($slug);
        if (empty($titleKeywords)) {
            return null;
        }

        foreach ($candidates as $m) {
            $name = (string) $m->name;
            $haystack = $name . ' ' . (string) $m->path . ' ' . (string) $m->title;
            $score = 0;

            // Exact slug presence is the strongest signal.
            if ($name === $prefix . $slug . '-cover') $score += 100;
            elseif ($name === $slug . '-cover') $score += 90;
            elseif (str_contains($name, $slug . '-cover')) $score += 80;
            elseif (str_contains($name, $slug)) $score += 50;

            // Keyword overlap with positional weighting. First word of the title
            // is usually the distinctive noun ("Ama Dablam", "Gokyo", "Annapurna"),
            // so match against it counts ~3x; later words taper off. This stops
            // generic words like "base", "camp", "trek" from out-voting the
            // actually-discriminating proper noun.
            $matched = 0;
            $weightedHits = 0;
            $maxWeight = 0;
            foreach ($titleKeywords as $i => $kw) {
                $weight = max(3 - $i, 1);
                $maxWeight += $weight;
                if (str_contains($haystack, $kw)) {
                    $matched++;
                    $weightedHits += $weight;
                }
            }
            $overlap = $maxWeight > 0 ? $weightedHits / $maxWeight : 0;
            $score += (int) round($overlap * 50);

            // Adjacent-word ("bigram") match — "ama-dablam" inside the media
            // name is much stronger than the two words appearing separately.
            for ($i = 0; $i < count($titleKeywords) - 1; $i++) {
                $bigram = $titleKeywords[$i] . '-' . $titleKeywords[$i + 1];
                if (str_contains($haystack, $bigram)) {
                    $score += 20;
                }
            }

            // Cover-shaped names beat gallery/feature/whatever else.
            if (str_ends_with($name, '-cover')) $score += 15;
            elseif (str_ends_with($name, '-feature')) $score += 10;
            elseif (preg_match('/-gallery-\d+$/', $name)) $score += 5;

            // Penalise generic "page-" / "home-" / "post-" assets — those are
            // for layouts, not for individual trek/expedition covers.
            if (Str::startsWith($name, ['page-', 'home-', 'post-'])) $score -= 30;

            if (! $best || $score > $best['score']) {
                $best = ['media' => $m, 'score' => $score, 'overlap' => $overlap];
            }
        }

        return $best;
    }
}
