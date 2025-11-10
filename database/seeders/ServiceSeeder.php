<?php

namespace Database\Seeders;

use App\Helpers\CuratorSeederHelper;
use App\Models\Destination;
use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $helicopter = [
            'title' => [
                'en' => 'Emergency Helicopter Rescue Service',
                'fr' => 'Service de secours héliporté d\'urgence',
            ],
            'description' => [
                'en' => 'Explore traditional and contemporary Nepali art at the Patan Museum. A must-visit event for art lovers.',
                'fr' => 'Explorez l\'art népalais traditionnel et contemporain au musée de Patan. Un événement incontournable pour les amateurs d\'art.',
            ],
            'cover_image_id' => null,
            'location' => ['lat' => 27.6622, 'lng' => 85.3240],
        ];
        $serv = Service::create($helicopter);
        $serv->destinations()->sync(
            Destination::where('region_id', 2)
                ->inRandomOrder()

                ->limit(1)
                ->get()
                ->pluck('id')
                ->toArray()
        );

        CuratorSeederHelper::seedBelongsTo(
            $serv,
            'cover_image_id',
            public_path('photos/services.jpg')
        );
        CuratorSeederHelper::seedBelongsToMany(
            $serv,
            'images',
            public_path('photos/service.jpg')
        );
        CuratorSeederHelper::seedBelongsToMany(
            $serv,
            'images',
            public_path('photos/servicehelicopter.jpg')
        );
        $trekkingshop = [
            'title' => [
                'en' => 'Recommended Trekking Gear Shops',
                'fr' => 'Magasins de matériel de trekking recommandés',
            ],
            'description' => [
                'en' => 'Get high-quality trekking gear at our recommended shop in Thamel. Trusted by seasoned trekkers.',
                'fr' => 'Procurez-vous du matériel de trekking de haute qualité dans notre magasin recommandé à Thamel. Approuvé par des trekkeurs expérimentés.',
            ],
            'cover_image_id' => null,
            'location' => ['lat' => 27.7109, 'lng' => 85.3000],
        ];

        $serv = Service::create($trekkingshop);
        $serv->destinations()->sync(
            Destination::where('region_id', 2)
                ->inRandomOrder()

                ->limit(3)
                ->get()
                ->pluck('id')
                ->toArray()
        );

        CuratorSeederHelper::seedBelongsTo(
            $serv,
            'cover_image_id',
            public_path('photos/trekkingshop1.jpg')
        );
        CuratorSeederHelper::seedBelongsToMany(
            $serv,
            'images',
            public_path('photos/trekkingshop2.webp')
        );
        CuratorSeederHelper::seedBelongsToMany(
            $serv,
            'images',
            public_path('photos/mountain2.jpg')
        );

        $rentals = [
            'title' => [
                'en' => 'Adventure Gear Rentals',
                'fr' => 'Location de matériel d\'aventure',
            ],
            'description' => [
                'en' => 'Rent adventure gear like paragliding equipment, bikes, and kayaks for your Pokhara adventures.',
                'fr' => 'Louez du matériel d\'aventure comme de l\'équipement de parapente, des vélos et des kayaks pour vos aventures à Pokhara.',
            ],
            'cover_image_id' => null,
            'location' => ['lat' => 28.2090, 'lng' => 83.9856],
        ];
        $serv = Service::create($rentals);
        $serv->destinations()->sync(
            Destination::where('region_id', 2)
                ->inRandomOrder()

                ->limit(3)
                ->get()
                ->pluck('id')
                ->toArray()
        );

        CuratorSeederHelper::seedBelongsTo(
            $serv,
            'cover_image_id',
            public_path('photos/trekkingshop1.jpg')
        );
        CuratorSeederHelper::seedBelongsToMany(
            $serv,
            'images',
            public_path('photos/trekkingshop2.webp')
        );
        CuratorSeederHelper::seedBelongsToMany(
            $serv,
            'images',
            public_path('photos/mountain2.jpg')
        );
        $photography = [
            'title' => [
                'en' => 'Photography Workshops',
                'fr' => 'Ateliers de photographie',
            ],
            'description' => [
                'en' => 'Join photography workshops that teach you how to capture the stunning landscapes and culture of the Annapurna region.',
                'fr' => 'Participez à des ateliers de photographie qui vous apprendront à capturer les paysages et la culture époustouflants de la région de l\'Annapurna.',
            ],
            'cover_image_id' => null,
            'location' => ['lat' => 28.4581, 'lng' => 83.8389],
        ];
        $serv = Service::create($photography);
        $serv->destinations()->sync(
            Destination::where('region_id', 2)
                ->inRandomOrder()
                ->limit(1)
                ->get()
                ->pluck('id')
                ->toArray()
        );

        CuratorSeederHelper::seedBelongsTo(
            $serv,
            'cover_image_id',
            public_path('photos/temple.jpg')
        );
        CuratorSeederHelper::seedBelongsToMany(
            $serv,
            'images',
            public_path('photos/culture3.jpg')
        );
        CuratorSeederHelper::seedBelongsToMany(
            $serv,
            'images',
            public_path('photos/culture2.jpg')
        );

    }
}
