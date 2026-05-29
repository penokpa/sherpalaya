<?php

namespace App\Console\Commands;

use App\Models\Media;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

/**
 * Find byte-identical Media records (same SHA-256 hash) and consolidate them:
 * for each duplicate group, pick a canonical record and repoint every FK and
 * pivot row to it, then delete the redundant rows and files.
 *
 * Repoints use DB::table updates, NOT Eloquent saves — the MediaObserver shipped
 * by Curator auto-moves files when a Media is saved, which would corrupt unrelated
 * records. Deletes use Media::delete() so file-cleanup observers can fire.
 *
 * Dry-run by default. Pass --commit to actually apply changes.
 */
class MediaDedupe extends Command
{
    protected $signature = 'media:dedupe
        {--commit : Apply changes. Default is dry-run.}';

    protected $description = 'Consolidate byte-identical Media records into one canonical row each';

    /**
     * Every place a Media id can be referenced. Update this if you add a new
     * relation that points at media.
     */
    private const FK_REFERENCES = [
        ['table' => 'treks', 'column' => 'cover_image_id'],
        ['table' => 'treks', 'column' => 'feature_image_id'],
        ['table' => 'expeditions', 'column' => 'cover_image_id'],
        ['table' => 'expeditions', 'column' => 'feature_image_id'],
        ['table' => 'tours', 'column' => 'cover_image_id'],
        ['table' => 'tours', 'column' => 'feature_image_id'],
        ['table' => 'posts', 'column' => 'cover_image_id'],
        ['table' => 'categories', 'column' => 'cover_image_id'],
        ['table' => 'regions', 'column' => 'cover_image_id'],
        ['table' => 'services', 'column' => 'cover_image_id'],
    ];

    private const PIVOT_TABLES = [
        'media_trek',
        'media_tour',
        'expedition_media',
        'destination_media',
        'awards_and_certificates_media',
        'media_service',
    ];

    public function handle(): int
    {
        $commit = (bool) $this->option('commit');

        $missingHash = Media::whereNull('hash')->count();
        if ($missingHash > 0) {
            $this->warn("⚠ {$missingHash} Media records have no hash — they'll be skipped. Re-run the add_hash_to_media migration or save them to recompute.");
        }

        $groups = DB::table('media')
            ->whereNotNull('hash')
            ->select('hash', DB::raw('COUNT(*) as c'))
            ->groupBy('hash')
            ->having('c', '>', 1)
            ->get();

        if ($groups->isEmpty()) {
            $this->info('No byte-duplicate Media found. Nothing to do.');
            return self::SUCCESS;
        }

        $totalFreed = 0;
        $totalDeleted = 0;
        $totalRepoints = 0;

        foreach ($groups as $g) {
            $rows = Media::where('hash', $g->hash)
                ->orderBy('id')
                ->get(['id', 'name', 'path', 'size', 'disk']);

            // Score by inbound references — canonical is the most-referenced row
            // (tie broken by lowest id, i.e. oldest).
            $scored = $rows->map(function ($m) {
                return ['model' => $m, 'refs' => $this->countReferences($m->id)];
            })->sortByDesc(fn ($x) => [$x['refs'], -$x['model']->id])->values();

            $canonical = $scored[0]['model'];
            $redundant = $scored->slice(1)->pluck('model');

            $this->line('');
            $this->line('<fg=cyan>hash=' . substr($g->hash, 0, 12) . '</>  size=' . number_format($canonical->size) . 'B  ' . $rows->count() . ' copies');
            $this->line('  <fg=green>canonical</>: #' . $canonical->id . ' (' . $scored[0]['refs'] . ' refs) ' . $canonical->path);

            foreach ($redundant as $r) {
                $refsForR = $this->countReferences($r->id);
                $this->line('  <fg=yellow>redundant</>: #' . $r->id . ' (' . $refsForR . ' refs) ' . $r->path);
                $repointed = $this->repoint($r->id, $canonical->id, $commit);
                $totalRepoints += $repointed;
                if ($repointed > 0) {
                    $this->line('     ↳ repointed ' . $repointed . ' reference(s) ' . $canonical->id);
                }
                $totalFreed += (int) $r->size;
                $totalDeleted++;
                if ($commit) {
                    // Use the Eloquent delete so Curator's file-cleanup observer can fire.
                    Media::find($r->id)?->delete();
                    $this->line('     ↳ <fg=red>deleted</> Media #' . $r->id);
                } else {
                    $this->line('     ↳ would delete Media #' . $r->id . ' (dry-run)');
                }
            }
        }

        $this->newLine();
        $this->info(($commit ? '✓ Applied' : '⚠ Dry-run only') . " — {$totalDeleted} duplicate records, "
            . number_format($totalFreed / 1024 / 1024, 2) . ' MB, '
            . $totalRepoints . ' reference(s) repointed.');
        if (! $commit) {
            $this->comment('Re-run with --commit to apply.');
        }

        return self::SUCCESS;
    }

