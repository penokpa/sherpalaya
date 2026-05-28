<?php

namespace Database\Seeders;

use App\Models\Expedition;
use App\Models\Peak;
use App\Models\Tour;
use App\Models\Trek;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class KeyHighlightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $everest_base_camp_trek = [
            [
                'title' => [
                    'en' => 'First Glimpse of Everest from Namche Bazaar',
                    'fr' => 'Premier aperçu de l\'Everest depuis Namche Bazaar',
                ],
                'description' => [
                    'en' => 'The excitement of spotting Everest for the first time while sipping tea at a Namche Bazaar viewpoint is surreal.',
                    'fr' => 'L\'excitation de repérer l\'Everest pour la première fois en sirotant un thé à un point de vue de Namche Bazaar est surréelle.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Acclimatization Hike to Everest View Hotel',
                    'fr' => 'Randonnée d\'acclimatation à l\'Everest View Hotel',
                ],
                'description' => [
                    'en' => 'A rewarding short hike offering one of the best panoramic views of Everest, Lhotse, and Ama Dablam.',
                    'fr' => 'Une courte randonnée enrichissante offrant l\'une des meilleures vues panoramiques sur l\'Everest, le Lhotse et l\'Ama Dablam.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Crossing High Suspension Bridges',
                    'fr' => 'Traversée de hauts ponts suspendus',
                ],
                'description' => [
                    'en' => 'Adrenaline rushes as you walk across swaying suspension bridges over deep gorges, prayer flags fluttering in the wind.',
                    'fr' => 'Montées d\'adrénaline en traversant des ponts suspendus oscillants au-dessus de gorges profondes, des drapeaux de prière flottant dans le vent.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Reaching the Everest Base Camp',
                    'fr' => 'Atteindre le camp de base de l\'Everest',
                ],
                'description' => [
                    'en' => 'The thrill of standing at the foot of Everest, surrounded by climbers, colorful tents, and the mighty Khumbu Icefall.',
                    'fr' => 'Le frisson de se tenir au pied de l\'Everest, entouré de grimpeurs, de tentes colorées et de la puissante cascade de glace de Khumbu.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Sunrise at Kala Patthar',
                    'fr' => 'Lever de soleil à Kala Patthar',
                ],
                'description' => [
                    'en' => 'The awesomeness will drive you next level',
                    'fr' => 'L\'incroyable vous mènera au niveau supérieur',
                ],
            ],
        ];
        $annapurna_base_camp_trek = [
            [
                'title' => [
                    'en' => 'Waking Up to the Sound of Roosters in Ghandruk',
                    'fr' => 'Se réveiller au son des coqs à Ghandruk',
                ],
                'description' => [
                    'en' => 'Experiencing village life firsthand, waking up to mountain views and the smell of fresh Gurung bread.',
                    'fr' => 'Découvrir la vie du village de première main, se réveiller avec vue sur les montagnes et l\'odeur du pain frais Gurung.',
                ],
            ],
            [
                'title' => [
                    'en' => 'The Magical Sunrise from Poon Hill',
                    'fr' => 'Le lever de soleil magique depuis Poon Hill',
                ],
                'description' => [
                    'en' => 'Watching the sun slowly illuminate the Annapurna and Dhaulagiri ranges, a moment of pure awe and silence.',
                    'fr' => 'Regarder le soleil illuminer lentement les chaînes de l\'Annapurna et du Dhaulagiri, un moment de pur émerveillement et de silence.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Feeling the Heat of Natural Hot Springs at Jhinu Danda',
                    'fr' => 'Sentir la chaleur des sources chaudes naturelles à Jhinu Danda',
                ],
                'description' => [
                    'en' => 'Soaking in warm natural hot springs after long trekking days, feeling muscles relax while listening to the river flow.',
                    'fr' => 'Se prélasser dans les sources chaudes naturelles après de longues journées de trek, sentir les muscles se détendre en écoutant le débit de la rivière.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Walking Through a Rhododendron Forest',
                    'fr' => 'Se promener dans une forêt de rhododendrons',
                ],
                'description' => [
                    'en' => 'A fairytale-like experience, with red, pink, and white rhododendrons blooming along the trail in spring.',
                    'fr' => 'Une expérience féerique, avec des rhododendrons rouges, roses et blancs qui fleurissent le long du sentier au printemps.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Standing in the Middle of the Annapurna Sanctuary',
                    'fr' => 'Se tenir au milieu du sanctuaire de l\'Annapurna',
                ],
                'description' => [
                    'en' => 'Surrounded by towering snow-covered peaks at Annapurna Base Camp, feeling small yet deeply connected to nature.',
                    'fr' => 'Entouré de sommets imposants couverts de neige au camp de base de l\'Annapurna, se sentir petit mais profondément connecté à la nature.',
                ],
            ],
        ];
        $lobuche_peak_climbing = [
            [
                'title' => [
                    'en' => 'The Rush of Ice Climbing Practice',
                    'fr' => 'L\'excitation de la pratique de l\'escalade sur glace',
                ],
                'description' => [
                    'en' => 'Strapping on crampons and learning how to navigate icy slopes, feeling like a true mountaineer.',
                    'fr' => 'Chausser des crampons et apprendre à naviguer sur des pentes glacées, se sentir comme un véritable alpiniste.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Sleeping Under the Stars at High Camp',
                    'fr' => 'Dormir sous les étoiles au camp d\'altitude',
                ],
                'description' => [
                    'en' => 'A night spent at high altitude, where the sky is ablaze with stars and the silence is absolute.',
                    'fr' => 'Une nuit passée en haute altitude, où le ciel est illuminé d\'étoiles et le silence est absolu.',
                ],
            ],
            [
                'title' => [
                    'en' => 'The Final Push to the Summit',
                    'fr' => 'La dernière poussée vers le sommet',
                ],
                'description' => [
                    'en' => 'Exhausted yet determined, each step towards the Lobuche summit feels like a victory over yourself.',
                    'fr' => 'Épuisé mais déterminé, chaque pas vers le sommet du Lobuche est ressenti comme une victoire sur soi-même.',
                ],
            ],
            [
                'title' => [
                    'en' => 'The First Rays of Sun from the Top',
                    'fr' => 'Les premiers rayons de soleil depuis le sommet',
                ],
                'description' => [
                    'en' => 'Watching the sun rise over Everest, Lhotse, and Nuptse from the summit is an emotional, unforgettable sight.',
                    'fr' => 'Regarder le soleil se lever sur l\'Everest, le Lhotse et le Nuptse depuis le sommet est un spectacle émotionnel et inoubliable.',
                ],
            ],
            [
                'title' => [
                    'en' => 'The Sense of Achievement Descending',
                    'fr' => 'Le sentiment d\'accomplissement en descendant',
                ],
                'description' => [
                    'en' => 'Looking back at the towering peak you just climbed, realizing you’ve conquered both nature and personal limits.',
                    'fr' => 'En regardant en arrière le sommet imposant que vous venez de gravir, vous réalisez que vous avez conquis à la fois la nature et vos limites personnelles.',
                ],
            ],
        ];
        $everest_expedition = [
            [
                'title' => [
                    'en' => 'The Thrill of Stepping into the Khumbu Icefall',
                    'fr' => 'Le frisson de pénétrer dans la cascade de glace de Khumbu',
                ],
                'description' => [
                    'en' => 'Navigating the ever-shifting seracs and deep crevasses of the Khumbu Icefall is an experience like no other.',
                    'fr' => 'Naviguer dans les séracs en constante évolution et les profondes crevasses de la cascade de glace de Khumbu est une expérience sans pareille.',
                ],
            ],
            [
                'title' => [
                    'en' => 'The Bond with Fellow Climbers',
                    'fr' => 'Le lien avec les autres grimpeurs',
                ],
                'description' => [
                    'en' => 'Sharing stories, meals, and hardships with climbers from around the world creates lifelong friendships.',
                    'fr' => 'Partager des histoires, des repas et des difficultés avec des grimpeurs du monde entier crée des amitiés durables.',
                ],
            ],
            [
                'title' => [
                    'en' => 'The Eerie Beauty of the Death Zone',
                    'fr' => 'L\'étrange beauté de la zone de la mort',
                ],
                'description' => [
                    'en' => 'At 8,000m, everything slows down—the air is thin, and each step is a battle between body and willpower.',
                    'fr' => 'À 8 000 m, tout ralentit : l\'air est raréfié et chaque pas est une bataille entre le corps et la volonté.',
                ],
            ],
            [
                'title' => [
                    'en' => 'The Moment You Step onto the Everest Summit',
                    'fr' => 'Le moment où vous posez le pied sur le sommet de l\'Everest',
                ],
                'description' => [
                    'en' => 'Standing on top of the world, with a view that only a few have seen—it’s the ultimate dream turned reality.',
                    'fr' => 'Se tenir au sommet du monde, avec une vue que seuls quelques-uns ont pu contempler : c\'est le rêve ultime devenu réalité.',
                ],
            ],
            [
                'title' => [
                    'en' => 'The Emotional Descent',
                    'fr' => 'La descente émotionnelle',
                ],
                'description' => [
                    'en' => 'Every step down feels surreal as the realization sinks in: you have climbed the highest mountain on Earth.',
                    'fr' => 'Chaque pas vers le bas semble surréel à mesure que la réalisation s\'impose : vous avez gravi la plus haute montagne de la Terre.',
                ],
            ],
        ];
        $kathmandu_cultural_tour = [
            [
                'title' => [
                    'en' => 'Watching Sunrise at Swayambhunath Stupa',
                    'fr' => 'Assister au lever du soleil au stupa de Swayambhunath',
                ],
                'description' => [
                    'en' => 'The golden light hitting the ancient stupa while prayer flags flutter and monks chant in the background.',
                    'fr' => 'La lumière dorée frappant l\'ancien stupa pendant que les drapeaux de prière flottent et que les moines chantent en arrière-plan.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Exploring the Hidden Courtyards of Patan Durbar Square',
                    'fr' => 'Explorer les cours cachées de la place Durbar de Patan',
                ],
                'description' => [
                    'en' => 'Walking through centuries-old courtyards, admiring intricate Newari architecture and stone carvings.',
                    'fr' => 'Se promener dans des cours centenaires, admirer l\'architecture newari complexe et les sculptures sur pierre.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Tasting Local Street Food in Ason Bazaar',
                    'fr' => 'Déguster la cuisine de rue locale au bazar d\'Ason',
                ],
                'description' => [
                    'en' => 'The spicy aroma of chatpate, freshly fried sel roti, and the bustle of Kathmandu’s oldest marketplace.',
                    'fr' => 'L\'arôme épicé du chatpate, du sel roti fraîchement frit et l\'agitation du plus ancien marché de Katmandou.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Witnessing the Evening Aarti at Pashupatinath',
                    'fr' => 'Assister à l\'Aarti du soir à Pashupatinath',
                ],
                'description' => [
                    'en' => 'A mesmerizing sight of priests performing fire rituals by the sacred Bagmati River as chants fill the air.',
                    'fr' => 'Un spectacle envoûtant de prêtres accomplissant des rituels du feu au bord du fleuve sacré Bagmati pendant que les chants emplissent l\'air.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Getting Lost in the Alleyways of Thamel',
                    'fr' => 'Se perdre dans les ruelles de Thamel',
                ],
                'description' => [
                    'en' => 'Discovering hidden bookshops, vibrant handicraft stores, and cozy cafés in Kathmandu’s famous backpacker hub.',
                    'fr' => 'Découvrir des librairies cachées, des boutiques d\'artisanat dynamiques et des cafés confortables dans le célèbre quartier des routards de Katmandou.',
                ],
            ],
        ];
        $manaslu_circuit_trek = [
            [
                'title' => [
                    'en' => 'Walking Through Remote Himalayan Villages',
                    'fr' => 'Randonnée à travers des villages himalayens isolés',
                ],
                'description' => [
                    'en' => 'Experience the untouched beauty of Nubri and Tsum Valley, home to Tibetan-influenced cultures and monasteries.',
                    'fr' => 'Découvrez la beauté intacte des vallées de Nubri et de Tsum, qui abritent des cultures et des monastères d\'influence tibétaine.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Crossing the Thrilling Larkya La Pass (5,160m)',
                    'fr' => 'Traversée du passionnant col de Larkya La (5 160 m)',
                ],
                'description' => [
                    'en' => 'The highest point of the trek offers breathtaking views of Himlung, Cheo, and Annapurna II, making the challenge worth it.',
                    'fr' => 'Le point culminant du trek offre des vues à couper le souffle sur Himlung, Cheo et l\'Annapurna II, ce qui vaut la peine de relever le défi.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Exploring the Ancient Monasteries',
                    'fr' => 'Exploration des anciens monastères',
                ],
                'description' => [
                    'en' => 'Visit centuries-old monasteries like Mu Gompa and Rachen Gompa, where monks chant amidst peaceful Himalayan surroundings.',
                    'fr' => 'Visitez des monastères centenaires comme Mu Gompa et Rachen Gompa, où les moines chantent dans un paisible environnement himalayen.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Trekking Along the Budhi Gandaki River Gorge',
                    'fr' => 'Trek le long des gorges de la rivière Budhi Gandaki',
                ],
                'description' => [
                    'en' => 'Follow the roaring Budhi Gandaki River through deep gorges, suspension bridges, and cascading waterfalls.',
                    'fr' => 'Suivez la rivière Budhi Gandaki rugissante à travers des gorges profondes, des ponts suspendus et des cascades.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Spectacular Views of Manaslu (8,163m), the 8th Highest Peak',
                    'fr' => 'Vues spectaculaires sur le Manaslu (8 163 m), le 8e plus haut sommet',
                ],
                'description' => [
                    'en' => 'Enjoy panoramic views of Manaslu and its surrounding peaks, standing majestically above the rugged terrain.',
                    'fr' => 'Profitez de vues panoramiques sur le Manaslu et ses sommets environnants, se dressant majestueusement au-dessus du terrain accidenté.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Walking Through Dense Rhododendron & Bamboo Forests',
                    'fr' => 'Randonnée à travers des forêts denses de rhododendrons et de bambous',
                ],
                'description' => [
                    'en' => 'The lower sections of the trek are filled with lush forests, turning vibrant red and pink in spring.',
                    'fr' => 'Les parties inférieures du trek sont remplies de forêts luxuriantes, qui deviennent rouge et rose vifs au printemps.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Staying in Traditional Tea Houses',
                    'fr' => 'Séjour dans des maisons de thé traditionnelles',
                ],
                'description' => [
                    'en' => 'Enjoy warm hospitality in local teahouses, where simple yet hearty meals provide comfort after long trekking days.',
                    'fr' => 'Profitez de la chaleureuse hospitalité des maisons de thé locales, où des repas simples mais copieux offrent du réconfort après de longues journées de trek.',
                ],
            ],
            [
                'title' => [
                    'en' => 'A Less Crowded Alternative to the Annapurna Circuit',
                    'fr' => 'Une alternative moins fréquentée au circuit de l\'Annapurna',
                ],
                'description' => [
                    'en' => 'Experience a more peaceful trekking route with pristine landscapes and fewer trekkers compared to the more commercialized Annapurna Circuit.',
                    'fr' => 'Découvrez un itinéraire de trek plus paisible avec des paysages immaculés et moins de trekkeurs que le circuit de l\'Annapurna plus commercialisé.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Encountering Unique Wildlife',
                    'fr' => 'Rencontre avec une faune unique',
                ],
                'description' => [
                    'en' => 'The Manaslu region is home to snow leopards, blue sheep, and Himalayan Thars, adding an adventurous touch to your journey.',
                    'fr' => 'La région du Manaslu abrite des léopards des neiges, des moutons bleus et des thars de l\'Himalaya, ajoutant une touche d\'aventure à votre voyage.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Reaching the Isolated Tsum Valley (Optional Side Trip)',
                    'fr' => 'Atteindre la vallée isolée de Tsum (excursion facultative)',
                ],
                'description' => [
                    'en' => 'A hidden gem with breathtaking landscapes, ancient monasteries, and a strong Tibetan Buddhist culture.',
                    'fr' => 'Un joyau caché avec des paysages à couper le souffle, des monastères anciens et une forte culture bouddhiste tibétaine.',
                ],
            ],
        ];
        $langtang_highlights = [
            [
                'title' => [
                    'en' => 'A Challenging and Rewarding Trek',
                    'fr' => 'Un trek exigeant et gratifiant',
                ],
                'description' => [
                    'en' => 'Experience an adventurous and challenging trek near Kathmandu, offering stunning landscapes and cultural immersion.',
                    'fr' => 'Vivez un trek aventureux et exigeant près de Katmandou, offrant des paysages magnifiques et une immersion culturelle.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Explore Valleys and Peaks',
                    'fr' => 'Explorez les vallées et les sommets',
                ],
                'description' => [
                    'en' => 'Trek through the "Valley of Glaciers" (Langtang Valley), hike to viewpoints like Kyanjin Ri and Cherukuri Ri, and witness breathtaking mountain vistas, including Langtang Lirung, Naya Kanga, and Dorje Lakpa.',
                    'fr' => 'Parcourez la "Vallée des Glaciers" (vallée de Langtang), randonnez jusqu\'à des points de vue comme Kyanjin Ri et Cherukuri Ri, et admirez des panoramas montagneux à couper le souffle, notamment Langtang Lirung, Naya Kanga et Dorje Lakpa.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Sacred Lakes and High Passes',
                    'fr' => 'Lacs sacrés et cols élevés',
                ],
                'description' => [
                    'en' => 'Visit the sacred Gosainkunda Lake, a pilgrimage site for Hindus, and cross the challenging Lauribina La pass (4,610m).',
                    'fr' => 'Visitez le lac sacré de Gosainkunda, un lieu de pèlerinage pour les hindous, et traversez le col exigeant de Lauribina La (4 610 m).',
                ],
            ],
            [
                'title' => [
                    'en' => 'Cultural Immersion',
                    'fr' => 'Immersion culturelle',
                ],
                'description' => [
                    'en' => 'Interact with the Tamang and Sherpa communities, experience their warm hospitality, and learn about their unique culture and traditions. Visit ancient monasteries and explore local markets and yak cheese factories.',
                    'fr' => 'Interagissez avec les communautés Tamang et Sherpa, découvrez leur hospitalité chaleureuse et apprenez-en plus sur leur culture et leurs traditions uniques. Visitez d\'anciens monastères et explorez les marchés locaux ainsi que les fabriques de fromage de yak.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Diverse Landscapes',
                    'fr' => 'Des paysages variés',
                ],
                'description' => [
                    'en' => 'Traverse remote settlements, lush meadows, dense forests (including rhododendron forests), and rugged terrain, experiencing a variety of landscapes.',
                    'fr' => 'Traversez des villages isolés, des prairies verdoyantes, des forêts denses (y compris des forêts de rhododendrons) et des terrains accidentés, en découvrant une variété de paysages.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Wildlife Encounters',
                    'fr' => 'Rencontres avec la faune',
                ],
                'description' => [
                    'en' => 'Keep an eye out for potential wildlife sightings, including langur monkeys, especially in the lower sections of the trek near Shivapuri National Park.',
                    'fr' => 'Soyez attentif aux éventuelles observations de la faune, notamment les singes langurs, en particulier dans les parties basses du trek près du parc national de Shivapuri.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Getaway from Kathmandu',
                    'fr' => 'Échappée belle depuis Katmandou',
                ],
                'description' => [
                    'en' => 'Explore the Chisapani region and the area around Sundarijal, popular destinations for those seeking a quick escape from the city.',
                    'fr' => 'Explorez la région de Chisapani et les environs de Sundarijal, des destinations populaires pour ceux qui cherchent une escapade rapide hors de la ville.',
                ],
            ],
        ];
        $kanchanjunga_highlights = [
            [
                'title' => [
                    'en' => 'Summiting the Third Highest Peak',
                    'fr' => 'L\'ascension du troisième plus haut sommet',
                ],
                'description' => [
                    'en' => 'Experience the ultimate thrill of standing atop the world\'s third highest mountain.',
                    'fr' => 'Vivez l\'exaltation ultime de vous tenir au sommet de la troisième plus haute montagne du monde.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Remote and Pristine Wilderness',
                    'fr' => 'Une nature sauvage et préservée',
                ],
                'description' => [
                    'en' => 'Trek through untouched landscapes and experience the raw beauty of the Kanchenjunga region.',
                    'fr' => 'Randonnez à travers des paysages intacts et découvrez la beauté brute de la région du Kanchenjunga.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Cultural Immersion',
                    'fr' => 'Immersion culturelle',
                ],
                'description' => [
                    'en' => 'Interact with local communities and experience the unique culture of the region.',
                    'fr' => 'Interagissez avec les communautés locales et découvrez la culture unique de la région.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Challenging Climb',
                    'fr' => 'Une ascension exigeante',
                ],
                'description' => [
                    'en' => 'Test your mountaineering skills with a technically challenging climb.',
                    'fr' => 'Testez vos compétences en alpinisme avec une ascension techniquement exigeante.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Expert Guidance',
                    'fr' => 'Encadrement par des experts',
                ],
                'description' => [
                    'en' => 'Climb with experienced guides and Sherpas who prioritize safety and success.',
                    'fr' => 'Grimpez avec des guides expérimentés et des Sherpas qui privilégient la sécurité et la réussite.',
                ],
            ],
        ];
        $highlights_8000ers = [
            [
                'title' => [
                    'en' => 'Ultimate Challenges',
                    'fr' => 'Défis Ultimes',
                ],
                'description' => [
                    'en' => 'These mountains represent the most extreme mountaineering challenges, reserved for the most experienced and physically fit climbers.',
                    'fr' => 'Ces montagnes représentent les défis d\'alpinisme les plus extrêmes, réservés aux alpinistes les plus expérimentés et en excellente condition physique.',
                ],
            ],
            [
                'title' => [
                    'en' => 'High Altitude',
                    'fr' => 'Haute Altitude',
                ],
                'description' => [
                    'en' => 'The extreme altitude presents significant risks, including altitude sickness, and requires careful acclimatization.',
                    'fr' => 'L\'altitude extrême présente des risques importants, notamment le mal d\'altitude, et nécessite une acclimatation minutieuse.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Technical Skills and Equipment',
                    'fr' => 'Compétences Techniques et Équipement',
                ],
                'description' => [
                    'en' => 'Climbing these peaks requires advanced technical skills and the use of specialized equipment.',
                    'fr' => 'L\'alpinisme sur ces sommets exige des compétences techniques avancées et l\'utilisation d\'équipement spécialisé.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Unparalleled Rewards',
                    'fr' => 'Récompenses Inégalées',
                ],
                'description' => [
                    'en' => 'Reaching the summit of an 8000m peak offers an immense sense of accomplishment and spectacular views.',
                    'fr' => 'Atteindre le sommet d\'un 8000m offre un sentiment d\'accomplissement immense et des vues spectaculaires.',
                ],
            ],
        ];
        $highlights_7000ers = [
            [
                'title' => [
                    'en' => 'Excellent Mountaineering Experience',
                    'fr' => 'Excellente Expérience d\'Alpinisme',
                ],
                'description' => [
                    'en' => 'These peaks offer a challenging mountaineering experience, suitable for climbers with some high-altitude experience.',
                    'fr' => 'Ces sommets offrent une expérience d\'alpinisme stimulante, adaptée aux grimpeurs ayant une certaine expérience en haute altitude.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Fewer Risks than 8000ers',
                    'fr' => 'Moins de Risques que les 8000m',
                ],
                'description' => [
                    'en' => 'While still challenging, these mountains generally pose fewer risks than 8000m peaks.',
                    'fr' => 'Bien que toujours difficiles, ces montagnes présentent généralement moins de risques que les 8000m.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Preparation and Acclimatization',
                    'fr' => 'Préparation et Acclimatation',
                ],
                'description' => [
                    'en' => 'Good physical preparation and proper acclimatization are essential.',
                    'fr' => 'Une bonne préparation physique et une acclimatation adéquate sont essentielles.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Panoramic Views',
                    'fr' => 'Vues Panoramiques',
                ],
                'description' => [
                    'en' => '7000m peaks offer panoramic views of the surrounding mountain ranges.',
                    'fr' => 'Les sommets de 7000m offrent des vues panoramiques sur les chaînes de montagnes environnantes.',
                ],
            ],
        ];
        $vip_highlights = [
            [
                'title' => [
                    'en' => 'Exclusive Access and Personalized Itineraries',
                    'fr' => 'Accès Exclusif et Itinéraires Personnalisés',
                ],
                'description' => [
                    'en' => 'Experience Nepal like never before with exclusive access to hidden gems, off-the-beaten-path adventures, and tailor-made itineraries designed to match your interests and preferences.',
                    'fr' => 'Découvrez le Népal comme jamais auparavant avec un accès exclusif à des joyaux cachés, des aventures hors des sentiers battus et des itinéraires sur mesure conçus pour correspondre à vos intérêts et préférences.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Luxury Accommodation and Unparalleled Comfort',
                    'fr' => 'Hébergement de Luxe et Confort Inégalé',
                ],
                'description' => [
                    'en' => 'Indulge in luxurious accommodations, from boutique hotels with breathtaking views to cozy teahouses with premium amenities, ensuring a comfortable and unforgettable stay.',
                    'fr' => 'Offrez-vous un hébergement luxueux, des hôtels de charme avec des vues imprenables aux maisons de thé confortables avec des équipements haut de gamme, garantissant un séjour confortable et inoubliable.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Private Transportation and Seamless Logistics',
                    'fr' => 'Transport Privé et Logistique Transparente',
                ],
                'description' => [
                    'en' => 'Enjoy seamless travel with private transportation, including helicopter tours, comfortable 4x4 vehicles, and experienced porters, ensuring a hassle-free and enjoyable journey.',
                    'fr' => 'Profitez d\'un voyage en toute tranquillité avec un transport privé, notamment des excursions en hélicoptère, des véhicules 4x4 confortables et des porteurs expérimentés, garantissant un voyage agréable et sans tracas.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Expert Guides and Cultural Immersion',
                    'fr' => 'Guides Experts et Immersion Culturelle',
                ],
                'description' => [
                    'en' => 'Gain deeper insights into Nepal\'s culture and traditions with expert local guides, who will share their knowledge and passion, creating an enriching and authentic experience.',
                    'fr' => 'Approfondissez vos connaissances sur la culture et les traditions du Népal avec des guides locaux experts, qui partageront leurs connaissances et leur passion, créant une expérience enrichissante et authentique.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Gourmet Dining and Local Delicacies',
                    'fr' => 'Cuisine Gastronomique et Spécialités Locales',
                ],
                'description' => [
                    'en' => 'Savor delicious meals prepared by experienced chefs, featuring a fusion of international and local flavors, catering to your dietary needs and preferences.',
                    'fr' => 'Savourez de délicieux repas préparés par des chefs expérimentés, proposant une fusion de saveurs internationales et locales, en tenant compte de vos besoins et préférences alimentaires.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Wellness and Relaxation',
                    'fr' => 'Bien-être et Détente',
                ],
                'description' => [
                    'en' => 'Unwind and rejuvenate with wellness activities like yoga sessions, spa treatments, and meditation retreats, enhancing your overall well-being during your journey.',
                    'fr' => 'Détendez-vous et ressourcez-vous avec des activités de bien-être comme des séances de yoga, des soins spa et des retraites de méditation, améliorant votre bien-être général pendant votre voyage.',
                ],
            ],
        ];
        $highlights_6000ers = [
            [
                'title' => [
                    'en' => 'Ideal for Intermediate Climbers',
                    'fr' => 'Idéal pour les Grimpeurs Intermédiaires',
                ],
                'description' => [
                    'en' => 'These peaks are an excellent choice for climbers looking to gain high-altitude experience.',
                    'fr' => 'Ces sommets sont un excellent choix pour les grimpeurs qui souhaitent acquérir de l\'expérience en haute altitude.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Less Technical than 7000m and 8000m',
                    'fr' => 'Moins Techniques que les 7000m et 8000m',
                ],
                'description' => [
                    'en' => 'The climbing is often less technical, but still requires good physical fitness.',
                    'fr' => 'L\'escalade est souvent moins technique, mais nécessite toujours une bonne condition physique.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Training Opportunity',
                    'fr' => 'Possibilité d\'Entraînement',
                ],
                'description' => [
                    'en' => 'These peaks can serve as a stepping stone for more challenging ascents in the future.',
                    'fr' => 'Ces sommets peuvent servir de tremplin pour des ascensions plus difficiles à l\'avenir.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Magnificent Views',
                    'fr' => 'Vues Magnifiques',
                ],
                'description' => [
                    'en' => '6000m peaks also offer magnificent views of the Himalayan landscapes.',
                    'fr' => 'Les sommets de 6000m offrent également des vues magnifiques sur les paysages himalayens.',
                ],
            ],
        ];

        $kathmandu_cultural_tour = [
            [
                'title' => [
                    'en' => 'Watching Sunrise at Swayambhunath Stupa',
                    'fr' => 'Assister au lever du soleil au stupa de Swayambhunath',
                ],
                'description' => [
                    'en' => 'The golden light hitting the ancient stupa while prayer flags flutter and monks chant in the background.',
                    'fr' => 'La lumière dorée frappant l\'ancien stupa pendant que les drapeaux de prière flottent et que les moines chantent en arrière-plan.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Exploring the Hidden Courtyards of Patan Durbar Square',
                    'fr' => 'Explorer les cours cachées de la place Durbar de Patan',
                ],
                'description' => [
                    'en' => 'Walking through centuries-old courtyards, admiring intricate Newari architecture and stone carvings.',
                    'fr' => 'Se promener dans des cours centenaires, admirer l\'architecture newari complexe et les sculptures sur pierre.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Tasting Local Street Food in Ason Bazaar',
                    'fr' => 'Déguster la cuisine de rue locale au bazar d\'Ason',
                ],
                'description' => [
                    'en' => 'The spicy aroma of chatpate, freshly fried sel roti, and the bustle of Kathmandu’s oldest marketplace.',
                    'fr' => 'L\'arôme épicé du chatpate, du sel roti fraîchement frit et l\'agitation du plus ancien marché de Katmandou.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Witnessing the Evening Aarti at Pashupatinath',
                    'fr' => 'Assister à l\'Aarti du soir à Pashupatinath',
                ],
                'description' => [
                    'en' => 'A mesmerizing sight of priests performing fire rituals by the sacred Bagmati River as chants fill the air.',
                    'fr' => 'Un spectacle envoûtant de prêtres accomplissant des rituels du feu au bord du fleuve sacré Bagmati pendant que les chants emplissent l\'air.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Getting Lost in the Alleyways of Thamel',
                    'fr' => 'Se perdre dans les ruelles de Thamel',
                ],
                'description' => [
                    'en' => 'Discovering hidden bookshops, vibrant handicraft stores, and cozy cafés in Kathmandu’s famous backpacker hub.',
                    'fr' => 'Découvrir des librairies cachées, des boutiques d\'artisanat dynamiques et des cafés confortables dans le célèbre quartier des routards de Katmandou.',
                ],
            ],
        ];

        $kathmandu_valley_sightseeing = [
            [
                'title' => ['en' => 'Swayambhunath — the Monkey Temple', 'fr' => 'Swayambhunath — le temple des singes'],
                'description' => ['en' => 'Climbing the 365 east-side steps to a 2,000-year-old hilltop stupa, with the all-seeing eyes of the Buddha gazing across the valley in four directions, and a panorama that on a clear day reaches the Langtang and Ganesh Himal.', 'fr' => 'Monter les 365 marches du flanc est jusqu\'à un stupa vieux de 2 000 ans, surmonté des yeux du Bouddha qui balaient la vallée dans les quatre directions, avec une vue qui, par temps clair, atteint le Langtang et le Ganesh Himal.'],
            ],
            [
                'title' => ['en' => 'Boudhanath — the largest stupa in the world', 'fr' => 'Boudhanath — le plus grand stupa du monde'],
                'description' => ['en' => 'Joining the morning kora — the clockwise circumambulation — with Tibetan refugees, maroon-robed monks and Newari Buddhists turning hundreds of prayer wheels beneath the 36-metre dome. The surrounding ring of monasteries is the spiritual heart of the Tibetan diaspora in Nepal.', 'fr' => 'Rejoindre le kora du matin — la circumambulation dans le sens horaire — avec des réfugiés tibétains, des moines en robe pourpre et des bouddhistes newars qui font tourner des centaines de moulins à prières sous le dôme de 36 mètres. L\'anneau de monastères qui l\'entoure est le cœur spirituel de la diaspora tibétaine au Népal.'],
            ],
            [
                'title' => ['en' => 'Pashupatinath — Nepal\'s holiest Hindu temple', 'fr' => 'Pashupatinath — le temple hindou le plus sacré du Népal'],
                'description' => ['en' => 'Watching the funeral pyres on the Bagmati ghats from the opposite bank — a working cremation complex, not a tourist set — with sadhus in saffron, the resident monkey troop, and the smoke of the same fires that have burned here for more than a thousand years.', 'fr' => 'Observer depuis la rive opposée les bûchers funéraires sur les ghats de la Bagmati — un complexe de crémation en activité, et non un décor touristique — avec les sadhus en orange, la troupe de singes résidente, et la fumée des mêmes feux qui brûlent ici depuis plus de mille ans.'],
            ],
            [
                'title' => ['en' => 'Patan Durbar Square — the Malla royal palace', 'fr' => 'Patan Durbar Square — le palais royal des Malla'],
                'description' => ['en' => 'The Krishna Mandir with its 21 gilded spires carved entirely from stone (no two figures alike), the Royal Bath of Sundari Chowk, the Mul Chowk courtyard and the Taleju Bell — all built between the 14th and 17th centuries by the Malla kings.', 'fr' => 'Le Krishna Mandir aux 21 flèches dorées entièrement sculptées dans la pierre (aucune figure identique), le bain royal de Sundari Chowk, la cour de Mul Chowk et la cloche Taleju — tout cela bâti entre les XIVᵉ et XVIIᵉ siècles par les rois Malla.'],
            ],
            [
                'title' => ['en' => 'Patan Museum — the finest in South Asia', 'fr' => 'Patan Museum — le plus beau d\'Asie du Sud'],
                'description' => ['en' => 'A restored wing of the old royal palace housing the largest collection of Newar bronze, gilt and stone sculpture anywhere in the world — explained on legible bilingual panels, in galleries cool and quiet enough to actually read them. Plan for at least 45 minutes inside.', 'fr' => 'Une aile restaurée de l\'ancien palais royal abritant la plus grande collection de sculptures newars en bronze, doré et pierre du monde — expliquées sur des panneaux bilingues lisibles, dans des galeries assez fraîches et calmes pour vraiment les lire. Prévoir au moins 45 minutes à l\'intérieur.'],
            ],
        ];

        $bhaktapur_cultural_tour = [
            [
                'title' => ['en' => 'Bhaktapur Durbar Square', 'fr' => 'Durbar Square de Bhaktapur'],
                'description' => ['en' => 'The 55-Window Palace, the Golden Gate, and the Vatsala Bell on a square that once held twice as many temples before the 1934 earthquake — your guide points out which silhouettes were original and which were rebuilt.', 'fr' => 'Le palais aux 55 fenêtres, la Porte d\'Or et la cloche Vatsala sur une place qui comptait autrefois deux fois plus de temples avant le séisme de 1934 — votre guide vous montre lesquelles silhouettes sont d\'origine et lesquelles ont été reconstruites.'],
            ],
            [
                'title' => ['en' => 'Nyatapola Temple at Taumadhi Square', 'fr' => 'Temple Nyatapola sur Taumadhi Square'],
                'description' => ['en' => 'Climbing the steps of Nepal\'s tallest pagoda — five tiers, 30 metres high, flanked by stone wrestlers, elephants, lions, griffins and goddesses, each rank ten times stronger than the one below.', 'fr' => 'Monter les marches de la plus haute pagode du Népal — cinq étages, 30 mètres de haut, gardée par des lutteurs de pierre, des éléphants, des lions, des griffons et des déesses, chaque rang dix fois plus puissant que le précédent.'],
            ],
            [
                'title' => ['en' => 'Pottery Square (Talako)', 'fr' => 'La place des Potiers (Talako)'],
                'description' => ['en' => 'Open-air drying yards covered in unfired clay pots, with master potters throwing on traditional wooden wheels — and the option to try a wheel yourself with a Prajapati family member.', 'fr' => 'Des cours à ciel ouvert couvertes de poteries d\'argile crue, avec des maîtres potiers travaillant sur des tours en bois traditionnels — et la possibilité d\'essayer un tour avec un membre de la famille Prajapati.'],
            ],
            [
                'title' => ['en' => 'Newari food tasting in a courtyard kitchen', 'fr' => 'Dégustation newari dans une cour-cuisine'],
                'description' => ['en' => 'Juju dhau served in unfired clay bowls, plus a samay baji platter — beaten rice, smoked buffalo, black soybeans, ginger, chhoila and aila — in a family courtyard the textbooks won\'t show you.', 'fr' => 'Juju dhau servi dans des bols en argile crue, plus un plateau samay baji — riz battu, buffle fumé, soja noir, gingembre, chhoila et aila — dans une cour familiale que les guides ne mentionnent pas.'],
            ],
            [
                'title' => ['en' => 'Dattatreya Square and the Peacock Window', 'fr' => 'Dattatreya Square et la fenêtre du paon'],
                'description' => ['en' => 'The oldest quarter of the city, named after the 15th-century Dattatreya Temple built from the timber of a single tree, with the famous Peacock Window — the most photographed piece of wood-carving in Nepal.', 'fr' => 'Le quartier le plus ancien de la ville, nommé d\'après le temple Dattatreya du XVᵉ siècle, bâti à partir du bois d\'un seul arbre, avec la célèbre fenêtre du paon — la sculpture sur bois la plus photographiée du Népal.'],
            ],
        ];

        $ebc_helicopter_tour = [
            [
                'title' => ['en' => 'Sunrise lift-off from Kathmandu', 'fr' => 'Décollage au lever du soleil depuis Katmandou'],
                'description' => ['en' => 'An early start to beat the afternoon Khumbu winds, with the Kathmandu Valley still glowing under the Himalaya skyline as you climb out.', 'fr' => 'Un départ matinal pour devancer les vents de l\'après-midi dans le Khumbu, avec la vallée de Katmandou encore éclairée par la silhouette de l\'Himalaya à l\'horizon.'],
            ],
            [
                'title' => ['en' => 'Landing on Kala Patthar (5,545 m)', 'fr' => 'Atterrissage à Kala Patthar (5 545 m)'],
                'description' => ['en' => 'Eight to ten minutes on the highest point of the day, eye-level with the south face of Everest, Nuptse, Lhotse and Pumori.', 'fr' => 'Huit à dix minutes sur le point culminant de la journée, à hauteur d\'yeux avec la face sud de l\'Everest, le Nuptse, le Lhotse et le Pumori.'],
            ],
            [
                'title' => ['en' => 'Aerial pass over Everest Base Camp and the Khumbu Icefall', 'fr' => 'Survol du camp de base de l\'Everest et de la cascade de glace du Khumbu'],
                'description' => ['en' => 'See the actual climbers\' camp and the broken seracs of the Khumbu Icefall from above, without the eight-day trek to reach them.', 'fr' => 'Découvrez d\'en haut le camp des alpinistes et les séracs disloqués de la cascade de glace, sans la marche de huit jours pour y parvenir.'],
            ],
            [
                'title' => ['en' => 'Breakfast at Hotel Everest View (3,880 m)', 'fr' => 'Petit-déjeuner à l\'Hôtel Everest View (3 880 m)'],
                'description' => ['en' => 'Buffet breakfast on the terrace of one of the world\'s highest hotels, with Ama Dablam and the Everest amphitheatre directly in front of you.', 'fr' => 'Petit-déjeuner buffet sur la terrasse de l\'un des hôtels les plus hauts du monde, face à l\'Ama Dablam et à l\'amphithéâtre de l\'Everest.'],
            ],
            [
                'title' => ['en' => 'Khumbu villages from the air', 'fr' => 'Les villages du Khumbu vus du ciel'],
                'description' => ['en' => 'Lukla, Pheriche, Tengboche monastery and the Sherpa villages spread across the valley — all in a single morning, back in Kathmandu before midday.', 'fr' => 'Lukla, Pheriche, le monastère de Tengboche et les villages sherpas répartis dans la vallée — tout cela en une matinée, retour à Katmandou avant midi.'],
            ],
        ];

        $helicopter_rescue_service = [
            [
                'title' => ['en' => '24/7 dispatch from Kathmandu', 'fr' => 'Coordination 24h/24 depuis Katmandou'],
                'description' => ['en' => 'A single phone call from your guide on the trail triggers our coordination cell day or night — we own the call sequence from that moment until you reach hospital.', 'fr' => 'Un seul appel de votre guide sur le sentier déclenche notre cellule de coordination, de jour comme de nuit — nous prenons en charge la chaîne d\'appels jusqu\'à votre arrivée à l\'hôpital.'],
            ],
            [
                'title' => ['en' => 'Insurance liaison handled for you', 'fr' => 'Liaison avec l\'assurance prise en charge pour vous'],
                'description' => ['en' => 'We talk to your insurer in real time so the flight is authorised without you handling paperwork at altitude or chasing claim numbers from a tent.', 'fr' => 'Nous échangeons avec votre assureur en temps réel pour que le vol soit autorisé sans que vous ayez à gérer la paperasse en altitude ni à chercher un numéro de dossier depuis une tente.'],
            ],
            [
                'title' => ['en' => 'HRA aid post integration', 'fr' => 'Intégration avec les postes de secours de l\'HRA'],
                'description' => ['en' => 'Where the route allows, we coordinate with Himalayan Rescue Association doctors at Pheriche, Manang and Macchermo so the patient is stabilised before the heli arrives.', 'fr' => 'Lorsque l\'itinéraire le permet, nous coordonnons avec les médecins de l\'Himalayan Rescue Association à Pheriche, Manang et Macchermo afin de stabiliser le patient avant l\'arrivée de l\'hélicoptère.'],
            ],
            [
                'title' => ['en' => 'Direct handover to a Kathmandu hospital', 'fr' => 'Transfert direct vers un hôpital de Katmandou'],
                'description' => ['en' => 'Ground transfer from the receiving airport straight to a partner hospital in Kathmandu — no scramble on arrival, no triage on the tarmac.', 'fr' => 'Transfert terrestre de l\'aéroport d\'arrivée directement vers un hôpital partenaire à Katmandou — pas d\'improvisation à l\'arrivée, pas de triage sur le tarmac.'],
            ],
        ];

        $service_activity = [
            [
                'title' => [
                    'en' => 'Tasting Local Street Food in Ason Bazaar',
                    'fr' => 'Déguster la cuisine de rue locale au bazar d\'Ason',
                ],
                'description' => [
                    'en' => 'The spicy aroma of chatpate, freshly fried sel roti, and the bustle of Kathmandu’s oldest marketplace.',
                    'fr' => 'L\'arôme épicé du chatpate, du sel roti fraîchement frit et l\'agitation du plus ancien marché de Katmandou.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Getting Lost in the Alleyways of Thamel',
                    'fr' => 'Se perdre dans les ruelles de Thamel',
                ],
                'description' => [
                    'en' => 'Discovering hidden bookshops, vibrant handicraft stores, and cozy cafés in Kathmandu’s famous backpacker hub.',
                    'fr' => 'Découvrir des librairies cachées, des boutiques d\'artisanat dynamiques et des cafés confortables dans le célèbre quartier des routards de Katmandou.',
                ],
            ],
        ];
        $ultimate_photography = [
            [
                'title' => [
                    'en' => 'Sunrise over Mount Everest',
                    'fr' => 'Lever de soleil sur le mont Everest',
                ],
                'description' => [
                    'en' => 'Capture the golden glow on the world’s highest peak from Kala Patthar.',
                    'fr' => 'Saisissez l’éclat doré sur le plus haut sommet du monde depuis Kala Patthar.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Bengal Tiger in Chitwan',
                    'fr' => 'Tigre du Bengale à Chitwan',
                ],
                'description' => [
                    'en' => 'Snap a rare shot of a tiger emerging from the jungle shadows.',
                    'fr' => 'Prenez une photo rare d’un tigre émergeant des ombres de la jungle.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Phewa Lake Reflections',
                    'fr' => 'Réflexions sur le lac Phewa',
                ],
                'description' => [
                    'en' => 'Photograph the Annapurna range mirrored in Pokhara’s serene waters.',
                    'fr' => 'Photographiez la chaîne de l’Annapurna reflétée dans les eaux calmes de Pokhara.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Dashain Festival Colors',
                    'fr' => 'Couleurs du festival Dashain',
                ],
                'description' => [
                    'en' => 'Document the vibrant rituals and family gatherings of Nepal’s biggest Hindu festival.',
                    'fr' => 'Documentez les rituels vibrants et les rassemblements familiaux du plus grand festival hindou du Népal.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Sherpa Life in Khumbu',
                    'fr' => 'Vie des Sherpas à Khumbu',
                ],
                'description' => [
                    'en' => 'Capture the weathered faces and prayer flags of Sherpa villages.',
                    'fr' => 'Saisissez les visages burinés et les drapeaux de prière des villages Sherpas.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Poon Hill Sunrise',
                    'fr' => 'Lever de soleil à Poon Hill',
                ],
                'description' => [
                    'en' => 'Shoot the fiery dawn over Annapurna and Dhaulagiri peaks.',
                    'fr' => 'Photographiez l’aube ardente sur les sommets de l’Annapurna et du Dhaulagiri.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Boudhanath Stupa at Dawn',
                    'fr' => 'Stupa de Boudhanath à l’aube',
                ],
                'description' => [
                    'en' => 'Photograph monks and incense smoke as the sun rises over this iconic stupa.',
                    'fr' => 'Photographiez les moines et la fumée d’encens au lever du soleil sur ce stupa emblématique.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Upper Mustang’s Red Cliffs',
                    'fr' => 'Falaises rouges de l’Upper Mustang',
                ],
                'description' => [
                    'en' => 'Capture the surreal desert landscapes and ancient monasteries.',
                    'fr' => 'Saisissez les paysages désertiques surréalistes et les anciens monastères.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Rhino Bathing in Chitwan',
                    'fr' => 'Rhinocéros se baignant à Chitwan',
                ],
                'description' => [
                    'en' => 'Snap a one-horned rhino enjoying a mud bath in the jungle.',
                    'fr' => 'Prenez une photo d’un rhinocéros unicorne profitant d’un bain de boue dans la jungle.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Langtang Valley Panoramas',
                    'fr' => 'Panoramas de la vallée de Langtang',
                ],
                'description' => [
                    'en' => 'Photograph sweeping Himalayan views from Kyanjin Ri with fewer crowds.',
                    'fr' => 'Photographiez des vues panoramiques de l’Himalaya depuis Kyanjin Ri avec moins de foule.',
                ],
            ],
        ];

        $this->createKeyHighlights(
            Trek::first(),
            $everest_base_camp_trek
        );
        $this->createKeyHighlights(
            Trek::find(5),
            $everest_base_camp_trek
        );
        $this->createKeyHighlights(
            Trek::find(6),
            $everest_base_camp_trek
        );
        $this->createKeyHighlights(
            Trek::find(7),
            $everest_base_camp_trek
        );
        $this->createKeyHighlights(
            Trek::find(8),
            $everest_base_camp_trek
        );
        $this->createKeyHighlights(
            Trek::find(9),
            $annapurna_base_camp_trek
        );
        $this->createKeyHighlights(
            Trek::find(10),
            $annapurna_base_camp_trek
        );
        $this->createKeyHighlights(
            Trek::find(2),
            $annapurna_base_camp_trek
        );
        $this->createKeyHighlights(
            Trek::find(3),
            $manaslu_circuit_trek
        );
        $this->createKeyHighlights(
            Trek::find(11),
            $manaslu_circuit_trek
        );
        $this->createKeyHighlights(
            Trek::find(4),
            $langtang_highlights
        );
        $this->createKeyHighlights(
            Trek::find(12),
            $langtang_highlights
        );
        $this->createKeyHighlights(
            Trek::find(13),
            $kanchanjunga_highlights
        );
        $this->createKeyHighlights(
            Trek::find(14),
            $kanchanjunga_highlights
        );
        $this->createKeyHighlights(
            Trek::find(15),
            $everest_base_camp_trek
        );
        $this->createKeyHighlights(
            Trek::find(16),
            $annapurna_base_camp_trek
        );
        $this->createKeyHighlights(
            Trek::find(17),
            $annapurna_base_camp_trek
        );
        $this->createKeyHighlights(
            Trek::find(18),
            $annapurna_base_camp_trek
        );
        $this->createKeyHighlights(
            Trek::find(19),
            $manaslu_circuit_trek
        );
        $this->createKeyHighlights(
            Trek::find(20),
            $manaslu_circuit_trek
        );
        $this->createKeyHighlights(
            Trek::find(21),
            $langtang_highlights
        );
        $this->createKeyHighlights(
            Trek::find(22),
            $langtang_highlights
        );
        $this->createKeyHighlights(
            Trek::find(23),
            $kanchanjunga_highlights
        );


        $this->createKeyHighlights(
            Expedition::first(),
            $everest_expedition
        );
        $this->createKeyHighlights(
            Expedition::find(2),
            $everest_expedition
        );
        $this->createKeyHighlights(
            Expedition::find(3),
            $kanchanjunga_highlights
        );
        $this->createKeyHighlights(
            Expedition::find(4),
            $highlights_8000ers
        );
        $this->createKeyHighlights(
            Expedition::find(5),
            $highlights_8000ers
        );
        $this->createKeyHighlights(
            Expedition::find(6),
            $highlights_8000ers
        );
        $this->createKeyHighlights(
            Expedition::find(7),
            $highlights_8000ers
        );
        $this->createKeyHighlights(
            Expedition::find(8),
            $highlights_8000ers
        );
        $this->createKeyHighlights(
            Expedition::find(9),
            $highlights_8000ers
        );
        $this->createKeyHighlights(
            Expedition::find(10),
            $highlights_8000ers
        );
        $this->createKeyHighlights(
            Expedition::find(11),
            $highlights_8000ers
        );
        $this->createKeyHighlights(
            Expedition::find(12),
            $highlights_8000ers
        );
        $this->createKeyHighlights(
            Expedition::find(13),
            $highlights_8000ers
        );
        $this->createKeyHighlights(
            Expedition::find(14),
            $highlights_8000ers
        );
        $this->createKeyHighlights(
            Expedition::find(15),
            $highlights_8000ers
        );

        $this->createKeyHighlights(
            Expedition::find(16),
            $highlights_7000ers
        );
        $this->createKeyHighlights(
            Expedition::find(17),
            $highlights_7000ers
        );
        $this->createKeyHighlights(
            Expedition::find(18),
            $highlights_7000ers
        );
        $this->createKeyHighlights(
            Expedition::find(19),
            $highlights_7000ers
        );
        $this->createKeyHighlights(
            Expedition::find(20),
            $highlights_7000ers
        );
        $this->createKeyHighlights(
            Expedition::find(21),
            $highlights_7000ers
        );
        $this->createKeyHighlights(
            Expedition::find(22),
            $highlights_7000ers
        );
        $this->createKeyHighlights(
            Expedition::find(23),
            $highlights_7000ers
        );

        $this->createKeyHighlights(
            Expedition::find(24),
            $vip_highlights
        );
        $this->createKeyHighlights(
            Expedition::find(25),
            $vip_highlights
        );

        $this->createKeyHighlights(
            Expedition::find(26),
            $lobuche_peak_climbing
        );
        $this->createKeyHighlights(
            Expedition::find(27),
            $highlights_6000ers
        );
        $this->createKeyHighlights(
            Expedition::find(28),
            $highlights_6000ers
        );
        $this->createKeyHighlights(
            Expedition::find(29),
            $highlights_6000ers
        );
        $this->createKeyHighlights(
            Expedition::find(30),
            $highlights_6000ers
        );
        $this->createKeyHighlights(
            Expedition::find(31),
            $highlights_6000ers
        );
        $this->createKeyHighlights(
            Expedition::find(32),
            $highlights_6000ers
        );
        $this->createKeyHighlights(
            Expedition::find(33),
            $highlights_6000ers
        );
        $this->createKeyHighlights(
            Expedition::find(34),
            $highlights_6000ers
        );
        $this->createKeyHighlights(
            Expedition::find(35),
            $highlights_6000ers
        );



        $this->createKeyHighlights(
            Tour::first(),
            $kathmandu_valley_sightseeing
        );
        $this->createKeyHighlights(
            Tour::find(2),
            $kathmandu_cultural_tour
        );
        $this->createKeyHighlights(
            Tour::find(3),
            $kathmandu_cultural_tour
        );
        $this->createKeyHighlights(
            Tour::find(4),
            $ultimate_photography
        );
        $this->createKeyHighlights(
            Tour::find(5),
            $bhaktapur_cultural_tour
        );
        $this->createKeyHighlights(
            Tour::find(6),
            $ebc_helicopter_tour
        );
        $this->createKeyHighlights(
            Tour::find(7),
            $helicopter_rescue_service
        );
    }
    protected function createKeyHighlights(Model $model, array $points): void
    {

        foreach ($points as $point) {
            if (isset($point) && is_array($point)) {
                $model->keyHighlights()->create($point);
            }
        }
    }
}
