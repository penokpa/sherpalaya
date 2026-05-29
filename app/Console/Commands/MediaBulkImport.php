<?php

namespace App\Console\Commands;

use App\Models\Expedition;
use App\Models\Media;
use App\Models\Region;
use App\Models\Tour;
use App\Models\Trek;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * Imports a folder of images into the Media library and wires each one to
 * its parent record automatically. Designed for a clean-slate reupload
 * after media:wipe.
 *
 * Expected folder layout:
 *
 *   import/
 *     everest/                              ← region slug
 *       region.jpg                          → Region.cover_image_id
 *       everest-base-camp-trek.jpg          → matching Trek's cover + feature
 *       gokyo-lake-trek.jpg
 *       mt-everest-expedition.jpg           → matching Expedition's cover + feature
 *       <anything-else>.jpg                 → attached to every Trek + Expedition
 *                                             in the region as gallery media
 *     tours/                                ← top-level, not region-tied
 *       cultural-tour-of-bhaktapur.jpg      → matching Tour's cover + feature
 *     settings/
 *       page-treks-hero.jpg                 → page.trek_page_cover_image_id
 *       home-parallax.jpg                   → landing_page.parallax_image_id
 *       (see SETTING_MAP below for the full list)
 *
 * Region folder name is loose-matched: "langtang" matches "Langtang,
 * Gosainkunda" because Str::contains is used, not exact slug equality.
 *
 * Dry-run by default. --commit applies.
 */
class MediaBulkImport extends Command
{
    protected $signature = 'media:bulk-import
        {path : Folder to import from}
        {--commit : Actually import and wire references. Default is dry-run.}';

    protected $description = 'Import a folder of images and auto-link them to treks / expeditions / tours / regions / settings by filename';

    /** filename slug (sans extension) → settings name. Extend as needed. */
    private const SETTING_MAP = [
        'page-trek-hero'              => 'trek_page_cover_image_id',
        'page-treks-hero'             => 'trek_page_cover_image_id',
        'page-expedition-hero'        => 'expedition_page_cover_image_id',
        'page-expeditions-hero'       => 'expedition_page_cover_image_id',
        'page-tour-hero'              => 'tour_page_cover_image_id',
        'page-tours-hero'             => 'tour_page_cover_image_id',
        'page-team-hero'              => 'team_page_cover_image_id',
        'home-parallax'               => 'parallax_image_id',
        'home-ask-for-animation'      => 'ask_for_animation_image_id',
        'landing-expedition-activity' => 'expedition_activity_image_id',
        'landing-trek-activity'       => 'trek_activity_image_id',
        'landing-tour-activity'       => 'tour_activity_image_id',
        'landing-peak-activity'       => 'peak_activity_image_id',
        'contact-cover'               => 'cover_image_id',
        'contact-us-cover'            => 'cover_image_id',
        'about-cover'                 => 'cover_image_id',
        'about-us-cover'              => 'cover_image_id',
    ];

    public function handle(): int
    {
        $root = $this->argument('path');
        if (! is_dir($root)) {
            $this->error("Folder not found: {$root}");
            return self::FAILURE;
        }
        $root = rtrim(realpath($root), '/');
        $commit = (bool) $this->option('commit');

        $this->info("Importing from: {$root}" . ($commit ? '' : ' (dry-run)'));
        $this->newLine();

        $stats = ['uploaded' => 0, 'covered' => 0, 'galleried' => 0, 'settings' => 0, 'unmatched' => 0, 'orphans' => []];

        foreach (scandir($root) as $entry) {
            if ($entry === '.' || $entry === '..') {
                continue;
            }
            $full = $root . '/' . $entry;
            if (! is_dir($full)) {
                continue;
            }

            $folder = Str::slug($entry);
            $this->line("<fg=cyan>── {$folder}/</>");

            if ($folder === 'tours') {
                $this->handleTours($full, $commit, $stats);
            } elseif ($folder === 'settings') {
                $this->handleSettings($full, $commit, $stats);
            } else {
                $this->handleRegion($folder, $full, $commit, $stats);
            }

            $this->newLine();
        }

        $this->info(($commit ? '✓ Applied' : '⚠ Dry-run only'));
        $this->line('  Uploaded:        ' . $stats['uploaded']);
        $this->line('  Cover assigned:  ' . $stats['covered']);
        $this->line('  Gallery attached: ' . $stats['galleried']);
        $this->line('  Settings set:    ' . $stats['settings']);
        $this->line('  Unmatched files: ' . count($stats['orphans']));

        if ($stats['orphans']) {
            $this->newLine();
            $this->warn('Unmatched files (uploaded to library but no parent record):');
            foreach ($stats['orphans'] as $o) {
                $this->line('  ' . $o);
            }
        }

        if (! $commit) {
            $this->newLine();
            $this->comment('Re-run with --commit to apply.');
        }

        return self::SUCCESS;
    }

