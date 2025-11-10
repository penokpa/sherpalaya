<?php

namespace Database\Seeders;


use App\Helpers\CuratorSeederHelper;
use App\Models\Category;
use App\Models\Destination;
use App\Models\Region;
use App\Models\Tour;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tours = [
            [
                'title' => [
                    'en' => 'Kathmandu Valley Sightseeing Tour',
                    'fr' => 'Visite touristique de la vallée de Katmandou',
                ],
                'description' => [
                    'en' => 'Explore the cultural and historical sites of Kathmandu, including UNESCO World Heritage Sites like Swayambhunath (Monkey Temple), Pashupatinath Temple, Boudhanath Stupa, and Patan Durbar Square.',
                    'fr' => 'Explorez les sites culturels et historiques de Katmandou, notamment les sites classés au patrimoine mondial de l\'UNESCO tels que Swayambhunath (temple des singes), le temple de Pashupatinath, le stupa de Boudhanath et la place Durbar de Patan.',
                ],
                'duration' => '2 hours',
                'category_id' => Category::find(11)->id,
                'is_featured' => true,
                'grade' => '6',
                'starting_point' => 'Kathmandu',
                'ending_point' => 'Kathmandu',
                'best_time_for_tour' => [
                    'en' => 'All Year Round',
                    'fr' => 'Toute l\'année',
                ],
                'costs_include' => [
                    [
                        'en' => 'Tour Guide',
                        'fr' => 'Guide touristique',
                    ],
                    [
                        'en' => 'Transportation',
                        'fr' => 'Transport',
                    ],
                    [
                        'en' => 'Entry Tickets',
                        'fr' => 'Billets d\'entrée',
                    ],
                ],
                'costs_exclude' => [
                    [
                        'en' => 'Personal Expenses',
                        'fr' => 'Dépenses personnelles',
                    ],
                    [
                        'en' => 'Lunch',
                        'fr' => 'Déjeuner',
                    ],
                ],
            ],
            [
                'title' => [
                    'en' => 'Mountain Biking in Kathmandu Valley',
                    'fr' => 'VTT dans la vallée de Katmandou',
                ],
                'description' => [
                    'en' => 'A thrilling cycling adventure through the rugged trails and lush forests of the Kathmandu Valley, passing traditional villages and terraced farmlands.',
                    'fr' => 'Une aventure cycliste passionnante à travers les sentiers accidentés et les forêts luxuriantes de la vallée de Katmandou, en passant par des villages traditionnels et des terres agricoles en terrasses.',
                ],
                'duration' => '3 hours',
                'category_id' => Category::find(12)->id,
                'is_featured' => true,
                'grade' => '7',
                'starting_point' => 'Kathmandu',
                'ending_point' => 'Kathmandu',
                'best_time_for_tour' => [
                    'en' => 'Autumn and Spring',
                    'fr' => 'Automne et printemps',
                ],
                'costs_include' => [
                    [
                        'en' => 'Mountain Bike',
                        'fr' => 'VTT',
                    ],
                    [
                        'en' => 'Guide',
                        'fr' => 'Guide',
                    ],
                    [
                        'en' => 'Safety Gear',
                        'fr' => 'Équipement de sécurité',
                    ],
                ],
                'costs_exclude' => [
                    [
                        'en' => 'Personal Insurance',
                        'fr' => 'Assurance personnelle',
                    ],
                    [
                        'en' => 'Snacks',
                        'fr' => 'Collations',
                    ],
                ],
            ],
            [
                'title' => [
                    'en' => 'Kathmandu City Running Tour',
                    'fr' => 'Visite de course à pied de la ville de Katmandou',
                ],
                'description' => [
                    'en' => 'Experience the vibrant streets of Kathmandu while running through historic and cultural landmarks.',
                    'fr' => 'Découvrez les rues animées de Katmandou tout en courant à travers des monuments historiques et culturels.',
                ],
                'duration' => '1 hour',
                'category_id' => Category::find(13)->id,
                'is_featured' => true,
                'grade' => '6',
                'starting_point' => 'Kathmandu',
                'ending_point' => 'Kathmandu',
                'best_time_for_tour' => [
                    'en' => 'All Year Round',
                    'fr' => 'Toute l\'année',
                ],
                'costs_include' => [
                    [
                        'en' => 'Running Guide',
                        'fr' => 'Guide de course',
                    ],
                    [
                        'en' => 'Snacks and Water',
                        'fr' => 'Collations et eau',
                    ],
                ],
                'costs_exclude' => [
                    [
                        'en' => 'Personal Running Gear',
                        'fr' => 'Équipement de course personnel',
                    ],
                    [
                        'en' => 'Transportation to Start Point',
                        'fr' => 'Transport jusqu\'au point de départ',
                    ],
                ],
            ],
            [
                'title' => [
                    'en' => 'Photography Tour of Pokhara',
                    'fr' => 'Visite photographique de Pokhara',
                ],
                'description' => [
                    'en' => 'A photography-focused tour to capture the stunning beauty of Pokhara, including Phewa Lake, Sarangkot, and the Annapurna Range.',
                    'fr' => 'Une visite axée sur la photographie pour capturer la beauté époustouflante de Pokhara, notamment le lac Phewa, Sarangkot et la chaîne de l\'Annapurna.',
                ],
                'duration' => '4 hours',
                'category_id' => Category::find(14)->id,
                'is_featured' => true,
                'grade' => '8',
                'starting_point' => 'Pokhara',
                'ending_point' => 'Pokhara',
                'best_time_for_tour' => [
                    'en' => 'Autumn and Spring',
                    'fr' => 'Automne et printemps',
                ],
                'costs_include' => [
                    [
                        'en' => 'Photography Guide',
                        'fr' => 'Guide photographe',
                    ],
                    [
                        'en' => 'Transportation',
                        'fr' => 'Transport',
                    ],
                ],
                'costs_exclude' => [
                    [
                        'en' => 'Camera Equipment',
                        'fr' => 'Matériel photo',
                    ],
                    [
                        'en' => 'Meals',
                        'fr' => 'Repas',
                    ],
                ],
            ],
            [
                'title' => [
                    'en' => 'Cultural Tour of Bhaktapur',
                    'fr' => 'Visite culturelle de Bhaktapur',
                ],
                'description' => [
                    'en' => 'Immerse yourself in the rich culture of Bhaktapur, visiting ancient temples, Durbar Square, and experiencing traditional Newari art and cuisine.',
                    'fr' => 'Imprégnez-vous de la riche culture de Bhaktapur, visitez des temples anciens, la place Durbar et découvrez l\'art et la cuisine traditionnels newari.',
                ],
                'duration' => '2 hours',
                'category_id' => Category::find(15)->id,
                'is_featured' => true,
                'grade' => '6',
                'starting_point' => 'Bhaktapur',
                'ending_point' => 'Bhaktapur',
                'best_time_for_tour' => [
                    'en' => 'All Year Round',
                    'fr' => 'Toute l\'année',
                ],
                'costs_include' => [
                    [
                        'en' => 'Guide',
                        'fr' => 'Guide',
                    ],
                    [
                        'en' => 'Entry Fees',
                        'fr' => 'Frais d\'entrée',
                    ],
                ],
                'costs_exclude' => [
                    [
                        'en' => 'Personal Expenses',
                        'fr' => 'Dépenses personnelles',
                    ],
                    [
                        'en' => 'Meals',
                        'fr' => 'Repas',
                    ],
                ],
            ],
            [
                'title' => [
                    'en' => 'Helicopter Tour to Everest Base Camp',
                    'fr' => 'Excursion en hélicoptère au camp de base de l\'Everest',
                ],
                'description' => [
                    'en' => 'A luxury helicopter tour that takes you to Everest Base Camp and Kala Patthar for stunning views of Mount Everest and the surrounding peaks.',
                    'fr' => 'Une excursion en hélicoptère de luxe qui vous emmène au camp de base de l\'Everest et à Kala Patthar pour des vues imprenables sur le mont Everest et les sommets environnants.',
                ],
                'duration' => '5 hours',
                'category_id' => Category::find(16)->id,
                'is_featured' => true,
                'grade' => '9',
                'starting_point' => 'Kathmandu',
                'ending_point' => 'Kathmandu',
                'best_time_for_tour' => [
                    'en' => 'Autumn and Spring',
                    'fr' => 'Automne et printemps',
                ],
                'costs_include' => [
                    [
                        'en' => 'Helicopter Ride',
                        'fr' => 'Vol en hélicoptère',
                    ],
                    [
                        'en' => 'Guide',
                        'fr' => 'Guide',
                    ],
                    [
                        'en' => 'Fuel Surcharge',
                        'fr' => 'Supplément carburant',
                    ],
                ],
                'costs_exclude' => [
                    [
                        'en' => 'Personal Insurance',
                        'fr' => 'Assurance personnelle',
                    ],
                    [
                        'en' => 'Meals',
                        'fr' => 'Repas',
                    ],
                ],
            ],
        ];
        $images = [
            'photos/culture.jpg',
            'photos/culture2.jpg',
            'photos/culture3.jpg',
            'photos/temple.jpg',
            'photos/services.jpg',
            'photos/activity.JPG',
            'photos/activity2.JPG',
            'photos/activity3.JPG',
        ];

        foreach ($tours as $tourData) {
            $tour = Tour::create($tourData);

            // Attach random destinations for the tour
            $tour->destinations()->sync(
                Destination::where('region_id',1)->inRandomOrder()
                    ->limit(5)
                    ->get()
                    ->pluck('id')
                    ->toArray()
            );
            shuffle($images); // Randomize the images

            foreach (array_slice($images, 0, rand(2, 3)) as $image) {
                CuratorSeederHelper::seedBelongsTo(
                    $tour,
                    'cover_image_id',
                    public_path($image)
                );
                CuratorSeederHelper::seedBelongsTo(
                    $tour,
                    'feature_image_id',
                    public_path($image)
                );
            }

        }
    }
}
