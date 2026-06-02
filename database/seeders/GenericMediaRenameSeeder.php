<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Renames Curator Media rows whose `name` still starts with
 * "whatsapp-image-" (timestamped WhatsApp dumps from the bulk import) to
 * "<region>-NN" so the media library is browseable by region instead of by
 * timestamp.
 *
 * Only the `name` and `title` columns are touched — never the on-disk path.
 * The MediaObserver auto-moves files when a Media model is saved with a
 * changed `name`, so this seeder uses DB::table updates to avoid the move
 * and keep the existing paths/files intact.
 *
 * Idempotent: only rows with name LIKE 'whatsapp-image%' are processed.
 * Once renamed they no longer match the filter, so re-running is a no-op.
 */
class GenericMediaRenameSeeder extends Seeder
{
    /** Region name → slug used for the renamed media `name`. */
    private const REGION_SLUGS = [
        'Langtang, Gosainkunda' => 'langtang',
        'Manaslu' => 'manaslu',
        'Mustang' => 'mustang',
    ];

    public function run(): void
    {
        $mediaIds = DB::table('media')
            ->where('name', 'like', 'whatsapp-image%')
            ->orderBy('id')
            ->pluck('id');

        if ($mediaIds->isEmpty()) {
            return;
        }

        $byRegion = array_fill_keys(array_keys(self::REGION_SLUGS), []);

        foreach ($mediaIds as $mid) {
            $region = $this->regionForMedia($mid);
            if ($region !== null && isset($byRegion[$region])) {
                $byRegion[$region][] = $mid;
            }
        }

        foreach ($byRegion as $regionName => $ids) {
            $slug = self::REGION_SLUGS[$regionName];
            foreach ($ids as $i => $mid) {
                $newName = sprintf('%s-%02d', $slug, $i + 1);
                DB::table('media')
                    ->where('id', $mid)
                    ->update([
                        'name' => $newName,
                        'title' => $newName,
                        'updated_at' => now(),
                    ]);
            }
        }
    }

    /** Find the single region a given media id is attached to via treks/expeditions, or null. */
    private function regionForMedia(int $mediaId): ?string
    {
        $trekRegions = DB::table('media_trek')
            ->join('treks', 'treks.id', '=', 'media_trek.trek_id')
            ->join('regions', 'regions.id', '=', 'treks.region_id')
            ->where('media_trek.media_id', $mediaId)
            ->pluck('regions.name');

        $expRegions = DB::table('expedition_media')
            ->join('expeditions', 'expeditions.id', '=', 'expedition_media.expedition_id')
            ->join('regions', 'regions.id', '=', 'expeditions.region_id')
            ->where('expedition_media.media_id', $mediaId)
            ->pluck('regions.name');

        return $trekRegions->merge($expRegions)->unique()->first();
    }
}
