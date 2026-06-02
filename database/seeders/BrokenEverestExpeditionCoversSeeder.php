<?php

namespace Database\Seeders;

use App\Models\Expedition;
use App\Models\Media;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Some Everest expedition tiers (Premium, Luxury, North) carried
 * cover_image_ids that referenced UUID-named files uploaded via the
 * Filament admin which never reached production storage — the public
 * site rendered broken thumbnails. media:auto-cover skipped them
 * because cover_image_id was non-null.
 *
 * Re-points the broken covers at whatever cover the Standard Everest
 * expedition is currently using (which lives in the bulk-import /
 * RegionalMediaSeeder pipeline and is verified working).
 *
 * Idempotent: only touches expeditions whose current cover file is
 * missing from disk.
 */
class BrokenEverestExpeditionCoversSeeder extends Seeder
{
    public function run(): void
    {
        $standard = $this->findEverestExpedition(['standard']);

        if (! $standard || ! $standard->cover_image_id) {
            $this->command?->warn('Standard Everest expedition cover not found; skipping.');
            return;
        }

        $sourceCoverId = $standard->cover_image_id;
        $targets = Expedition::all()->filter(function (Expedition $e) {
            $title = $this->englishTitle($e);
            if (stripos($title, 'everest') === false) {
                return false;
            }
            return stripos($title, 'premium') !== false
                || stripos($title, 'luxury') !== false
                || stripos($title, 'north') !== false;
        });

        $updated = 0;
        foreach ($targets as $e) {
            if (! $this->coverIsBroken($e)) {
                continue;
            }

            DB::table('expeditions')
                ->where('id', $e->id)
                ->update([
                    'cover_image_id' => $sourceCoverId,
                    'feature_image_id' => $sourceCoverId,
                    'updated_at' => now(),
                ]);
            $updated++;
        }

        $this->command?->info("Fixed {$updated} broken Everest expedition cover(s).");
    }

    private function findEverestExpedition(array $mustContain): ?Expedition
    {
        return Expedition::all()->first(function (Expedition $e) use ($mustContain) {
            $title = $this->englishTitle($e);
            if (stripos($title, 'everest') === false) {
                return false;
            }
            foreach ($mustContain as $needle) {
                if (stripos($title, $needle) === false) {
                    return false;
                }
            }
            return true;
        });
    }

    private function englishTitle(Expedition $e): string
    {
        $raw = $e->getAttributes()['title'] ?? '';
        $decoded = is_string($raw) ? json_decode($raw, true) : $raw;

        return is_array($decoded) ? ($decoded['en'] ?? '') : (string) $raw;
    }

    private function coverIsBroken(Expedition $e): bool
    {
        if (! $e->cover_image_id) {
            return true;
        }
        $media = Media::find($e->cover_image_id);
        if (! $media) {
            return true;
        }

        return ! file_exists(public_path('storage/'.$media->path));
    }
}
