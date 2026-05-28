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
                    'en' => 'A full-day private tour of the four most important UNESCO-listed sites in the Kathmandu Valley, with hotel pickup and a licensed English/French-speaking heritage guide. We start at Swayambhunath (the "Monkey Temple", a 2,000-year-old hilltop stupa with the all-seeing eyes of the Buddha and 360° views of the valley), continue to Boudhanath (one of the largest stupas in the world and the spiritual centre of the Tibetan diaspora in Nepal, ringed by monasteries and a 500-metre prayer-wheel kora), then to Pashupatinath (Nepal\'s holiest Hindu temple, on the banks of the Bagmati, where open-air cremation ghats run day and night), and finish at Patan Durbar Square (the medieval royal palace of the Malla kings, the 21-spired Krishna Mandir, and the Patan Museum — widely considered the finest museum in South Asia). Eight hours door to door, with a Newari lunch break in a Patan courtyard restaurant.',
                    'fr' => 'Une journée complète privée à la découverte des quatre principaux sites classés à l\'UNESCO de la vallée de Katmandou, avec prise en charge à l\'hôtel et guide patrimonial diplômé anglophone et francophone. Nous commençons par Swayambhunath (le « temple des singes », stupa au sommet d\'une colline vieux de 2 000 ans, avec les yeux du Bouddha qui voient tout et une vue à 360° sur la vallée), puis Boudhanath (l\'un des plus grands stupas du monde et centre spirituel de la diaspora tibétaine au Népal, entouré de monastères et d\'un kora de 500 mètres avec ses moulins à prières), Pashupatinath (le temple hindou le plus sacré du Népal, sur les rives de la Bagmati, où les bûchers funéraires en plein air brûlent jour et nuit), et nous terminons à Patan Durbar Square (le palais royal médiéval des rois Malla, le Krishna Mandir aux 21 flèches et le Patan Museum — considéré comme le plus beau musée d\'Asie du Sud). Huit heures porte à porte, avec une pause déjeuner newari dans une cour-restaurant de Patan.',
                ],
                'duration' => '7-8 hours (full day)',
                'category_id' => Category::find(11)->id,
                'is_featured' => true,
                'grade' => '6',
                'starting_point' => 'Kathmandu',
                'ending_point' => 'Kathmandu',
                'best_time_for_tour' => [
                    'en' => 'October–April (clearest skies and lowest air pollution); avoid the June–September monsoon',
                    'fr' => 'D\'octobre à avril (ciel le plus dégagé, pollution minimale) ; éviter la mousson de juin à septembre',
                ],
                'costs_include' => [
                    [
                        'en' => 'Licensed English/French-speaking heritage guide',
                        'fr' => 'Guide patrimonial diplômé anglophone et francophone',
                    ],
                    [
                        'en' => 'Hotel pickup and drop-off in Kathmandu by private vehicle',
                        'fr' => 'Prise en charge et retour à l\'hôtel à Katmandou en véhicule privé',
                    ],
                    [
                        'en' => 'All UNESCO entry fees (Swayambhunath, Boudhanath, Pashupatinath, Patan Durbar Square — approx. NPR 4,500 / USD 35 total for foreigners)',
                        'fr' => 'Tous les droits d\'entrée UNESCO (Swayambhunath, Boudhanath, Pashupatinath, Patan Durbar Square — environ 4 500 NPR / 35 USD au total pour les étrangers)',
                    ],
                    [
                        'en' => 'Patan Museum entrance',
                        'fr' => 'Entrée au Patan Museum',
                    ],
                    [
                        'en' => 'Bottled water throughout the day',
                        'fr' => 'Eau en bouteille tout au long de la journée',
                    ],
                ],
                'costs_exclude' => [
                    [
                        'en' => 'Lunch (typical Newari thali at a Patan courtyard restaurant, approx. USD 8–12 per person)',
                        'fr' => 'Déjeuner (thali newari typique dans une cour-restaurant de Patan, environ 8 à 12 USD par personne)',
                    ],
                    [
                        'en' => 'Camera/video fee at the Pashupatinath inner cremation viewpoint (NPR 100 if you want to film)',
                        'fr' => 'Droit photo/vidéo au point de vue intérieur des crémations de Pashupatinath (100 NPR si vous souhaitez filmer)',
                    ],
                    [
                        'en' => 'Temple offerings, donations and personal expenses',
                        'fr' => 'Offrandes au temple, dons et dépenses personnelles',
                    ],
                    [
                        'en' => 'Tips and gratuities for the guide and driver',
                        'fr' => 'Pourboires pour le guide et le chauffeur',
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
                    'en' => 'A half-day walk through the UNESCO-listed medieval city of Bhaktapur, 13 km east of Kathmandu, with a licensed Newari-speaking guide. We cover the four historic squares — Durbar Square (55-Window Palace, Golden Gate, Vatsala Temple), Taumadhi Square (Nyatapola Temple), Pottery Square at Talako, and Dattatreya Square with its Peacock Window — and finish with a tasting of juju dhau and a traditional samay baji platter in a 14th-century courtyard kitchen.',
                    'fr' => 'Une demi-journée à pied dans la cité médiévale de Bhaktapur, classée au patrimoine mondial de l\'UNESCO, à 13 km à l\'est de Katmandou, avec un guide diplômé parlant newari. Nous parcourons les quatre places historiques — Durbar Square (palais aux 55 fenêtres, Porte d\'Or, temple Vatsala), Taumadhi Square (temple Nyatapola), la place des Potiers à Talako, et Dattatreya Square avec sa fenêtre du paon — puis dégustation de juju dhau et d\'un plateau traditionnel samay baji dans une cour-cuisine du XIVᵉ siècle.',
                ],
                'duration' => '4-5 hours',
                'category_id' => Category::find(15)->id,
                'is_featured' => false,
                'grade' => '6',
                'starting_point' => 'Bhaktapur',
                'ending_point' => 'Bhaktapur',
                'best_time_for_tour' => [
                    'en' => 'October–April (clearest skies); avoid the June–August monsoon',
                    'fr' => 'D\'octobre à avril (ciel le plus dégagé) ; éviter la mousson de juin à août',
                ],
                'costs_include' => [
                    [
                        'en' => 'Licensed English/French/Newari-speaking cultural guide',
                        'fr' => 'Guide culturel diplômé anglophone, francophone et newari',
                    ],
                    [
                        'en' => 'Bhaktapur Durbar Square heritage entry fee (NPR 1,500 / approx. USD 12)',
                        'fr' => 'Droit d\'entrée du site patrimonial de Durbar Square à Bhaktapur (1 500 NPR / environ 12 USD)',
                    ],
                    [
                        'en' => 'Private vehicle transfer from Kathmandu and back',
                        'fr' => 'Transfert privé aller-retour depuis Katmandou',
                    ],
                    [
                        'en' => 'Juju dhau tasting (king curd in a clay bowl)',
                        'fr' => 'Dégustation de juju dhau (caillé royal dans un bol en argile)',
                    ],
                    [
                        'en' => 'Samay baji platter at a Newari home kitchen',
                        'fr' => 'Plateau samay baji dans une cuisine familiale newari',
                    ],
                ],
                'costs_exclude' => [
                    [
                        'en' => 'Additional meals and drinks beyond the tasting',
                        'fr' => 'Repas et boissons supplémentaires en dehors de la dégustation',
                    ],
                    [
                        'en' => 'Optional pottery wheel workshop at Talako (approx. USD 10 per person)',
                        'fr' => 'Atelier optionnel de poterie au tour à Talako (environ 10 USD par personne)',
                    ],
                    [
                        'en' => 'Personal shopping (wood carvings, thangka, textiles)',
                        'fr' => 'Achats personnels (sculptures sur bois, thangka, textiles)',
                    ],
                    [
                        'en' => 'Tips and gratuities for the guide and driver',
                        'fr' => 'Pourboires pour le guide et le chauffeur',
                    ],
                ],
            ],
            [
                'title' => [
                    'en' => 'Helicopter Tour to Everest Base Camp',
                    'fr' => 'Excursion en hélicoptère au camp de base de l\'Everest',
                ],
                'description' => [
                    'en' => 'An early-morning helicopter charter from Kathmandu into the Khumbu, with a brief landing at Kala Patthar (5,545 m) for unobstructed views of Mount Everest, Nuptse and Lhotse, followed by a buffet breakfast on the terrace of Hotel Everest View (3,880 m) at Syangboche. The route flies via Lukla and Pheriche, where the group is split into smaller shuttles so the aircraft can safely lift to altitude. Round-trip from Kathmandu in 4–5 hours, returning before midday.',
                    'fr' => 'Vol privé en hélicoptère au départ de Katmandou, tôt le matin, jusqu\'au cœur du Khumbu, avec une brève escale à Kala Patthar (5 545 m) pour admirer le mont Everest, le Nuptse et le Lhotse, suivie d\'un petit-déjeuner buffet sur la terrasse de l\'Hôtel Everest View (3 880 m) à Syangboche. L\'itinéraire passe par Lukla puis Pheriche, où le groupe est divisé en navettes plus légères pour respecter les limites d\'altitude. Aller-retour depuis Katmandou en 4 à 5 heures, retour avant midi.',
                ],
                'duration' => '4-5 hours',
                'category_id' => Category::find(11)->id,
                'is_featured' => true,
                'grade' => '9',
                'starting_point' => 'Kathmandu',
                'ending_point' => 'Kathmandu',
                'best_time_for_tour' => [
                    'en' => 'September–November (autumn) and March–May (spring)',
                    'fr' => 'Septembre à novembre (automne) et mars à mai (printemps)',
                ],
                'costs_include' => [
                    [
                        'en' => 'Hotel–airport–hotel transfers in Kathmandu by private vehicle',
                        'fr' => 'Transferts privés hôtel–aéroport–hôtel à Katmandou',
                    ],
                    [
                        'en' => 'Helicopter charter (Airbus AS350 B3 / H125) with pilot and fuel',
                        'fr' => 'Affrètement de l\'hélicoptère (Airbus AS350 B3 / H125), pilote et carburant inclus',
                    ],
                    [
                        'en' => 'Kala Patthar landing (subject to weight, altitude and weather)',
                        'fr' => 'Atterrissage à Kala Patthar (selon le poids, l\'altitude et la météo)',
                    ],
                    [
                        'en' => 'Sagarmatha National Park entry permit',
                        'fr' => 'Permis d\'entrée au parc national de Sagarmatha',
                    ],
                    [
                        'en' => 'Khumbu Pasang Lhamu Rural Municipality fee',
                        'fr' => 'Taxe de la municipalité rurale Khumbu Pasang Lhamu',
                    ],
                    [
                        'en' => 'Domestic airport tax and landing fees',
                        'fr' => 'Taxes d\'aéroport et redevances d\'atterrissage',
                    ],
                    [
                        'en' => 'Supplementary oxygen and first-aid kit on board',
                        'fr' => 'Oxygène d\'appoint et trousse de premiers secours à bord',
                    ],
                    [
                        'en' => 'Government taxes and VAT',
                        'fr' => 'Taxes gouvernementales et TVA',
                    ],
                ],
                'costs_exclude' => [
                    [
                        'en' => 'Breakfast at Hotel Everest View (approx. USD 35 per person, paid on site)',
                        'fr' => 'Petit-déjeuner à l\'Hôtel Everest View (environ 35 USD par personne, à régler sur place)',
                    ],
                    [
                        'en' => 'Travel insurance with high-altitude and helicopter evacuation cover',
                        'fr' => 'Assurance voyage couvrant la haute altitude et l\'évacuation par hélicoptère',
                    ],
                    [
                        'en' => 'Personal expenses, tips and gratuities',
                        'fr' => 'Dépenses personnelles, pourboires et gratifications',
                    ],
                    [
                        'en' => 'Any additional costs caused by weather delays or itinerary changes beyond our control',
                        'fr' => 'Frais supplémentaires liés aux retards météo ou aux modifications d\'itinéraire indépendants de notre volonté',
                    ],
                ],
            ],
            [
                'title' => [
                    'en' => 'Helicopter Rescue Service',
                    'fr' => 'Service de secours héliporté d\'urgence',
                ],
                'description' => [
                    'en' => 'On-call helicopter evacuation and medical extraction across the Nepal Himalaya, coordinated 24/7 from our Kathmandu office. Most commonly used for acute mountain sickness (AMS), HACE/HAPE, traumatic injuries on technical climbs, or any condition where a rapid descent to a lower altitude or to hospital is required. We liaise with the pilot, the Himalayan Rescue Association aid posts (Pheriche, Manang, Macchermo) when available, and your insurer — so the rescue can launch the moment weather and authorisations allow. A valid travel insurance policy covering high-altitude helicopter evacuation is required before any rescue is initiated.',
                    'fr' => 'Évacuation héliportée et extraction médicale d\'urgence dans tout l\'Himalaya népalais, coordonnées 24h/24 et 7j/7 depuis notre bureau de Katmandou. Indiquée pour le mal aigu des montagnes (MAM), l\'œdème cérébral (OCHA) ou pulmonaire (OPHA), les traumatismes en escalade technique, ou toute situation nécessitant une descente rapide ou une hospitalisation. Nous coordonnons l\'opération avec le pilote, les postes de secours de l\'Himalayan Rescue Association (Pheriche, Manang, Macchermo) lorsque disponibles, et votre assureur — pour que le décollage ait lieu dès que la météo et les autorisations le permettent. Une assurance voyage couvrant l\'évacuation héliportée en haute altitude est obligatoire avant toute opération.',
                ],
                'duration' => 'On call, 24/7',
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
                        'en' => 'Coordination with helicopter operators and the pilot at any hour',
                        'fr' => 'Coordination avec les opérateurs et le pilote à toute heure',
                    ],
                    [
                        'en' => 'Communication with your travel insurer to confirm cover and authorise the flight',
                        'fr' => 'Échanges avec votre assureur pour valider la prise en charge et autoriser le vol',
                    ],
                    [
                        'en' => 'Liaison with HRA aid posts and Kathmandu hospitals for ongoing care',
                        'fr' => 'Liaison avec les postes de secours de l\'HRA et les hôpitaux de Katmandou pour la suite des soins',
                    ],
                    [
                        'en' => 'Ground transfer from the receiving airport to a Kathmandu hospital',
                        'fr' => 'Transfert terrestre de l\'aéroport d\'arrivée vers un hôpital de Katmandou',
                    ],
                    [
                        'en' => 'English-speaking point of contact throughout the evacuation',
                        'fr' => 'Interlocuteur anglophone tout au long de l\'évacuation',
                    ],
                ],
                'costs_exclude' => [
                    [
                        'en' => 'Helicopter flight charges — recovered from your travel insurer or billed directly to you',
                        'fr' => 'Frais du vol hélicoptère — récupérés auprès de votre assureur ou facturés directement',
                    ],
                    [
                        'en' => 'Hospital, doctor and medication costs',
                        'fr' => 'Frais hospitaliers, honoraires médicaux et médicaments',
                    ],
                    [
                        'en' => 'Personal travel insurance with high-altitude evacuation cover (mandatory)',
                        'fr' => 'Assurance voyage personnelle couvrant l\'évacuation en haute altitude (obligatoire)',
                    ],
                    [
                        'en' => 'Costs arising from rescues launched without prior insurance confirmation',
                        'fr' => 'Frais liés à un sauvetage déclenché sans confirmation préalable de l\'assurance',
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
