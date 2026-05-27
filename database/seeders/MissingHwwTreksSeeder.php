<?php

namespace Database\Seeders;

use App\Enums\CategoryType;
use App\Enums\TrekDifficulty;
use App\Models\Category;
use App\Models\Region;
use App\Models\Trek;
use Illuminate\Database\Seeder;

/**
 * Create placeholder records for HWW treks Sherpalaya doesn't have yet.
 *
 * Each new trek is created as a DRAFT (published_at = null), so nothing
 * appears on the public site until Tashi reviews and publishes.
 *
 * Required fields get sensible placeholders. Description is intentionally
 * brief — Tashi expands it in the admin once he has time.
 *
 * Idempotent: skip if a trek with the same English title already exists.
 */
class MissingHwwTreksSeeder extends Seeder
{
    public function run(): void
    {
        $fallbackCategoryId = Category::query()
            ->where('type', CategoryType::TREK)
            ->orderBy('id')
            ->value('id');

        $created = 0;
        $skipped = 0;

        foreach ($this->treks() as $data) {
            if ($this->trekExists($data['title'])) {
                $skipped++;
                continue;
            }

            $region = Region::query()->where('name', $data['region'])->first();
            if (! $region) {
                $this->command->warn("  region not found: {$data['region']} (skipping {$data['title']})");
                continue;
            }

            Trek::create([
                'title'              => $data['title'],
                'description'        => $data['description'] ?? $this->placeholderDescription($data['title']),
                'duration'           => $data['duration'],
                'region_id'          => $region->id,
                'category_id'        => $fallbackCategoryId,
                'is_featured'        => false,
                'starting_point'     => $data['starting_point'] ?? 'Kathmandu',
                'ending_point'       => $data['ending_point'] ?? 'Kathmandu',
                'best_time_for_trek' => $data['season'] ?? 'March–May · September–November',
                'starting_altitude'  => $data['start_alt'] ?? 1400,
                'highest_altitude'   => $data['max_alt'],
                'trek_difficulty'    => $data['difficulty'] ?? TrekDifficulty::MODERATE->value,
                // Empty translatable arrays — Spatie expects {"en":[]} not {"en":"[]"}
                'costs_include'      => ['en' => [], 'fr' => []],
                'costs_exclude'      => ['en' => [], 'fr' => []],
                'price_from'         => $data['price'] ?? null,
                'published_at'       => null, // DRAFT — Tashi publishes when content is ready
            ]);

            $created++;
        }

        $this->command->info("Missing-HWW treks: {$created} created (drafts), {$skipped} already existed");
    }

    private function trekExists(string $title): bool
    {
        $needle = mb_strtolower(trim($title));
        foreach (Trek::query()->get() as $trek) {
            $candidate = mb_strtolower(trim((string) $trek->getTranslation('title', 'en', false)));
            if ($candidate === $needle) {
                return true;
            }
        }
        return false;
    }

    private function placeholderDescription(string $title): string
    {
        return '<p>Full itinerary and trip notes for the ' . e($title) . ' are being prepared. Contact us for the complete route overview, day-by-day breakdown, and pricing details — we run this trek with experienced Sherpa guides and small group sizes.</p>';
    }

