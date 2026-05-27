<?php

namespace Database\Seeders;

use App\Models\Expedition;
use App\Models\Media;
use App\Models\OurSherpa;
use App\Models\Post;
use App\Models\Tour;
use App\Models\Trek;
use App\Settings\AboutUsSetting;
use App\Settings\LandingPageSetting;
use App\Settings\PageSetting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

/**
 * Organize all media records into folders by usage.
 *
 * Strategy: walk every place a media_id is referenced (treks, expeditions,
 * peaks, tours, posts, team, settings) and update each Media row with:
 *   - directory   — the folder it logically belongs in
 *   - name        — meaningful slug derived from parent title + role
 *   - alt         — auto-filled alt text from parent (good for SEO)
 *
 * Physical file paths (and therefore URLs) are not changed — this is a
 * metadata-only reorganization. Idempotent: safe to re-run.
 *
 * Orphans (uploaded but never referenced) land in `unsorted/` so Tashi can
 * review and bulk-delete in admin.
 */
class MediaOrganizationSeeder extends Seeder
{
    public function run(): void
    {
        // assignments[mediaId] = ['directory' => 'treks', 'name' => 'foo', 'alt' => 'bar']
        // First match wins — that's why we walk most-specific tables first.
        $assignments = [];

        $this->collectTreks($assignments);
        $this->collectExpeditions($assignments);
        $this->collectTours($assignments);
        $this->collectPosts($assignments);
        $this->collectTeam($assignments);
        $this->collectSettings($assignments);

        // Everything else → unsorted/
        $allMediaIds = Media::query()->pluck('id')->all();
        $orphans = array_diff($allMediaIds, array_keys($assignments));
        foreach ($orphans as $id) {
            $assignments[$id] = [
                'directory' => 'unsorted',
                'name'      => null,
                'alt'       => null,
            ];
        }

        // Apply via direct DB updates — bypasses Curator's MediaObserver
        // which auto-moves physical files when `name` changes. Moving files
        // can corrupt them if multiple records share a target slug. We only
        // want to update metadata; physical files stay where they are.
        $applied = 0;
        foreach ($assignments as $id => $data) {
            $update = ['directory' => $data['directory']];
            if ($data['name']) {
                $update['name'] = $data['name'];
            }
            if ($data['alt']) {
                // Only fill alt if currently blank
                $current = DB::table('media')->where('id', $id)->value('alt');
                if (blank($current)) {
                    $update['alt'] = $data['alt'];
                }
            }
            $changed = DB::table('media')->where('id', $id)->update($update);
            if ($changed) {
                $applied++;
            }
        }

        // Summary
        $byDir = Media::query()
            ->groupBy('directory')
            ->selectRaw('directory, count(*) as c')
            ->orderBy('directory')
            ->get();

        $this->command->info("Media organized: {$applied} records updated");
        $this->command->info('Final folder breakdown:');
        foreach ($byDir as $row) {
            $this->command->info('  ' . str_pad($row->directory ?? '(null)', 18) . $row->c);
        }
    }

    private function record(array &$assignments, ?int $mediaId, string $directory, string $name, string $alt): void
    {
        if (! $mediaId) {
            return;
        }
        if (isset($assignments[$mediaId])) {
            return; // first match wins
        }
        $assignments[$mediaId] = [
            'directory' => $directory,
            'name'      => Str::limit(Str::slug($name), 100, ''),
            'alt'       => $alt,
        ];
    }

    private function collectTreks(array &$assignments): void
    {
        foreach (Trek::query()->get() as $trek) {
            $title = trim((string) $trek->getTranslation('title', 'en', false));
            $slug  = Str::slug($title);

            $this->record($assignments, $trek->cover_image_id,   'treks', "trek-{$slug}-cover",   "{$title} — cover");
            $this->record($assignments, $trek->feature_image_id, 'treks', "trek-{$slug}-feature", "{$title} — feature");

            $gallery = DB::table('media_trek')->where('trek_id', $trek->id)->pluck('media_id');
            foreach ($gallery as $i => $mid) {
                $this->record($assignments, $mid, 'treks', "trek-{$slug}-gallery-" . ($i + 1), "{$title} — gallery photo " . ($i + 1));
            }
        }
    }

    /**
     * Anything below 7000m is treated as a "trekking peak" for media-folder
     * routing (peak-climbing/ vs expeditions/). Was previously sourced from
     * App\Http\Controllers\PeakClimbingController::PEAK_ALTITUDE_CEILING; that
     * controller has been deleted so the value is inlined here.
     */
    private const PEAK_ALTITUDE_CEILING = 7000;

