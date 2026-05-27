<?php

namespace Database\Seeders;

use App\Models\Expedition;
use App\Models\Media;
use App\Models\Tour;
use App\Models\Trek;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

/**
 * Seeds the regional cover & gallery images imported during the May 2026
 * content sprint.
 *
 * Source files live in database/seeders/assets/media/ (committed). At seed
 * time, files are copied into storage/app/public/media/ and a Media row is
 * upserted by `name`. Attachments are matched by the parent record's
 * English title so the seeder is portable across environments where
 * Trek/Expedition/Tour IDs may differ.
 *
 * Idempotent: re-running on a populated DB will skip files & rows that
 * already exist and pivots that already link. Safe to run on production
 * after each new image batch.
 */
class RegionalMediaSeeder extends Seeder
{
    public function run(): void
    {
        $manifestPath = base_path('database/seeders/assets/media-manifest.json');

        if (! file_exists($manifestPath)) {
            $this->command?->error('Manifest not found: '.$manifestPath);
            return;
        }

        $manifest = json_decode(file_get_contents($manifestPath), true);
        if (! is_array($manifest)) {
            $this->command?->error('Manifest is not a valid JSON array.');
            return;
        }

        $disk = Storage::disk('public');
        $assetsDir = base_path('database/seeders/assets/media');

        $imported = 0;
        $attached = 0;
        $skippedFile = 0;
        $skippedAttach = 0;
        $missingParent = [];

        foreach ($manifest as $row) {
            $srcAsset = $assetsDir . '/' . $row['filename'];
            if (! file_exists($srcAsset)) {
                $this->command?->warn("Asset missing: {$row['filename']} — skipping {$row['name']}");
                continue;
            }

            $relPath = 'media/' . $row['filename'];

            // Ensure file is on the public disk
            if (! $disk->exists($relPath)) {
                $disk->put($relPath, file_get_contents($srcAsset));
            }

            // Upsert the Media row by `name` (slug)
            $media = Media::query()->where('name', $row['name'])->first();
            if (! $media) {
                $media = Media::create([
                    'disk'        => 'public',
                    'directory'   => 'media',
                    'visibility'  => 'public',
                    'name'        => $row['name'],
                    'path'        => $relPath,
                    'width'       => $row['width'],
                    'height'      => $row['height'],
                    'size'        => $row['size'],
                    'type'        => $row['type'],
                    'ext'         => $row['ext'],
                    'title'       => $row['title'],
                    'alt'         => $row['alt'],
                    'description' => $row['description'],
                ]);
                $imported++;
            } else {
                $skippedFile++;
            }

            foreach ($row['attach'] ?? [] as $a) {
                $parent = $this->findParent($a['kind'], $a['match']);
                if (! $parent) {
                    $missingParent[] = "{$a['kind']}:{$a['match']}";
                    continue;
                }

                if ($a['as'] === 'cover') {
                    if ($parent->cover_image_id !== $media->id) {
                        $parent->cover_image_id = $media->id;
                        $parent->feature_image_id = $media->id;
                        $parent->save();
                        $attached++;
                    } else {
                        $skippedAttach++;
                    }
                } else {
                    // gallery — insert pivot row if not present
                    $pivot = $this->galleryPivot($a['kind']);
                    $fk    = $this->galleryFk($a['kind']);
                    $exists = DB::table($pivot)
                        ->where($fk, $parent->id)
                        ->where('media_id', $media->id)
                        ->exists();
                    if (! $exists) {
                        $order = DB::table($pivot)->where($fk, $parent->id)->max('order') ?? 0;
                        DB::table($pivot)->insert([
                            $fk          => $parent->id,
                            'media_id'   => $media->id,
                            'order'      => $order + 1,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                        $attached++;
                    } else {
                        $skippedAttach++;
                    }
                }
            }
        }

        $this->command?->info("RegionalMediaSeeder done.");
        $this->command?->info("  media imported: $imported  |  existing skipped: $skippedFile");
        $this->command?->info("  attachments made: $attached  |  already-linked skipped: $skippedAttach");
        if ($missingParent) {
            $missing = array_unique($missingParent);
            $this->command?->warn('  parents not found: '.implode(', ', array_slice($missing, 0, 15)).(count($missing) > 15 ? ' …+'.(count($missing) - 15).' more' : ''));
        }
    }

    private function findParent(string $kind, string $englishTitle): ?Model
    {
        $cls = match ($kind) {
            'trek'       => Trek::class,
            'expedition' => Expedition::class,
            'tour'       => Tour::class,
            default      => null,
        };
        if (! $cls) return null;

        // Match by EN title in the translatable JSON column.
        // Filter in PHP for portability across SQLite (used here) and MySQL —
        // SQLite ships without JSON_UNQUOTE and JSON_EXTRACT semantics differ
        // slightly between drivers. The number of treks/expeditions/tours is
        // small enough that loading + filtering in memory is trivial.
        return $cls::query()
            ->where('title', 'like', '%'.str_replace("'", "''", $englishTitle).'%')
            ->get()
            ->first(fn ($m) => $m->getTranslation('title', 'en', false) === $englishTitle);
    }

    private function galleryPivot(string $kind): string
    {
        return $kind === 'expedition' ? 'expedition_media' : 'media_trek';
    }

    private function galleryFk(string $kind): string
    {
        return $kind === 'expedition' ? 'expedition_id' : 'trek_id';
    }
}
