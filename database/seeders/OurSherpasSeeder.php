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
        // Fetch related models
        $expeditions = Expedition::limit(3)->get();

        // Ensure related models exist
        if ($expeditions->count() < 3) {
            return;
        }

        $sherpa1 = [
                'name' => 'Tenzing Norgay',
                'title' => 'Legendary Mountaineer',
                'description' => [
                    'en' => 'One of the first climbers to reach the summit of Mount Everest.',
                    'fr' => 'L\'un des premiers alpinistes à atteindre le sommet du mont Everest.',
                ],
        ];
        $sherpa = OurSherpa::create($sherpa1);

        CuratorSeederHelper::seedBelongsTo(
            $sherpa,
            'profile_picture_id',
            public_path('photos/oursherpa1.jpg')
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


        foreach ($expeditions as $index => $expedition) {
            $sherpa->expeditions()->attach($expedition->id, ['order' => $index + 1]);
        }
        // Define two sherpas manually
        $oursherpa2 = [
                'name' => 'Kami Rita Sherpa',
                'title' => 'Everest Record Holder',
                'description' => [
                    'en' => 'Holds the record for the most Everest summits.',
                    'fr' => 'Détient le record du plus grand nombre de sommets de l\'Everest.',
                ],
        ];
        $sherpa = OurSherpa::create($oursherpa2);

        CuratorSeederHelper::seedBelongsTo(
            $sherpa,
            'profile_picture_id',
            public_path('photos/oursherpa2.jpeg')
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


        foreach ($expeditions as $index => $expedition) {
            $sherpa->expeditions()->attach($expedition->id, ['order' => $index + 1]);
        }
        
    }
}