    /** Region subfolder: figure out which region this is, then dispatch each file. */
    private function handleRegion(string $folderSlug, string $path, bool $commit, array &$stats): void
    {
        $region = $this->matchRegion($folderSlug);
        if (! $region) {
            $this->warn("  ? no region matches '{$folderSlug}' — files in this folder will be uploaded but not linked");
        } else {
            $this->line("  region: <fg=green>{$region->name}</> (#{$region->id})");
        }

        $treks = $region ? Trek::where('region_id', $region->id)->get() : collect();
        $expeditions = $region ? Expedition::where('region_id', $region->id)->get() : collect();

        foreach ($this->files($path) as $file) {
            $slug = Str::slug(pathinfo($file, PATHINFO_FILENAME));

            // 1) Region cover
            if (in_array($slug, ['region', 'region-cover', $folderSlug, $folderSlug . '-cover'], true)) {
                $media = $this->upload($file, $commit, $stats);
                if ($region && $media && $commit) {
                    DB::table('regions')->where('id', $region->id)->update(['cover_image_id' => $media->id]);
                }
                $this->line('  → region cover: ' . basename($file));
                $stats['covered']++;
                continue;
            }

            // 2) Trek cover (slug match)
            $trek = $treks->first(fn ($t) => Str::slug($t->getTranslation('title', 'en')) === $slug);
            if ($trek) {
                $media = $this->upload($file, $commit, $stats);
                if ($media && $commit) {
                    DB::table('treks')->where('id', $trek->id)->update([
                        'cover_image_id' => $media->id,
                        'feature_image_id' => $media->id,
                    ]);
                }
                $this->line('  → Trek "' . $trek->getTranslation('title', 'en') . '" cover+feature: ' . basename($file));
                $stats['covered']++;
                continue;
            }

            // 3) Expedition cover (slug match)
            $exp = $expeditions->first(fn ($e) => Str::slug($e->getTranslation('title', 'en')) === $slug);
            if ($exp) {
                $media = $this->upload($file, $commit, $stats);
                if ($media && $commit) {
                    DB::table('expeditions')->where('id', $exp->id)->update([
                        'cover_image_id' => $media->id,
                        'feature_image_id' => $media->id,
                    ]);
                }
                $this->line('  → Expedition "' . $exp->getTranslation('title', 'en') . '" cover+feature: ' . basename($file));
                $stats['covered']++;
                continue;
            }

            // 4) Anything else → gallery for every trek + expedition in this region
            $media = $this->upload($file, $commit, $stats);
            if ($media && $commit) {
                $order = (int) (microtime(true) * 1000) % 1000;
                foreach ($treks as $t) {
                    DB::table('media_trek')->insert([
                        'trek_id' => $t->id,
                        'media_id' => $media->id,
                        'order' => $order,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
                foreach ($expeditions as $e) {
                    DB::table('expedition_media')->insert([
                        'expedition_id' => $e->id,
                        'media_id' => $media->id,
                        'order' => $order,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
            $count = $treks->count() + $expeditions->count();
            $this->line('  → gallery for ' . $count . ' records in region: ' . basename($file));
            $stats['galleried'] += $count;
        }
    }

    /** tours/ subfolder: file slug must match a Tour title slug. */
    private function handleTours(string $path, bool $commit, array &$stats): void
    {
        $tours = Tour::all();
        foreach ($this->files($path) as $file) {
            $slug = Str::slug(pathinfo($file, PATHINFO_FILENAME));
            $tour = $tours->first(fn ($t) => Str::slug($t->getTranslation('title', 'en')) === $slug);
            $media = $this->upload($file, $commit, $stats);

            if ($tour) {
                if ($media && $commit) {
                    DB::table('tours')->where('id', $tour->id)->update([
                        'cover_image_id' => $media->id,
                        'feature_image_id' => $media->id,
                    ]);
                }
                $this->line('  → Tour "' . $tour->getTranslation('title', 'en') . '" cover+feature: ' . basename($file));
                $stats['covered']++;
            } else {
                $stats['orphans'][] = "tours/" . basename($file) . " — no Tour titled to match slug '{$slug}'";
                $stats['unmatched']++;
                $this->line('  <fg=yellow>?</> ' . basename($file) . ' — no Tour matches');
            }
        }
    }

    /** settings/ subfolder: file slug must be in SETTING_MAP. */
    private function handleSettings(string $path, bool $commit, array &$stats): void
    {
        foreach ($this->files($path) as $file) {
            $slug = Str::slug(pathinfo($file, PATHINFO_FILENAME));
            $key = self::SETTING_MAP[$slug] ?? null;
            $media = $this->upload($file, $commit, $stats);

            if (! $key) {
                $stats['orphans'][] = "settings/" . basename($file) . " — no settings entry mapped to '{$slug}' (see SETTING_MAP)";
                $stats['unmatched']++;
                $this->line('  <fg=yellow>?</> ' . basename($file) . ' — slug not in SETTING_MAP');
                continue;
            }

            $row = DB::table('settings')->where('name', $key)->first();
            if (! $row) {
                $stats['orphans'][] = "settings/" . basename($file) . " — settings.name='{$key}' row does not exist";
                $stats['unmatched']++;
                $this->line('  <fg=yellow>?</> ' . basename($file) . ' — settings row missing');
                continue;
            }

            if ($media && $commit) {
                DB::table('settings')->where('id', $row->id)->update(['payload' => json_encode((string) $media->id)]);
            }
            $this->line('  → settings ' . $row->group . '.' . $key . ': ' . basename($file));
            $stats['settings']++;
        }
    }

    /** Match a folder name to a Region by best-effort substring containment. */
    private function matchRegion(string $folderSlug): ?Region
    {
        $regions = Region::all();
        // exact slug match wins
        foreach ($regions as $r) {
            if (Str::slug($r->name) === $folderSlug) {
                return $r;
            }
        }
        // first-word / substring fallback ("langtang" → "Langtang, Gosainkunda")
        foreach ($regions as $r) {
            $rs = Str::slug($r->name);
            if (str_starts_with($rs, $folderSlug) || str_starts_with($folderSlug, $rs)) {
                return $r;
            }
        }
        return null;
    }

    /** Return sorted list of image files in a directory (top level only). */
    private function files(string $dir): array
    {
        $files = [];
        foreach (scandir($dir) ?: [] as $f) {
            if ($f === '.' || $f === '..') {
                continue;
            }
            $full = $dir . '/' . $f;
            if (is_file($full) && preg_match('/\.(jpe?g|png|webp|gif|svg)$/i', $f)) {
                $files[] = $full;
            }
        }
        sort($files);
        return $files;
    }

    /** Copy a source file into the public media disk and create a Media row. */
    private function upload(string $srcPath, bool $commit, array &$stats): ?Media
    {
        $stats['uploaded']++;
        if (! $commit) {
            return null;
        }

        $ext = pathinfo($srcPath, PATHINFO_EXTENSION);
        $slug = Str::slug(pathinfo($srcPath, PATHINFO_FILENAME));
        $relPath = 'media/' . $slug . '.' . strtolower($ext);

        // If a row with this slug already exists (re-run), reuse it.
        $existing = Media::where('name', $slug)->first();
        if ($existing) {
            return $existing;
        }

        Storage::disk('public')->put($relPath, file_get_contents($srcPath));

        $info = @getimagesize($srcPath) ?: [null, null, null];
        $media = Media::create([
            'disk' => 'public',
            'directory' => 'media',
            'visibility' => 'public',
            'name' => $slug,
            'path' => $relPath,
            'title' => $slug,
            'width' => $info[0] ?? null,
            'height' => $info[1] ?? null,
            'size' => filesize($srcPath) ?: null,
            'type' => mime_content_type($srcPath) ?: null,
            'ext' => strtolower($ext),
        ]);

        return $media;
    }
}
