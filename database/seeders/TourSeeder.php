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
                    'en' => 'Ultimate Photography Tour of Nepal',
                    'fr' => 'Visite photographique ultime du Népal',
                ],
                'description' => [
                    'en' => 'Embark on a photography-focused journey through Nepal, a land where every frame tells a story of breathtaking beauty, timeless tradition, and untamed wilderness. This ultimate tour is designed for shutterbugs of all levels, guiding you from the towering peaks of the Himalayas to the steamy jungles of the Terai lowlands, with countless opportunities to capture the essence of this extraordinary country. Imagine standing at the edge of the world in the Everest region, your camera poised as the first light of dawn ignites Mount Everest in a blaze of gold and pink, the crisp mountain air sharpening every detail of the rugged landscape. Trek through the Khumbu region, where prayer flags flutter against a cerulean sky, Sherpa villages nestle in dramatic valleys, and the icy contours of glaciers offer endless compositions for your lens. Venture further to the Annapurna region, where the iconic fishtail peak of Machapuchare looms over terraced fields and rhododendron forests that burst into vibrant reds and pinks in spring, a paradise for landscape photographers seeking both grandeur and intimacy.

    Beyond the mountains, descend into the lush jungles of Chitwan National Park, where patience rewards you with rare glimpses of Bengal tigers stalking through tall grass, their golden eyes glinting in the soft light, or one-horned rhinos wallowing in muddy pools. With over 500 bird species flitting through the canopy, your telephoto lens will dance with opportunities to capture the wild heart of Nepal. In Pokhara, the serene waters of Phewa Lake mirror the majestic Annapurna range, offering perfect reflection shots at sunrise, while the chaotic energy of local markets and the mystique of Devi’s Fall provide dynamic subjects for street and nature photography alike. The Kathmandu Valley unfolds as a living museum, where ancient temples like Boudhanath Stupa and Pashupatinath Temple hum with the devotion of pilgrims and the swirl of incense smoke, begging to be immortalized in your frames. Here, the weathered faces of sadhus, the intricate carvings of Durbar Square, and the vibrant chaos of festivals like Dashain and Holi offer a cultural tapestry as rich as the landscapes are vast.

    For those craving the remote and surreal, Upper Mustang beckons with its wind-sculpted cliffs in shades of red and orange, ancient monasteries perched on hilltops, and star-filled skies free of light pollution—ideal for astrophotography. Langtang Valley, a hidden gem, delivers sweeping Himalayan vistas without the crowds, its Tamang villages and elusive red pandas adding depth to your portfolio. This tour isn’t just about the grand vistas; it’s about the quiet moments too—the steam curling from a cup of chai in a mountain teahouse, the worn hands of a Sherpa guide pointing out a hidden trail, or the rhythmic chants of monks echoing through a monastery. With expert photography guides, you’ll hone your skills across diverse terrains and seasons, learning to master golden-hour light, long exposures for silky waterfalls, and candid portraits that honor Nepal’s warm, welcoming people. Whether you wield a professional DSLR or a smartphone, this journey through Nepal’s stunning landscapes, vibrant culture, and diverse wildlife—from the icy heights of the Himalayas to the sultry jungles of Chitwan—promises not just a full memory card, but a deeper connection to a land where every click captures a piece of eternity.',

                    'fr' => 'Laissez-vous emporter par un voyage axé sur la photographie à travers le Népal, un pays où chaque cliché raconte une histoire de beauté à couper le souffle, de traditions intemporelles et de nature sauvage indomptée. Cette visite ultime est conçue pour les passionnés de photographie de tous niveaux, vous guidant des sommets imposants de l’Himalaya aux jungles humides des basses terres du Terai, avec d’innombrables occasions de saisir l’essence de ce pays extraordinaire. Imaginez-vous au bord du monde dans la région de l’Everest, votre appareil photo prêt à capturer la première lumière de l’aube qui enflamme le mont Everest d’une lueur dorée et rose, l’air pur des montagnes rendant chaque détail du paysage accidenté plus net. Parcourez la région du Khumbu, où les drapeaux de prière flottent contre un ciel d’azur, les villages Sherpas s’abritent dans des vallées spectaculaires, et les contours glacés des glaciers offrent une infinité de compositions pour votre objectif. Poursuivez vers la région de l’Annapurna, où le pic emblématique en forme de queue de poisson de Machapuchare domine des champs en terrasses et des forêts de rhododendrons qui explosent de rouges et de roses vibrants au printemps, un paradis pour les photographes de paysages en quête de grandeur et d’intimité.

    Au-delà des montagnes, plongez dans les jungles luxuriantes du parc national de Chitwan, où la patience vous récompense par des aperçus rares de tigres du Bengale rôdant dans les hautes herbes, leurs yeux dorés brillant dans la lumière douce, ou de rhinocéros unicorns se vautrant dans des mares boueuses. Avec plus de 500 espèces d’oiseaux virevoltant dans la canopée, votre téléobjectif dansera avec des opportunités de capturer le cœur sauvage du Népal. À Pokhara, les eaux tranquilles du lac Phewa reflètent la majestueuse chaîne de l’Annapurna, offrant des prises de vue parfaites au lever du soleil, tandis que l’énergie chaotique des marchés locaux et le mystère de la chute de Devi fournissent des sujets dynamiques pour la photographie de rue et de nature. La vallée de Katmandou se dévoile comme un musée vivant, où des temples anciens comme le stupa de Boudhanath et le temple de Pashupatinath vibrent de la dévotion des pèlerins et des volutes de fumée d’encens, implorant d’être immortalisés dans vos cadres. Ici, les visages burinés des sadhus, les sculptures complexes de la place Durbar, et le chaos vibrant des festivals comme Dashain et Holi offrent une tapisserie culturelle aussi riche que les paysages sont vastes.

    Pour ceux qui recherchent l’éloigné et le surréaliste, l’Upper Mustang attire avec ses falaises sculptées par le vent dans des teintes de rouge et d’orange, ses anciens monastères perchés sur des collines, et ses ciels étoilés exempts de pollution lumineuse—idéaux pour l’astrophotographie. La vallée de Langtang, un joyau caché, offre des panoramas himalayens époustouflants sans la foule, ses villages Tamang et ses pandas rouges insaisissables ajoutant de la profondeur à votre portfolio. Ce voyage ne se limite pas aux grandes vues ; il s’agit aussi des moments paisibles—la vapeur s’élevant d’une tasse de chai dans une maison de thé en montagne, les mains usées d’un guide Sherpa indiquant un sentier caché, ou les chants rythmiques des moines résonnant dans un monastère. Avec des guides experts en photographie, vous perfectionnerez vos compétences à travers divers terrains et saisons, apprenant à maîtriser la lumière des heures dorées, les longues expositions pour des cascades soyeuses, et des portraits spontanés qui honorent les habitants chaleureux et accueillants du Népal. Que vous maniiez un reflex numérique professionnel ou un smartphone, ce périple à travers les paysages époustouflants, la culture vibrante et la faune diversifiée du Népal—des hauteurs glacées de l’Himalaya aux jungles étouffantes de Chitwan—promet non seulement une carte mémoire pleine, mais aussi une connexion plus profonde avec une terre où chaque clic capture un morceau d’éternité.',
                ],
                'duration' => '7-21 days',
                'category_id' => Category::find(14)->id, // Assuming category 14 is "Photography Tours"
                'is_featured' => true,
                'grade' => '9',
                'starting_point' => 'Kathmandu',
                'ending_point' => 'usually Kathmandu',
                'best_time_for_tour' => [
                    'en' => 'Autumn (Sep-Nov) and Spring (Mar-May)',
                    'fr' => 'Automne (sep-nov) et printemps (mar-mai)',
                ],
                'costs_include' => [
                    [
                        'en' => 'Photography Guide',
                        'fr' => 'Guide photographe',
                    ],
                    [
                        'en' => 'Permits and Transportation',
                        'fr' => 'Permis et transport',
                    ],
                ],
                'costs_exclude' => [
                    [
                        'en' => 'Camera Gear',
                        'fr' => 'Équipement photo',
                    ],
                    [
                        'en' => 'Personal Expenses and Meals',
                        'fr' => 'Dépenses personnelles et repas',
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
                'is_featured' => false,
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
                'category_id' => Category::find(11)->id,
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
            [
                'title' => [
                    'en' => 'Helicopter Rescue Service',
                    'fr' => 'Service de secours héliporté d\'urgence',
                ],
                'description' => [
                    'en' => 'Explore traditional and contemporary Nepali art at the Patan Museum. A must-visit event for art lovers.',
                    'fr' => 'Explorez l\'art népalais traditionnel et contemporain au musée de Patan. Un événement incontournable pour les amateurs d\'art.',
                ],
                'duration' => 'Emergency',
                'category_id' => Category::find(16)->id,
                'is_featured' => true,
                'grade' => 'n/a',
                'starting_point' => 'Kathmandu',
                'ending_point' => 'Kathmandu',
                'best_time_for_tour' => [
                    'en' => '',
                    'fr' => '',
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
            'photos/vtour.jpeg',
            'photos/vtour2.jpeg',
            'photos/vtour3.jpeg',
            'photos/vtour4.jpeg',
            'photos/vtour5.jpeg',
            'photos/vtour6.jpeg',
            'photos/vtour6.jpeg',
            'photos/vtours.jpeg',
            'photos/vtourphotography.jpeg',
            'photos/vtourphotography2.jpeg',
            'photos/services.jpg',
            'photos/activity.JPG',
            'photos/activity2.JPG',
            'photos/activity3.JPG',
        ];

        foreach ($tours as $tourData) {
            $tour = Tour::create($tourData);

            // Attach random destinations for the tour
            $tour->destinations()->sync(
                Destination::where('region_id', 1)->inRandomOrder()
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
