<?php

namespace Database\Seeders;

use App\Models\Expedition;
use App\Models\Media;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

/**
 * Some Everest expedition tiers (Premium, Luxury, North) were given covers
 * uploaded via the Filament admin that referenced UUID-named files which
 * never made it to production storage. Their cover_image_id is non-null, so
 * media:auto-cover skips them, but the file behind it is missing on disk —
 * the public site renders a broken image.
 *
 * This seeder detects expeditions whose current cover file is missing and
 * re-points them at the Standard Everest expedition's cover (which is
 * uploaded via the regular bulk-import / RegionalMediaSeeder pipeline).
 *
 * Idempotent: only touches expeditions whose current cover file is missing.
 */
class BrokenEverestExpeditionCoversSeeder extends Seeder
{
    public function run(): void
    {
        $stdMediaId = Media::where('name', 'like', '%mt-everest-expedition-standard%')
            ->value('id');

        if (! $stdMediaId) {
            $this->command?->warn('Standard Everest cover media not found; skipping.');
            return;
        }

        $expeditions = Expedition::query()
            ->where(function ($q) {
                $q->where('title->en', 'like', 'Mt. Everest Expedition%Premium')
                    ->orWhere('title->en', 'like', 'Mt. Everest Expedition%Luxury')
                    ->orWhere('title->en', 'like', 'Mt. Everest Expedition%North');
            })
            ->get();

        $updated = 0;
        foreach ($expeditions as $e) {
            if (! $this->coverIsBroken($e)) {
                continue;
            }

            DB::table('expeditions')
                ->where('id', $e->id)
                ->update([
                    'cover_image_id' => $stdMediaId,
                    'feature_image_id' => $stdMediaId,
                    'updated_at' => now(),
                ]);
            $updated++;
        }

        $this->command?->info("Fixed {$updated} broken Everest expedition cover(s).");
    }

    private function coverIsBroken(Expedition $e): bool
    {
        if (! $e->cover_image_id) {
            return true;
        }
        $cover = Media::find($e->cover_image_id);
        if (! $cover) {
            return true;
        }

        return ! Storage::disk('public')->exists($cover->path);
    }
}