    /**
     * All HWW treks not currently in Sherpalaya.
     */
    private function treks(): array
    {
        return [
            // ─── Everest ───────────────────────────────────────────────────
            [
                'title'    => 'Pikey Peak Trek',
                'region'   => 'Everest',
                'duration' => '9 days',
                'max_alt'  => 4065,
                'price'    => 550,
                'difficulty' => TrekDifficulty::EASY->value,
            ],
            [
                'title'    => 'Salleri to Everest Base Camp Trek',
                'region'   => 'Everest',
                'duration' => '14 days',
                'max_alt'  => 5364,
                'price'    => 1100,
            ],
            [
                'title'    => 'Ama Dablam Base Camp Trek',
                'region'   => 'Everest',
                'duration' => '9 days',
                'max_alt'  => 4570,
                'price'    => 1175,
            ],
            [
                'title'    => 'Everest Base Camp Trek with Island Peak Climbing',
                'region'   => 'Everest',
                'duration' => '16 days',
                'max_alt'  => 6189,
                'price'    => 2200,
                'difficulty' => TrekDifficulty::CHALLENGING->value,
            ],

            // ─── Annapurna ─────────────────────────────────────────────────
            [
                'title'    => 'Annapurna Circuit Trek via Tilicho Lake',
                'region'   => 'Annapurna',
                'duration' => '16 days',
                'max_alt'  => 5416,
                'price'    => 1250,
                'difficulty' => TrekDifficulty::CHALLENGING->value,
            ],
            [
                'title'    => 'Nar Phu Valley and Mesokanto Pass Trek',
                'region'   => 'Annapurna',
                'duration' => '18 days',
                'max_alt'  => 5099,
                'price'    => 1650,
                'difficulty' => TrekDifficulty::CHALLENGING->value,
            ],
            [
                'title'    => 'Australian Camp and Dhampus Trek',
                'region'   => 'Annapurna',
                'duration' => '4 days',
                'max_alt'  => 2060,
                'price'    => 240,
                'difficulty' => TrekDifficulty::EASY->value,
            ],

            // ─── Langtang, Gosainkunda ─────────────────────────────────────
            [
                'title'    => 'Gosainkunda Trek',
                'region'   => 'Langtang, Gosainkunda',
                'duration' => '8 days',
                'max_alt'  => 4380,
                'price'    => 750,
            ],
            [
                'title'    => 'Helambu Cultural Trek',
                'region'   => 'Langtang, Gosainkunda',
                'duration' => '8 days',
                'max_alt'  => 3650,
                'price'    => 540,
                'difficulty' => TrekDifficulty::EASY->value,
            ],

            // ─── Dolpo ─────────────────────────────────────────────────────
            [
                'title'    => 'Phoksundo Tea House Trek',
                'region'   => 'Dolpo',
                'duration' => '11 days',
                'max_alt'  => 3733,
                'price'    => 1320,
            ],
            [
                'title'    => 'Lower Dolpo Circuit Trek',
                'region'   => 'Dolpo',
                'duration' => '18 days',
                'max_alt'  => 5360,
                'price'    => 2900,
                'difficulty' => TrekDifficulty::HARD->value,
            ],
            [
                'title'    => 'Upper Dolpo to Mustang Trek',
                'region'   => 'Dolpo',
                'duration' => '25 days',
                'max_alt'  => 5550,
                'price'    => 3900,
                'difficulty' => TrekDifficulty::CHALLENGING->value,
            ],
            [
                'title'    => 'Dolpo to Rara Trek',
                'region'   => 'Dolpo',
                'duration' => '25 days',
                'max_alt'  => 5115,
                'price'    => null, // HWW shows "no price"
                'difficulty' => TrekDifficulty::CHALLENGING->value,
            ],

            // ─── Mustang ───────────────────────────────────────────────────
            [
                'title'    => 'Tiji Festival in Upper Mustang',
                'region'   => 'Mustang',
                'duration' => '17 days',
                'max_alt'  => 3800,
                'price'    => 2500,
            ],
            [
                'title'    => 'Yartung Horse Riding Festival',
                'region'   => 'Mustang',
                'duration' => '17 days',
                'max_alt'  => 3800,
                'price'    => 2200,
            ],

            // ─── Kanchenjunga ──────────────────────────────────────────────
            [
                'title'    => 'Kanchenjunga North Base Camp Trek',
                'region'   => 'Kanchenjunga',
                'duration' => '16 days',
                'max_alt'  => 5143,
                'price'    => 1850,
                'difficulty' => TrekDifficulty::HARD->value,
            ],
            [
                'title'    => 'Kanchenjunga South Base Camp Trek',
                'region'   => 'Kanchenjunga',
                'duration' => '13 days',
                'max_alt'  => 4730,
                'price'    => 1950,
                'difficulty' => TrekDifficulty::HARD->value,
            ],
            [
                'title'    => 'Olangchung Gola Trek',
                'region'   => 'Kanchenjunga',
                'duration' => '17 days',
                'max_alt'  => 5160,
                'price'    => 2500,
                'difficulty' => TrekDifficulty::HARD->value,
            ],

            // ─── Makalu ────────────────────────────────────────────────────
            [
                'title'    => 'Makalu Base Camp Trek',
                'region'   => 'Makalu',
                'duration' => '14 days',
                'max_alt'  => 4870,
                'price'    => 2150,
                'difficulty' => TrekDifficulty::HARD->value,
            ],
            [
                'title'    => 'Sherpani Col Pass Trek',
                'region'   => 'Makalu',
                'duration' => '23 days',
                'max_alt'  => 6135,
                'price'    => 2900,
                'difficulty' => TrekDifficulty::CHALLENGING->value,
            ],
            [
                'title'    => 'Arun Valley Trek',
                'region'   => 'Makalu',
                'duration' => '16 days',
                'max_alt'  => 4250,
                'price'    => 1500,
            ],

            // ─── Rolwaling ─────────────────────────────────────────────────
            [
                'title'    => 'Rolwaling Tashi Lapcha Trek',
                'region'   => 'Rolwaling',
                'duration' => '19 days',
                'max_alt'  => 5755,
                'price'    => 2100,
                'difficulty' => TrekDifficulty::CHALLENGING->value,
            ],
            [
                'title'    => 'Lapchi Hermitage Trek',
                'region'   => 'Rolwaling',
                'duration' => '8 days',
                'max_alt'  => 3600,
                'price'    => 1040,
            ],

            // ─── Dhaulagiri ────────────────────────────────────────────────
            [
                'title'    => 'Dhaulagiri Circuit Trek',
                'region'   => 'Dhaulagiri',
                'duration' => '18 days',
                'max_alt'  => 5360,
                'price'    => 2600,
                'difficulty' => TrekDifficulty::CHALLENGING->value,
            ],
            [
                'title'    => 'Gurja Khani Dhorpatan Circuit Trek',
                'region'   => 'Dhaulagiri',
                'duration' => '14 days',
                'max_alt'  => 4100,
                'price'    => 1050,
            ],
            [
                'title'    => 'Gurja Khani Trek',
                'region'   => 'Dhaulagiri',
                'duration' => '12 days',
                'max_alt'  => 3700,
                'price'    => 890,
            ],
            [
                'title'    => 'Trekking in Dhorpatan',
                'region'   => 'Dhaulagiri',
                'duration' => '15 days',
                'max_alt'  => 4500,
                'price'    => 1550,
            ],

            // ─── Far West Nepal ────────────────────────────────────────────
            [
                'title'    => 'Limi Valley Trek',
                'region'   => 'Far West Nepal',
                'duration' => '22 days',
                'max_alt'  => 4960,
                'price'    => 4300,
                'difficulty' => TrekDifficulty::HARD->value,
            ],
            [
                'title'    => 'Jumla to Rara Lake Trek',
                'region'   => 'Far West Nepal',
                'duration' => '12 days',
                'max_alt'  => 3700,
                'price'    => 2250,
            ],
            [
                'title'    => 'Simikot Raling Monastery Cultural Trek',
                'region'   => 'Far West Nepal',
                'duration' => '11 days',
                'max_alt'  => 4100,
                'price'    => 2400,
            ],
            [
                'title'    => 'Rara Lake Circuit Trek',
                'region'   => 'Far West Nepal',
                'duration' => '15 days',
                'max_alt'  => 3700,
                'price'    => 2600,
            ],
            [
                'title'    => 'Short Trek to Rara Lake',
                'region'   => 'Far West Nepal',
                'duration' => '7 days',
                'max_alt'  => 3000,
                'price'    => 1250,
                'difficulty' => TrekDifficulty::EASY->value,
            ],
        ];
    }
}
