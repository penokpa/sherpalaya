<?php

namespace Database\Seeders;

use App\Enums\CategoryType;
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
            'type' => CategoryType::EXPEDITION
        ]);
        Category::create([
            'name' => [
                'en' => '7000+',
                'fr' => '7000+',
            ],
            'type' => CategoryType::EXPEDITION
        ]);
        Category::create([
            'name' => [
                'en' => '6000+',
                'fr' => '6000+',
            ],
            'type' => CategoryType::EXPEDITION
        ]);
        Category::create([
            'name' => [
                'en' => 'Luxury',
                'fr' => 'Luxury',
            ],
            'type' => CategoryType::EXPEDITION
        ]);
        Category::create([
            'name' => [
                'en' => 'Seven Summits',
                'fr' => 'Seven Summits',
            ],
            'type' => CategoryType::EXPEDITION
        ]);
        Category::create([
            'name' => [
                'en' => 'Others',
                'fr' => 'Autres',
            ],
            'type' => CategoryType::EXPEDITION
        ]);

        //trek categories id 7=11

        Category::create([
            'name' => [
                'en' => 'Everest',
                'fr' => 'Everest',
            ],
            'type' => CategoryType::TREK
        ]);
        Category::create([
            'name' => [
                'en' => 'Annapurna',
                'fr' => 'Annapurna',
            ],
            'type' => CategoryType::TREK
        ]);
        Category::create([
            'name' => [
                'en' => 'Langtang',
                'fr' => 'Langtang',
            ],
            'type' => CategoryType::TREK
        ]);
        Category::create([
            'name' => [
                'en' => 'Other',
                'fr' => 'Autres',
            ],
            'type' => CategoryType::TREK
        ]);

        //tour categories id 12 - 17

        Category::create([
            'name' => [
                'en' => 'Sightseeing',
                'fr' => 'Tourisme',
            ],
            'type' => CategoryType::TOUR
        ]);
        Category::create([
            'name' => [
                'en' => 'Cycling',
                'fr' => 'Cyclisme',
            ],
            'type' => CategoryType::TOUR
        ]);
        Category::create([
            'name' => [
                'en' => 'Running',
                'fr' => 'Course à pied',
            ],
            'type' => CategoryType::TOUR
        ]);
        Category::create([
            'name' => [
                'en' => 'Photography',
                'fr' => 'Photographie',
            ],
            'type' => CategoryType::TOUR
        ]);
        Category::create([
            'name' => [
                'en' => 'Cultural/Meditation',
                'fr' => 'Culturel',
            ],
            'type' => CategoryType::TOUR
        ]);
        Category::create([
            'name' => [
                'en' => 'Services',
                'fr' => 'Services',
            ],
            'type' => CategoryType::TOUR
        ]);
        Category::create([
            'name' => [
                'en' => 'Others',
                'fr' => 'Autres',
            ],
            'type' => CategoryType::TOUR
        ]);
    }
}
