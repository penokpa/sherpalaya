<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Seeder;

/**
 * Write original descriptions for the 11 trekking regions, set slugs, and
 * order them to match HWW's display order. Voice matches the trek content
 * seeder — Sherpa-owned, honest, practical.
 *
 * Idempotent: re-running updates descriptions, sort order, and slugs.
 */
class RegionContentSeeder extends Seeder
{
    public function run(): void
    {
        $applied = 0;
        $missing = [];

        foreach ($this->regions() as $idx => $data) {
            $region = Region::query()->where('name', $data['name'])->first();
            if (! $region) {
                $missing[] = $data['name'];
                continue;
            }
            $region->slug = $data['slug'];
            $region->description = $data['description'];
            $region->sort_order = $idx + 1;
            $region->save();
            $applied++;
        }

        $this->command->info("Region content: {$applied} updated");
        if ($missing) {
            $this->command->warn('  not found: ' . implode(', ', $missing));
        }
    }

    /**
     * Order matches HWW's trekking page exactly.
     */
    private function regions(): array
    {
        return [
            [
                'name'        => 'Everest',
                'slug'        => 'everest',
                'description' => 'The most famous trekking region in Nepal — and for good reason. Home to the world\'s highest peaks, the Sherpa heartland, and the trail to Everest Base Camp. Routes here range from week-long viewpoint walks (Pikey Peak, Everest Panorama) to month-long traverses across three high passes. Tea-house accommodation throughout the Khumbu, with flight access via Lukla.',
            ],
            [
                'name'        => 'Annapurna',
                'slug'        => 'annapurna',
                'description' => 'Nepal\'s most diverse trekking region. The Annapurna massif rises directly behind Pokhara, and its trails climb through every ecosystem the country has to offer — subtropical jungle, terraced rice paddies, pine forest, alpine desert. Includes the iconic Annapurna Circuit (Thorong La), Annapurna Sanctuary, and the lesser-known Nar Phu valleys to the north.',
            ],
            [
                'name'        => 'Mustang',
                'slug'        => 'mustang',
                'description' => 'A walled medieval kingdom in the rain shadow north of the Annapurnas. Upper Mustang requires a restricted-area permit (USD 500 per 10 days), which has preserved its Tibetan Buddhist culture in a way no other part of Nepal can match. Best visited during the Tiji festival in May or in late summer when the rest of Nepal is under monsoon.',
            ],
            [
                'name'        => 'Langtang, Gosainkunda',
                'slug'        => 'langtang-gosainkunda',
                'description' => 'The closest trekking region to Kathmandu, reachable by jeep without a flight. The Langtang Valley sits between Tibet and the Helambu hills, with the sacred lakes of Gosainkunda climbing to 4,380 m. A good region for trekkers who have limited time or want to avoid the Lukla flight lottery, but with serious mountain views once you climb past Kyanjin Gompa.',
            ],
            [
                'name'        => 'Manaslu',
                'slug'        => 'manaslu',
                'description' => 'The Manaslu Circuit is, in our opinion, what the Annapurna Circuit used to be twenty years ago — quieter, less commercialised, more committing. Restricted-area permit, minimum group of two, no solo trekking. Crosses the Larkya La pass (5,106 m) under the eighth-highest mountain in the world. We send our repeat clients here.',
            ],
            [
                'name'        => 'Kanchenjunga',
                'slug'        => 'kanchenjunga',
                'description' => 'The third-highest mountain in the world sits in Nepal\'s far east, bordering Sikkim. Treks here are long, remote, and committing. Restricted-area permit required. Trails climb through Kanchenjunga Conservation Area — snow-leopard habitat with some of the most intact primary forest in Nepal — to North and South Base Camp viewpoints.',
            ],
            [
                'name'        => 'Dolpo',
                'slug'        => 'dolpo',
                'description' => 'A high desert plateau in north-western Nepal, in the rain shadow of Dhaulagiri. Phoksundo Lake is the entry point; beyond it, Upper Dolpo requires a restricted-area permit and full camping logistics. This is the Nepal Peter Matthiessen wrote about in <em>The Snow Leopard</em> — Tibetan-rooted villages, monasteries five centuries old, walking among yak caravans.',
            ],
            [
                'name'        => 'Rolwaling',
                'slug'        => 'rolwaling',
                'description' => 'A small Sherpa valley east of the Khumbu, with one major foot route — the Tashi Lapcha pass (5,755 m) connecting Rolwaling to Thame in the Everest region. Restricted-area permit required. The valley holds Tsho Rolpa, one of the largest glacial lakes in Nepal. Demanding terrain, very few trekkers.',
            ],
            [
                'name'        => 'Dhaulagiri',
                'slug'        => 'dhaulagiri',
                'description' => 'The seventh-highest mountain in the world. Treks here range from the full Dhaulagiri Circuit (an 18-day expedition route crossing two passes above 5,000 m) to gentler explorations of the Gurja Khani and Dhorpatan valleys to the south. Camping logistics required on the high circuit; tea houses possible on the lower routes.',
            ],
            [
                'name'        => 'Makalu',
                'slug'        => 'makalu',
                'description' => 'The fifth-highest mountain in the world, in remote eastern Nepal. The Barun Valley approach is roadless and helicopter-only past the lower villages, protected as the Makalu-Barun National Park. The technical Sherpani Col route connects Makalu Base Camp to the Mera Peak region for trekkers wanting a true expedition.',
            ],
            [
                'name'        => 'Far West Nepal',
                'slug'        => 'far-west-nepal',
                'description' => 'Humla, Mugu, Jumla — the least-visited districts of Nepal, with cultures and landscapes that feel closer to western Tibet than to the rest of the country. Rara Lake (the largest lake in Nepal) and the remote Limi Valley are the highlights. Most routes require flying via Nepalgunj. Monsoon-friendly because the region sits in the Trans-Himalayan rain shadow.',
            ],
        ];
    }
}
