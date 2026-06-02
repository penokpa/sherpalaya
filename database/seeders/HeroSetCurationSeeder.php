<?php

namespace Database\Seeders;

use App\Models\Trek;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Demotes the 29 treks that aren't part of the curated "hero set" to draft
 * (published_at = NULL) so only the 26 headline treks surface on the public
 * site. Treks stay in the database — they can be re-published from the
 * admin individually.
 *
 * Idempotent: matches by English title, sets published_at to NULL on the
 * draft set. Re-running has no effect once the demotion has happened.
 * Safe even if some titles drift or get removed — missing matches are
 * silently skipped.
 */
class HeroSetCurationSeeder extends Seeder
{
    /** Treks intentionally kept in draft so only the curated hero set shows publicly. */
    private const DEMOTED_TITLES = [
        // Everest
        'Renjo La Pass Trek',
        'Everest Base Camp via Cho La Pass and Gokyo Lakes',
        'Luxury Everest Base Camp Trek',
        'Pikey Peak Trek',
        'Salleri to Everest Base Camp Trek',
        'Ama Dablam Base Camp Trek',
        // Annapurna
        'Annapurna Excursion',
        'Annapurna Sanctuary Trek',
        'Dhampus / Sarangkot / Chitwan Pack',
        'Annapurna Circuit Trek via Tilicho Lake',
        'Nar Phu Valley and Mesokanto Pass Trek',
        'Australian Camp and Dhampus Trek',
        // Langtang
        'Gosainkunda Trek',
        'Helambu Cultural Trek',
        // Dolpo
        'Phoksundo Tea House Trek',
        'Dolpo to Rara Trek',
        // Mustang
        'Yartung Horse Riding Festival',
        // Kanchenjunga
        'Kanchenjunga North Base Camp Trek',
        'Olangchung Gola Trek',
        // Makalu
        'Sherpani Col Pass Trek',
        'Arun Valley Trek',
        // Rolwaling
        'Lapchi Hermitage Trek',
        // Dhaulagiri
        'Annapurna Dhaulagiri Trek',
        'Gurja Khani Dhorpatan Circuit Trek',
        'Gurja Khani Trek',
        'Trekking in Dhorpatan',
        // Far West Nepal
        'Jumla to Rara Lake Trek',
        'Simikot Raling Monastery Cultural Trek',
        'Short Trek to Rara Lake',
    ];

    public function run(): void
    {
        DB::transaction(function () {
            $ids = Trek::query()
                ->whereIn('title->en', self::DEMOTED_TITLES)
                ->pluck('id');

            if ($ids->isEmpty()) {
                return;
            }

            DB::table('treks')
                ->whereIn('id', $ids)
                ->whereNotNull('published_at')
                ->update(['published_at' => null, 'updated_at' => now()]);
        });
    }
}
