<?php

namespace Database\Seeders;

use App\Helpers\CuratorSeederHelper;
use App\Models\Expedition;
use App\Models\OurSherpa;
use App\Models\Peak;
use App\Models\Tour;
use App\Models\Trek;
use Illuminate\Database\Seeder;

class OurSherpasSeeder extends Seeder
{
    public function run(): void
    {
        $sherpa1 = [
            'name' => 'Mr. Pemba Sherpa',
            'title' => [
                'en' => 'Elite High-Altitude Mountain Guide',
                'fr' => 'Guide de Montagne d\'Élite en Haute Altitude',
            ],
            'language' => [
                'Nepali',
                'English',
                'French',
            ],
            'experience' => [
                "Mt. Kamet x1",
                "Mt. Makalu 2 x1",
                "Mt. Mustagh Ata x1",
                "Mt. Kula Kangri x1",
                "Mt. Gimmigela x1",
                "Mt. Ratna Chuli x1",
                "Mt. Mont Blanc x2",
                "Mt. Mont Rose x1",
                "Mt. Matterhorn x1"
            ],
            'description' => [
                'en' => 'Mr. Pemba Sherpa is a world-renowned mountaineer and trekking guide from Solukhumbu, Nepal, with an extraordinary record of summiting some of the planet’s highest and most challenging peaks. Born on September 4, 1971, in Taksindu Hewa-6, he has conquered Mount Everest an impressive seven times, alongside other formidable mountains such as Makalu, Cho Oyu (five times), Dhaulagiri, and Manaslu. His expertise extends beyond Nepal to peaks like Shisha Pangma in Tibet, Gasherbrum in Pakistan, and Mont Blanc in France, showcasing his versatility and skill across diverse terrains. With over two decades of experience as a freelance mountain guide, Pemba’s fluency in Nepali, English, and French enhances his ability to lead international expeditions, making him a trusted and legendary figure in the global mountaineering community.',
                'fr' => 'M. Pemba Sherpa est un alpiniste et guide de trekking de renommée mondiale, originaire de Solukhumbu, au Népal, avec un palmarès exceptionnel de sommets parmi les plus hauts et les plus difficiles de la planète. Né le 4 septembre 1971 à Taksindu Hewa-6, il a gravi le mont Everest à sept reprises, ainsi que d’autres sommets impressionnants tels que Makalu, Cho Oyu (cinq fois), Dhaulagiri et Manaslu. Son expertise s’étend au-delà du Népal, avec des ascensions comme Shisha Pangma au Tibet, Gasherbrum au Pakistan et le Mont Blanc en France, démontrant sa polyvalence et son talent sur divers terrains. Avec plus de deux décennies d’expérience en tant que guide de montagne indépendant, la maîtrise du népalais, de l’anglais et du français par Pemba renforce sa capacité à diriger des expéditions internationales, faisant de lui une figure légendaire et respectée dans la communauté mondiale de l’alpinisme.',
            ],
        ];
        $sherpa = OurSherpa::create($sherpa1);

        $expeditions = [
            ['expedition_id' => 1, 'count' => 7],
            ['expedition_id' => 6, 'count' => 1],  // Mt. Makalu Expedition
            ['expedition_id' => 7, 'count' => 5],  // Mt. Cho-Oyu Expedition
            ['expedition_id' => 8, 'count' => 1],  // Mt. Dhaulagiri Expedition
            ['expedition_id' => 9, 'count' => 1],
            ['expedition_id' => 14, 'count' => 1],
            ['expedition_id' => 15, 'count' => 2],
            ['expedition_id' => 22, 'count' => 1],
        ];
        foreach ($expeditions as $index => $expedition) {
            if ($expedition['count'] > 0) {
                $sherpa->expeditions()->attach($expedition['expedition_id'], [
                    'count' => $expedition['count'],
                    'order' => $index + 1,
                ]);
            }
        }
        CuratorSeederHelper::seedBelongsTo(
            $sherpa,
            'profile_picture_id',
            public_path('photos/pemba.jpeg')
        );
        CuratorSeederHelper::seedBelongsToMany(
            $sherpa,
            'awardsAndCertificates',
            public_path('photos/culture.jpg')
        );
        CuratorSeederHelper::seedBelongsToMany(
            $sherpa,
            'awardsAndCertificates',
            public_path('photos/culture2.jpg')
        );
        CuratorSeederHelper::seedBelongsToMany(
            $sherpa,
            'awardsAndCertificates',
            public_path('photos/culture3.jpg')
        );
        // Define two sherpas manually
        $sherpa2 = [
            'name' => 'Mr. Tashi Palzor Sherpa',
            'title' => [
                'en' => 'Multifaceted Mountaineer and Social Entrepreneur',
                'fr' => 'Alpiniste Polyvalent et Entrepreneur Social',
            ],
            'language' => [
                'Nepali',
                'English',
                'French',
            ],
            'experience' => [
                "Manages an import business for outdoor gear from China",
                "Led financial and logistic operations at Khumbu Shangrila Nepal Trek Pvt. Ltd",
                "Conducted socio-economic surveys in Gajeda and Kohalpur",
                "Trained in psychosocial counseling at Richmond Fellowship Nepal",
                "Organized teacher training and advocacy programs for Humanitarian Trust",
                "Completed Disaster Risk Reduction training for fieldwork safety",
            ],
            'description' => [
                'en' => 'Mr. Tashi Palzor Sherpa is a versatile leader blending mountaineering prowess with social entrepreneurship. With a Master’s in Social Work from St. Xavier College and a Bachelor’s in Business Studies from Campion College, he excels in both academic and practical realms. He spearheads Sherpalaya Trek, a thriving trekking and expedition company, while also running Sherpa Kitchen, a restaurant in Pokhara that celebrates Sherpa heritage. His career spans roles like Program Officer at Mountain Spirit Nepal, where he oversaw project budgets, and District Project Officer at Concern Worldwide, where he championed community development. A skilled communicator fluent in Nepali, English, and French, Tashi has led treks across Nepal’s diverse trails as a certified guide. His expertise in project management, honed at GIZ’s INCLUDE, and his knack for photography and design make him a standout figure in Nepal’s adventure and social impact scenes.',
                'fr' => 'M. Tashi Palzor Sherpa est un leader polyvalent alliant prouesses en alpinisme et entrepreneuriat social. Titulaire d’une maîtrise en travail social du St. Xavier College et d’une licence en études commerciales du Campion College, il excelle dans les domaines académique et pratique. Il dirige Sherpalaya Trek, une entreprise florissante de trekking et d’expéditions, tout en gérant Sherpa Kitchen, un restaurant à Pokhara célébrant l’héritage sherpa. Sa carrière inclut des postes tels que chargé de programme chez Mountain Spirit Nepal, où il gérait les budgets de projets, et officier de projet de district chez Concern Worldwide, où il défendait le développement communautaire. Communicateur habile maîtrisant le népalais, l’anglais et le français, Tashi a guidé des treks sur les sentiers variés du Népal en tant que guide certifié. Son expertise en gestion de projets, affinée chez GIZ’s INCLUDE, et son talent pour la photographie et le design le distinguent dans les domaines de l’aventure et de l’impact social au Népal.',
            ],
        ];

        $sherpa = OurSherpa::create($sherpa2);

        CuratorSeederHelper::seedBelongsTo(
            $sherpa,
            'profile_picture_id',
            public_path('photos/tashi.jpeg')
        );
        CuratorSeederHelper::seedBelongsToMany(
            $sherpa,
            'awardsAndCertificates',
            public_path('photos/tashi2.jpeg')
        );
        CuratorSeederHelper::seedBelongsToMany(
            $sherpa,
            'awardsAndCertificates',
            public_path('photos/tashi3.jpeg')
        );
        CuratorSeederHelper::seedBelongsToMany(
            $sherpa,
            'awardsAndCertificates',
            public_path('photos/tashi4.jpeg')
        );

    }
}