    private function collectExpeditions(array &$assignments): void
    {
        $peakFloor = self::PEAK_ALTITUDE_CEILING;

        foreach (Expedition::query()->get() as $exp) {
            $title = trim((string) $exp->getTranslation('title', 'en', false));
            $slug  = Str::slug($title);

            // Peaks under 8000m go to peak-climbing/, the giants go to expeditions/
            $isPeak = (int) ($exp->highest_altitude ?? 0) < $peakFloor && $exp->highest_altitude !== null;
            $folder = $isPeak ? 'peak-climbing' : 'expeditions';
            $prefix = $isPeak ? 'peak' : 'expedition';

            $this->record($assignments, $exp->cover_image_id,   $folder, "{$prefix}-{$slug}-cover",   "{$title} — cover");
            $this->record($assignments, $exp->feature_image_id, $folder, "{$prefix}-{$slug}-feature", "{$title} — feature");
        }
    }

    private function collectTours(array &$assignments): void
    {
        foreach (Tour::query()->get() as $tour) {
            $title = trim((string) $tour->getTranslation('title', 'en', false));
            $slug  = Str::slug($title);

            $this->record($assignments, $tour->cover_image_id,   'tours', "tour-{$slug}-cover",   "{$title} — cover");
            $this->record($assignments, $tour->feature_image_id, 'tours', "tour-{$slug}-feature", "{$title} — feature");

            $gallery = DB::table('media_tour')->where('tour_id', $tour->id)->pluck('media_id');
            foreach ($gallery as $i => $mid) {
                $this->record($assignments, $mid, 'tours', "tour-{$slug}-gallery-" . ($i + 1), "{$title} — gallery photo " . ($i + 1));
            }
        }
    }

    private function collectPosts(array &$assignments): void
    {
        foreach (Post::query()->get() as $post) {
            $title = trim((string) $post->getTranslation('title', 'en', false));
            $slug  = Str::slug($title);
            $this->record($assignments, $post->cover_image_id, 'posts', "post-{$slug}-cover", "{$title} — cover");
        }
    }

    private function collectTeam(array &$assignments): void
    {
        foreach (OurSherpa::query()->get() as $sherpa) {
            $name = trim((string) ($sherpa->name ?? ''));
            $slug = Str::slug($name) ?: 'team-' . $sherpa->id;
            $this->record($assignments, $sherpa->profile_picture_id, 'team', "team-{$slug}", "{$name} — team photo");
        }
    }

    private function collectSettings(array &$assignments): void
    {
        // PageSetting — section hero images
        $ps = app(PageSetting::class);
        foreach ([
            'trek_page_cover_image_id'        => ['settings', 'page-treks-hero',        'Treks page hero'],
            'expedition_page_cover_image_id'  => ['settings', 'page-expeditions-hero',  'Expeditions page hero'],
            'tour_page_cover_image_id'        => ['settings', 'page-tours-hero',        'Tours page hero'],
            'team_page_cover_image_id'        => ['settings', 'page-team-hero',         'Team page hero'],
        ] as $prop => [$dir, $name, $alt]) {
            try {
                $id = $ps->{$prop} ?? null;
                $this->record($assignments, $id ? (int) $id : null, $dir, $name, $alt);
            } catch (\Throwable $e) {}
        }

        // LandingPageSetting — homepage hero images
        $ls = app(LandingPageSetting::class);
        foreach ([
            'ask_for_animation_image_id'   => 'home-ask-for-animation',
            'expedition_activity_image_id' => 'home-expedition-activity',
            'trek_activity_image_id'       => 'home-trek-activity',
            'tour_activity_image_id'       => 'home-tour-activity',
            'peak_activity_image_id'       => 'home-peak-activity',
            'parallax_image_id'            => 'home-parallax',
        ] as $prop => $name) {
            try {
                $id = $ls->{$prop} ?? null;
                $this->record($assignments, $id ? (int) $id : null, 'settings', $name, 'Homepage hero');
            } catch (\Throwable $e) {}
        }

        // AboutUsSetting
        try {
            $au = app(AboutUsSetting::class);
            $this->record($assignments, $au->cover_image_id ?? null, 'settings', 'about-us-cover', 'About Us cover');
        } catch (\Throwable $e) {}
    }
}
