<?php

namespace Database\Seeders;

use App\Enums\CategoryTypes;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //expedition categories id 1-6
        Category::create([
            'name' => [
                'en' => '8000+',
                'fr' => '8000+',
            ],
            'type' => CategoryTypes::EXPEDITION
        ]);
        Category::create([
            'name' => [
                'en' => '7000+',
                'fr' => '7000+',
            ],
            'type' => CategoryTypes::EXPEDITION
        ]);
        Category::create([
            'name' => [
                'en' => '6000+',
                'fr' => '6000+',
            ],
            'type' => CategoryTypes::EXPEDITION
        ]);
        Category::create([
            'name' => [
                'en' => 'Luxury',
                'fr' => 'Luxury',
            ],
            'type' => CategoryTypes::EXPEDITION
        ]);
        Category::create([
            'name' => [
                'en' => 'Seven Summits',
                'fr' => 'Seven Summits',
            ],
            'type' => CategoryTypes::EXPEDITION
        ]);
        Category::create([
            'name' => [
                'en' => 'Others',
                'fr' => 'Autres',
            ],
            'type' => CategoryTypes::EXPEDITION
        ]);

        //trek categories id 7=11

        Category::create([
            'name' => [
                'en' => 'Everest',
                'fr' => 'Everest',
            ],
            'type' => CategoryTypes::TREK
        ]);
        Category::create([
            'name' => [
                'en' => 'Annapurna',
                'fr' => 'Annapurna',
            ],
            'type' => CategoryTypes::TREK
        ]);
        Category::create([
            'name' => [
                'en' => 'Langtang',
                'fr' => 'Langtang',
            ],
            'type' => CategoryTypes::TREK
        ]);
        Category::create([
            'name' => [
                'en' => 'Other',
                'fr' => 'Autres',
            ],
            'type' => CategoryTypes::TREK
        ]);

        //tour categories id 12 - 17

        Category::create([
            'name' => [
                'en' => 'Sightseeing',
                'fr' => 'Tourisme',
            ],
            'type' => CategoryTypes::TOUR
        ]);
        Category::create([
            'name' => [
                'en' => 'Cycling',
                'fr' => 'Cyclisme',
            ],
            'type' => CategoryTypes::TOUR
        ]);
        Category::create([
            'name' => [
                'en' => 'Running',
                'fr' => 'Course à pied',
            ],
            'type' => CategoryTypes::TOUR
        ]);
        Category::create([
            'name' => [
                'en' => 'Photography',
                'fr' => 'Photographie',
            ],
            'type' => CategoryTypes::TOUR
        ]);
        Category::create([
            'name' => [
                'en' => 'Cultural/Meditation',
                'fr' => 'Culturel',
            ],
            'type' => CategoryTypes::TOUR
        ]);
        Category::create([
            'name' => [
                'en' => 'Others',
                'fr' => 'Autres',
            ],
            'type' => CategoryTypes::TOUR
        ]);
    }
}