    /** Count inbound references (FK + pivot + settings) for a Media id. */
    private function countReferences(int $id): int
    {
        $n = 0;
        foreach (self::FK_REFERENCES as $ref) {
            if (! \Schema::hasTable($ref['table']) || ! \Schema::hasColumn($ref['table'], $ref['column'])) {
                continue;
            }
            $n += DB::table($ref['table'])->where($ref['column'], $id)->count();
        }
        foreach (self::PIVOT_TABLES as $pivot) {
            if (! \Schema::hasTable($pivot)) {
                continue;
            }
            $n += DB::table($pivot)->where('media_id', $id)->count();
        }
        $n += $this->settingsReferencingMedia($id)->count();
        return $n;
    }

    /** Settings rows whose name ends in image_id and whose payload decodes to $id. */
    private function settingsReferencingMedia(int $id)
    {
        if (! \Schema::hasTable('settings')) {
            return collect();
        }
        return DB::table('settings')
            ->where('name', 'LIKE', '%image_id%')
            ->where('payload', json_encode((string) $id))
            ->orWhere(function ($q) use ($id) {
                $q->where('name', 'LIKE', '%image_id%')
                  ->where('payload', json_encode($id));
            })
            ->get();
    }

    /** Repoint every reference from $from to $to. Returns rows updated. */
    private function repoint(int $from, int $to, bool $commit): int
    {
        $count = 0;
        foreach (self::FK_REFERENCES as $ref) {
            if (! \Schema::hasTable($ref['table']) || ! \Schema::hasColumn($ref['table'], $ref['column'])) {
                continue;
            }
            $q = DB::table($ref['table'])->where($ref['column'], $from);
            $hits = $q->count();
            if ($hits > 0 && $commit) {
                $q->update([$ref['column'] => $to]);
            }
            $count += $hits;
        }
        foreach (self::PIVOT_TABLES as $pivot) {
            if (! \Schema::hasTable($pivot)) {
                continue;
            }
            $q = DB::table($pivot)->where('media_id', $from);
            $hits = $q->count();
            if ($hits > 0 && $commit) {
                // Avoid creating duplicate pivot rows: delete any pivot row pointing at
                // $to with the same parent that's about to collide.
                $parentCol = $this->guessParentColumn($pivot);
                if ($parentCol) {
                    $colliding = DB::table($pivot)
                        ->where('media_id', $from)
                        ->whereIn($parentCol, function ($sub) use ($pivot, $parentCol, $to) {
                            $sub->select($parentCol)->from($pivot)->where('media_id', $to);
                        })
                        ->pluck('id');
                    if ($colliding->isNotEmpty()) {
                        DB::table($pivot)->whereIn('id', $colliding)->delete();
                    }
                }
                DB::table($pivot)->where('media_id', $from)->update(['media_id' => $to]);
            }
            $count += $hits;
        }
        // Settings rows
        $settingsHits = $this->settingsReferencingMedia($from);
        if ($settingsHits->isNotEmpty() && $commit) {
            DB::table('settings')
                ->whereIn('id', $settingsHits->pluck('id'))
                ->update(['payload' => json_encode((string) $to)]);
        }
        $count += $settingsHits->count();
        return $count;
    }

    private function guessParentColumn(string $pivot): ?string
    {
        $candidates = ['trek_id', 'tour_id', 'expedition_id', 'destination_id', 'our_sherpa_id', 'service_id'];
        foreach ($candidates as $c) {
            if (\Schema::hasColumn($pivot, $c)) {
                return $c;
            }
        }
        return null;
    }
}
