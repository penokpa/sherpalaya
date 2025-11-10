<?php

namespace Database\Seeders;

use App\Enums\TrekDifficulty;
use App\Helpers\CuratorSeederHelper;
use App\Models\Category;
use App\Models\Destination;
use App\Models\Region;
use App\Models\Trek;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PHPUnit\Framework\Constraint\IsFalse;

class TrekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //id1

        $trek = Trek::create([
            'title' => [
                'en' => 'Everest Base Camp Trek',
                'fr' => 'Trek au camp de base de l\'Everest',
            ],
            'description' => [
                'en' => 'Followed by Real Sherpa’s village everybody wants to see a glimpse of the world’s highest mountain and that’s the reason why the Everest Base Camp Trek is very popular. The trek has a number of stunning attractions, not least of these is being able to say you’ve visited the highest mountain in the world. The trek gets you right into the high-altitude heart of the high Himalaya, more so than any other teahouse trek. There are some lovely villages and gompas (monasteries), and the friendly Sherpa people of the Solukhumbu region make trekking through the area a joy.

        Everest Base Camp Trekking is known as the one of the most popular trekking in the world with the most thrilling and unforgettable experience of them all. If you are in search of quality service, Nepal Everest base camp trekking company provides you with quality services, guide and other necessary things which are needed for the trekking. We ensure that you won’t regret your decision for choosing us

        The best season for this trip starts from beginning of March to May and  September to October is also favorable for the trek. During the trek, you can easily find food(local and continental), comfortable lodges. Hot shower is also available for some extra charge. Supplies are shipped to the Base Camp by guides or porters, and with the help of animals, usually yaks, mules and Jyopkyos.',
                'fr' => 'Après le village de Real Sherpa, tout le monde veut apercevoir la plus haute montagne du monde et c\'est la raison pour laquelle le trek au camp de base de l\'Everest est très populaire. Le trek possède un certain nombre d\'attractions étonnantes, dont la moindre n\'est pas de pouvoir dire que vous avez visité la plus haute montagne du monde. Le trek vous emmène directement au cœur de la haute altitude du haut Himalaya, plus que tout autre trek en maison de thé. Il y a de jolis villages et des gompas (monastères), et les sympathiques Sherpas de la région de Solukhumbu rendent le trekking dans la région agréable.

        Le trekking au camp de base de l\'Everest est connu comme l\'un des treks les plus populaires au monde, avec l\'expérience la plus passionnante et inoubliable de tous. Si vous êtes à la recherche d\'un service de qualité, la société de trekking Nepal Everest Base Camp vous fournit des services de qualité, un guide et d\'autres éléments nécessaires au trekking. Nous vous assurons que vous ne regretterez pas votre décision de nous choisir.

        La meilleure saison pour ce voyage commence du début mars à mai et de septembre à octobre est également favorable pour le trek. Pendant le trek, vous pouvez facilement trouver de la nourriture (locale et continentale), des lodges confortables. Une douche chaude est également disponible moyennant un supplément. Les fournitures sont expédiées au camp de base par des guides ou des porteurs, et avec l\'aide d\'animaux, généralement des yaks, des mules et des Jyopkyos.',
            ],
            'duration' => '10',
            'grade' => '7',
            'starting_point' => 'Lukla',
            'ending_point' => 'Kathmandu',
            'best_time_for_trek' => [
                'en' => 'Autumn (Sep-Oct-Nov) and Spring (March-April-May)',
                'fr' => 'Automne (sept.-oct.-nov.) et printemps (mars-avril-mai)',
            ],
            'starting_altitude' => 2610,
            'highest_altitude' => 5545,
            'region_id' => Region::first()->id,
            'category_id' => Category::find(7)->id,
            'trek_difficulty' => TrekDifficulty::CHALLENGING,
            'costs_include' => [
                [
                    'en' => 'Transfer from airport to your hotel during both arrival and departure.',
                    'fr' => 'Transfert de l\'aéroport à votre hôtel à l\'arrivée et au départ.',
                ],
                [
                    'en' => 'Stay three nights in Kathmandu with a BB plan.',
                    'fr' => 'Séjour de trois nuits à Katmandou avec un plan BB.',
                ],
                [
                    'en' => 'Go sightseeing around Kathmandu on a private vehicle.',
                    'fr' => 'Visite de Katmandou en véhicule privé.',
                ],
                [
                    'en' => 'All entrance fees during Kathmandu Day Tour.',
                    'fr' => 'Tous les frais d\'entrée pendant la visite d\'une journée à Katmandou.',
                ],
                [
                    'en' => 'Ground 4x4 luxury transportation through the private vehicle as referred to in the itinerary.',
                    'fr' => 'Transport terrestre de luxe 4x4 en véhicule privé comme indiqué dans l\'itinéraire.',
                ],
                [
                    'en' => 'All mandatory permit fees, including entry permit, national park permit, and restricted area permit.',
                    'fr' => 'Tous les frais de permis obligatoires, y compris le permis d\'entrée, le permis de parc national et le permis de zone restreinte.',
                ],
                [
                    'en' => 'Accommodation in tea houses or lodges during the trekking.',
                    'fr' => 'Hébergement dans des maisons de thé ou des lodges pendant le trekking.',
                ],
                [
                    'en' => 'Three-course meals (breakfast, lunch, and dinner) during the trekking period.',
                    'fr' => 'Repas à trois plats (petit-déjeuner, déjeuner et dîner) pendant la période de trekking.',
                ],
                [
                    'en' => 'A skillful trekking guide with excellent communication skills.',
                    'fr' => 'Un guide de trekking compétent avec d\'excellentes compétences en communication.',
                ],
                [
                    'en' => 'Two porters for three trekkers during the trekking.',
                    'fr' => 'Deux porteurs pour trois trekkeurs pendant le trekking.',
                ],
                [
                    'en' => 'Insurance for the guide and porters.',
                    'fr' => 'Assurance pour le guide et les porteurs.',
                ],
                [
                    'en' => 'Farewell dinner at Kathmandu.',
                    'fr' => 'Dîner d\'adieu à Katmandou.',
                ],
                [
                    'en' => 'All applicable VAT, Tax, and needed paperwork.',
                    'fr' => 'Toutes les TVA, taxes et documents nécessaires applicables.',
                ],
            ],
            'costs_exclude' => [
                [
                    'en' => 'Dinner and lunch in Kathmandu except for the farewell dinner.',
                    'fr' => 'Dîner et déjeuner à Katmandou, à l\'exception du dîner d\'adieu.',
                ],
                [
                    'en' => 'Your personal expenses for mineral water, soft beverages, confectionaries, laundries, phone calls, hot drinking water, bar bills, showers, etc.',
                    'fr' => 'Vos dépenses personnelles pour l\'eau minérale, les boissons non alcoolisées, les confiseries, la lessive, les appels téléphoniques, l\'eau potable chaude, les notes de bar, les douches, etc.',
                ],
                [
                    'en' => 'Internet facility, battery chargers, multi-plugs, etc.',
                    'fr' => 'Installation Internet, chargeurs de batterie, multiprises, etc.',
                ],
                [
                    'en' => 'Personal trekking equipment.',
                    'fr' => 'Équipement de trekking personnel.',
                ],
                [
                    'en' => 'Your travel insurance that covers Helicopter evacuation.',
                    'fr' => 'Votre assurance voyage qui couvre l\'évacuation par hélicoptère.',
                ],
                [
                    'en' => 'Medical expenses and trip cancellation.',
                    'fr' => 'Frais médicaux et annulation de voyage.',
                ],
                [
                    'en' => 'Any other extended trips and accommodation.',
                    'fr' => 'Tous les autres voyages prolongés et hébergements.',
                ],
                [
                    'en' => 'Tips for the guide, porters, and driver as a token of appreciation.',
                    'fr' => 'Pourboires pour le guide, les porteurs et le chauffeur en signe d\'appréciation.',
                ],
                [
                    'en' => 'Any other expenses or charges that are not mentioned in the "costs include" list.',
                    'fr' => 'Tous les autres frais ou charges qui ne sont pas mentionnés dans la liste "coûts inclus".',
                ],
                [
                    'en' => 'Nepal arrival visa.',
                    'fr' => 'Visa d\'arrivée au Népal.',
                ],
            ],
            'is_featured' => true,
        ]);
        $trek->destinations()->sync(
            Destination::where('region_id', 1)
                ->inRandomOrder()
                ->limit(5)
                ->get()
                ->pluck('id')
                ->toArray()
        );
        CuratorSeederHelper::seedBelongsTo(
            $trek,
            'cover_image_id',
            public_path('photos/basecamp.JPG')
        );
        CuratorSeederHelper::seedBelongsTo(
            $trek,
            'feature_image_id',
            public_path('photos/basecamp.JPG')
        );



        //id2

        $trek2 = Trek::create([
            'title' => [
                'en' => 'Annapurna Base Camp Trek',
                'fr' => 'Trek au camp de base de l\'Annapurna',
            ],
            'description' => [
                'en' => 'The Annapurna Base Camp (ABC) Trek is one of the most popular trekking routes in Nepal, offering breathtaking views of the Annapurna massif and other Himalayan peaks.',
                'fr' => 'Le trek au camp de base de l\'Annapurna (ABC) est l\'un des itinéraires de trekking les plus populaires au Népal, offrant des vues à couper le souffle sur le massif de l\'Annapurna et d\'autres sommets himalayens.',
            ],
            'duration' => '7',
            'grade' => '6',
            'starting_point' => 'Nayapul',
            'ending_point' => 'Nayapul',
            'best_time_for_trek' => [
                'en' => 'Spring (March-May) and Autumn (September-November)',
                'fr' => 'Printemps (mars-mai) et automne (septembre-novembre)',
            ],
            'starting_altitude' => 1070,
            'highest_altitude' => 4130,
            'region_id' => 3,
            'category_id' => Category::find(8)->id,
            'trek_difficulty' => TrekDifficulty::MODERATE,
            'costs_include' => [
                [
                    'en' => 'Transfer from airport to your hotel during both arrival and departure.',
                    'fr' => 'Transfert de l\'aéroport à votre hôtel à l\'arrivée et au départ.',
                ],
                [
                    'en' => 'Stay two nights in Kathmandu and two nights in Pokhara with a BB plan.',
                    'fr' => 'Séjour de deux nuits à Katmandou et de deux nuits à Pokhara avec un plan BB.',
                ],
                [
                    'en' => 'Go sightseeing around Kathmandu on a private vehicle.',
                    'fr' => 'Visite de Katmandou en véhicule privé.',
                ],
                [
                    'en' => 'All entrance fees during Kathmandu and Pokhara Day Tours.',
                    'fr' => 'Tous les frais d\'entrée pendant les visites d\'une journée à Katmandou et Pokhara.',
                ],
                [
                    'en' => 'Ground 4x4 luxury transportation through the private vehicle as referred to in the itinerary.',
                    'fr' => 'Transport terrestre de luxe 4x4 en véhicule privé comme indiqué dans l\'itinéraire.',
                ],
                [
                    'en' => 'All mandatory permit fees, including TIMS card and Annapurna Conservation Area Permit.',
                    'fr' => 'Tous les frais de permis obligatoires, y compris la carte TIMS et le permis de zone de conservation de l\'Annapurna.',
                ],
                [
                    'en' => 'Accommodation in tea houses or lodges during the trekking.',
                    'fr' => 'Hébergement dans des maisons de thé ou des lodges pendant le trekking.',
                ],
                [
                    'en' => 'Three-course meals (breakfast, lunch, and dinner) during the trekking period.',
                    'fr' => 'Repas à trois plats (petit-déjeuner, déjeuner et dîner) pendant la période de trekking.',
                ],
                [
                    'en' => 'A skillful trekking guide with excellent communication skills.',
                    'fr' => 'Un guide de trekking compétent avec d\'excellentes compétences en communication.',
                ],
                [
                    'en' => 'Two porters for three trekkers during the trekking.',
                    'fr' => 'Deux porteurs pour trois trekkeurs pendant le trekking.',
                ],
                [
                    'en' => 'Insurance for the guide and porters.',
                    'fr' => 'Assurance pour le guide et les porteurs.',
                ],
                [
                    'en' => 'Farewell dinner at Kathmandu.',
                    'fr' => 'Dîner d\'adieu à Katmandou.',
                ],
                [
                    'en' => 'All applicable VAT, Tax, and needed paperwork.',
                    'fr' => 'Toutes les TVA, taxes et documents nécessaires applicables.',
                ],
            ],
            'costs_exclude' => [
                [
                    'en' => 'Dinner and lunch in Kathmandu and Pokhara except for the farewell dinner.',
                    'fr' => 'Dîner et déjeuner à Katmandou et Pokhara, à l\'exception du dîner d\'adieu.',
                ],
                [
                    'en' => 'Your personal expenses for mineral water, soft beverages, confectionaries, laundries, phone calls, hot drinking water, bar bills, showers, etc.',
                    'fr' => 'Vos dépenses personnelles pour l\'eau minérale, les boissons non alcoolisées, les confiseries, la lessive, les appels téléphoniques, l\'eau potable chaude, les notes de bar, les douches, etc.',
                ],
                [
                    'en' => 'Internet facility, battery chargers, multi-plugs, etc.',
                    'fr' => 'Installation Internet, chargeurs de batterie, multiprises, etc.',
                ],
                [
                    'en' => 'Personal trekking equipment.',
                    'fr' => 'Équipement de trekking personnel.',
                ],
                [
                    'en' => 'Your travel insurance that covers Helicopter evacuation.',
                    'fr' => 'Votre assurance voyage qui couvre l\'évacuation par hélicoptère.',
                ],
                [
                    'en' => 'Medical expenses and trip cancellation.',
                    'fr' => 'Frais médicaux et annulation de voyage.',
                ],
                [
                    'en' => 'Any other extended trips and accommodation.',
                    'fr' => 'Tous les autres voyages prolongés et hébergements.',
                ],
                [
                    'en' => 'Tips for the guide, porters, and driver as a token of appreciation.',
                    'fr' => 'Pourboires pour le guide, les porteurs et le chauffeur en signe d\'appréciation.',
                ],
                [
                    'en' => 'Any other expenses or charges that are not mentioned in the "costs include" list.',
                    'fr' => 'Tous les autres frais ou charges qui ne sont pas mentionnés dans la liste "coûts inclus".',
                ],
                [
                    'en' => 'Nepal arrival visa.',
                    'fr' => 'Visa d\'arrivée au Népal.',
                ],
            ],
            'is_featured' => true,
        ]);
        $trek2->destinations()->sync(
            Destination::where('region_id', 3)
                ->inRandomOrder()
                ->limit(5)
                ->get()
                ->pluck('id')
                ->toArray()
        );
        CuratorSeederHelper::seedBelongsTo(
            $trek2,
            'cover_image_id',
            public_path('photos/basecamp2.JPG')
        );
        CuratorSeederHelper::seedBelongsTo(
            $trek2,
            'feature_image_id',
            public_path('photos/basecamp2.JPG')
        );

        CuratorSeederHelper::seedBelongsToMany(
            $trek2,
            'images',
            public_path('photos/mountain3.jpg')
        );
        CuratorSeederHelper::seedBelongsToMany(
            $trek2,
            'images',
            public_path('photos/mountain2.jpg')
        );
        CuratorSeederHelper::seedBelongsToMany(
            $trek2,
            'images',
            public_path('photos/mountain1.jpg')
        );
        CuratorSeederHelper::seedBelongsToMany(
            $trek2,
            'images',
            public_path('photos/mountain4.jpg')
        );

        //id3

        $trek3 = Trek::create([
            'title' => [
                'en' => 'Manaslu Circuit Trek',
                'fr' => 'Trek du circuit de Manaslu',
            ],
            'description' => [
                'en' => 'The Manaslu Circuit Trek is a remote and stunning journey around the world’s eighth-highest peak, Mt. Manaslu (8,163m). This trek offers a spectacular blend of rich cultural heritage, breathtaking landscapes, and challenging high-altitude trekking.',
                'fr' => 'Le trek du circuit de Manaslu est un voyage isolé et époustouflant autour du huitième plus haut sommet du monde, le mont Manaslu (8 163 m). Ce trek offre un mélange spectaculaire de riche patrimoine culturel, de paysages à couper le souffle et de trekking difficile en haute altitude.',
            ],
            'duration' => '14',
            'grade' => '8',
            'starting_point' => 'Soti Khola',
            'ending_point' => 'Besisahar',
            'best_time_for_trek' => [
                'en' => 'Spring (March-May) and Autumn (September-November)',
                'fr' => 'Printemps (mars-mai) et automne (septembre-novembre)',
            ],
            'starting_altitude' => 710,
            'highest_altitude' => 5160,
            'region_id' => 3,
            'category_id' => Category::find(8)->id,
            'trek_difficulty' => TrekDifficulty::CHALLENGING,
            'costs_include' => [
                [
                    'en' => 'Airport transfers upon arrival and departure.',
                    'fr' => 'Transferts aéroport à l\'arrivée et au départ.',
                ],
                [
                    'en' => 'Three nights in Kathmandu with a BB plan.',
                    'fr' => 'Trois nuits à Katmandou avec un plan BB.',
                ],
                [
                    'en' => 'Sightseeing tour in Kathmandu on a private vehicle.',
                    'fr' => 'Visite touristique à Katmandou en véhicule privé.',
                ],
                [
                    'en' => 'All necessary trekking permits (Manaslu Conservation Area, Annapurna Conservation Area, and Restricted Area Permit).',
                    'fr' => 'Tous les permis de trekking nécessaires (zone de conservation de Manaslu, zone de conservation de l\'Annapurna et permis de zone restreinte).',
                ],
                [
                    'en' => 'Tea house or lodge accommodation during the trek.',
                    'fr' => 'Hébergement dans des maisons de thé ou des lodges pendant le trek.',
                ],
                [
                    'en' => 'Three-course meals (breakfast, lunch, and dinner) during the trekking period.',
                    'fr' => 'Repas à trois plats (petit-déjeuner, déjeuner et dîner) pendant la période de trekking.',
                ],
                [
                    'en' => 'A professional English-speaking trekking guide.',
                    'fr' => 'Un guide de trekking professionnel anglophone.',
                ],
                [
                    'en' => 'Porters to carry your luggage (1 porter for 2 trekkers).',
                    'fr' => 'Porteurs pour transporter vos bagages (1 porteur pour 2 trekkeurs).',
                ],
                [
                    'en' => 'Insurance for the guide and porters.',
                    'fr' => 'Assurance pour le guide et les porteurs.',
                ],
                [
                    'en' => 'Ground transportation as per the itinerary.',
                    'fr' => 'Transport terrestre selon l\'itinéraire.',
                ],
                [
                    'en' => 'All applicable government taxes and service charges.',
                    'fr' => 'Toutes les taxes gouvernementales et frais de service applicables.',
                ],
            ],
            'costs_exclude' => [
                [
                    'en' => 'Lunch and dinner in Kathmandu except for the farewell dinner.',
                    'fr' => 'Déjeuner et dîner à Katmandou, à l\'exception du dîner d\'adieu.',
                ],
                [
                    'en' => 'Personal trekking gear and equipment.',
                    'fr' => 'Équipement de trekking personnel.',
                ],
                [
                    'en' => 'Internet, battery charging, and hot showers at lodges.',
                    'fr' => 'Internet, recharge de batterie et douches chaudes dans les lodges.',
                ],
                [
                    'en' => 'Personal expenses such as laundry, drinks, and phone calls.',
                    'fr' => 'Dépenses personnelles telles que la lessive, les boissons et les appels téléphoniques.',
                ],
                [
                    'en' => 'Travel insurance covering medical emergencies and helicopter evacuation.',
                    'fr' => 'Assurance voyage couvrant les urgences médicales et l\'évacuation par hélicoptère.',
                ],
                [
                    'en' => 'Medical expenses and trip cancellations.',
                    'fr' => 'Frais médicaux et annulations de voyage.',
                ],
                [
                    'en' => 'Any extra nights in Kathmandu due to early arrival or late departure.',
                    'fr' => 'Toutes les nuits supplémentaires à Katmandou en raison d\'une arrivée anticipée ou d\'un départ tardif.',
                ],
                [
                    'en' => 'Gratuities for guides, porters, and drivers.',
                    'fr' => 'Pourboires pour les guides, les porteurs et les chauffeurs.',
                ],
                [
                    'en' => 'Nepal entry visa fees.',
                    'fr' => 'Frais de visa d\'entrée au Népal.',
                ],
            ],
            'is_featured' => false,
        ]);
        $trek3->destinations()->sync(
            Destination::where('region_id', 3)
                ->inRandomOrder()
                ->limit(5)
                ->get()
                ->pluck('id')
                ->toArray()
        );
        CuratorSeederHelper::seedBelongsTo(
            $trek3,
            'cover_image_id',
            public_path('photos/basecamp3.JPG')
        );
        CuratorSeederHelper::seedBelongsTo(
            $trek3,
            'feature_image_id',
            public_path('photos/basecamp3.JPG')
        );
        CuratorSeederHelper::seedBelongsToMany(
            $trek3,
            'images',
            public_path('photos/mountain9.jpg')
        );
        CuratorSeederHelper::seedBelongsToMany(
            $trek3,
            'images',
            public_path('photos/mountain8.jpg')
        );

        //id4

        $trek4 = Trek::create([
            'title' => [
                'en' => 'Langtang Gosainkunda Trek',
                'fr' => 'Trek de Langtang Gosainkunda',
            ],
            'description' => [
                'en' => 'The Langtang Gosainkunda trek is a popular trekking route in Nepal that combines the scenic beauty of the Langtang Valley with the spiritual significance of the Gosainkunda lakes. This trek offers diverse landscapes, ranging from lush green valleys and rhododendron forests to high-altitude alpine terrain and glacial lakes.  Its a culturally rich experience, allowing you to interact with the Tamang people and explore their unique traditions. The trek culminates at the sacred Gosainkunda lakes, a significant pilgrimage site for Hindus.  It is considered a moderate to challenging trek, suitable for those with some prior trekking experience.

                The Langtang Gosainkunda trek offers a unique blend of natural beauty, cultural immersion, and spiritual significance. Its a great alternative to the more crowded Everest Base Camp trek, offering a more peaceful and intimate trekking experience. The best time to undertake this trek is during the pre-monsoon (March-May) and post-monsoon (September-November) seasons.',
                'fr' => 'Le trek de Langtang Gosainkunda est un itinéraire de trekking populaire au Népal qui combine la beauté pittoresque de la vallée de Langtang avec la signification spirituelle des lacs de Gosainkunda. Ce trek offre des paysages diversifiés, allant de vallées verdoyantes luxuriantes et de forêts de rhododendrons à un terrain alpin de haute altitude et à des lacs glaciaires. C\'est une expérience culturellement riche, vous permettant d\'interagir avec le peuple Tamang et d\'explorer leurs traditions uniques. Le trek culmine aux lacs sacrés de Gosainkunda, un important lieu de pèlerinage pour les hindous. Il est considéré comme un trek modéré à difficile, adapté à ceux qui ont une certaine expérience de trekking.

                Le trek de Langtang Gosainkunda offre un mélange unique de beauté naturelle, d\'immersion culturelle et de signification spirituelle. C\'est une excellente alternative au trek plus fréquenté du camp de base de l\'Everest, offrant une expérience de trekking plus paisible et intime. Le meilleur moment pour entreprendre ce trek est pendant les saisons de pré-mousson (mars-mai) et de post-mousson (septembre-novembre).',
            ],
            'duration' => '17',
            'grade' => '6',
            'starting_point' => 'Syabrubesi',
            'ending_point' => 'Kathmandu',
            'best_time_for_trek' => [
                'en' => 'Autumn (Sep-Oct-Nov) and Spring (March-April-May)',
                'fr' => 'Automne (sept.-oct.-nov.) et printemps (mars-avril-mai)',
            ],
            'starting_altitude' => 1462,
            'highest_altitude' => 4609,
            'region_id' => Region::find(4)->id,
            'category_id' => Category::find(9)->id,
            'trek_difficulty' => TrekDifficulty::CHALLENGING,
            'costs_include' => [
                [
                    'en' => 'Arrival and Departure Transport.',
                    'fr' => 'Transport d\'arrivée et de départ.',
                ],
                [
                    'en' => 'Accommodation in Kathmandu (Twin sharing) with breakfast.',
                    'fr' => 'Hébergement à Katmandou (chambre double) avec petit-déjeuner.',
                ],
                [
                    'en' => 'Trekking Duffle Bag.',
                    'fr' => 'Sac de voyage de trekking.',
                ],
                [
                    'en' => 'Breakfast, Lunch and Dinner during the Trekking.',
                    'fr' => 'Petit-déjeuner, déjeuner et dîner pendant le trekking.',
                ],
                [
                    'en' => 'Accommodation in Tea house (mountain lodge) during trekking.',
                    'fr' => 'Hébergement dans une maison de thé (lodge de montagne) pendant le trekking.',
                ],
                [
                    'en' => 'Kathmandu - Syabrubesi and Sundarijal - Kathmandu transport.',
                    'fr' => 'Transport Katmandou - Syabrubesi et Sundarijal - Katmandou.',
                ],
                [
                    'en' => 'Trekking Porter with Insurance (1 porter for 2 pax).',
                    'fr' => 'Porteur de trekking avec assurance (1 porteur pour 2 personnes).',
                ],
                [
                    'en' => 'Trekking Guide with insurance.',
                    'fr' => 'Guide de trekking avec assurance.',
                ],
                [
                    'en' => 'Trekking Guide and Porters food and accommodation, wages etc.',
                    'fr' => 'Nourriture et hébergement, salaires, etc. du guide de trekking et des porteurs.',
                ],
                [
                    'en' => 'Langtang Gosainkunda Trekking map.',
                    'fr' => 'Carte de trekking de Langtang Gosainkunda.',
                ],
                [
                    'en' => 'First Aid kit.',
                    'fr' => 'Trousse de premiers secours.',
                ],
                [
                    'en' => 'Trekker’s Information Management system (TIMS).',
                    'fr' => 'Système de gestion de l\'information des trekkeurs (TIMS).',
                ],
                [
                    'en' => 'Langtang National park entry fees.',
                    'fr' => 'Frais d\'entrée du parc national de Langtang.',
                ],
                [
                    'en' => 'Water purification tablets.',
                    'fr' => 'Pastilles de purification de l\'eau.',
                ],
                [
                    'en' => 'Farewell dinner with cultural program.',
                    'fr' => 'Dîner d\'adieu avec programme culturel.',
                ],
                [
                    'en' => 'Government taxes.',
                    'fr' => 'Taxes gouvernementales.',
                ],
                [
                    'en' => 'Office service charge.',
                    'fr' => 'Frais de service de bureau.',
                ],
            ],
            'costs_exclude' => [
                [
                    'en' => 'International Airfare.',
                    'fr' => 'Billet d\'avion international.',
                ],
                [
                    'en' => 'Travel insurance.',
                    'fr' => 'Assurance voyage.',
                ],
                [
                    'en' => 'Nepal entry Visa fee (US$ 50 for 30 days ad US$ 30 for 15 days).',
                    'fr' => 'Frais de visa d\'entrée au Népal (50 $ US pour 30 jours et 30 $ US pour 15 jours).',
                ],
                [
                    'en' => 'Drinks, Dessert, Juice, Mineral Water, Heater charge, Hot Shower during the Trekking and main meals in cities.',
                    'fr' => 'Boissons, dessert, jus, eau minérale, frais de chauffage, douche chaude pendant le trekking et repas principaux dans les villes.',
                ],
                [
                    'en' => 'Tips for Guide, Porter and driver.',
                    'fr' => 'Pourboires pour le guide, le porteur et le chauffeur.',
                ],
            ],
            'is_featured' => false,
        ]);

        $trek4->destinations()->sync(
            Destination::where('region_id', 4) // Or appropriate region ID
                ->inRandomOrder()
                ->limit(5) // Adjust the number of destinations as needed
                ->get()
                ->pluck('id')
                ->toArray()
        );

        CuratorSeederHelper::seedBelongsTo(
            $trek4,
            'cover_image_id',
            public_path('photos/basecamp4.JPG') // Replace with actual image path
        );
        CuratorSeederHelper::seedBelongsTo(
            $trek4,
            'feature_image_id',
            public_path('photos/basecamp4.JPG') // Replace with actual image path
        );

        CuratorSeederHelper::seedBelongsToMany(
            $trek4,
            'images',
            public_path('photos/mountain3.jpg') // Replace with actual image path, can be an array of paths
        );

        //id5

        $everest_panorama_trek_data = Trek::create([
            'title' => [
                'en' => 'Everest Panorama Trek',
                'fr' => 'Trek Panoramique de l\'Everest',
            ],
            'description' => [
                'en' => 'The Everest Panorama Trek is a short and relatively easy trek in the Everest region, perfect for those wanting stunning views of Everest without the challenges of high-altitude treks.  It offers a blend of natural beauty, Sherpa culture, and breathtaking mountain scenery, including Everest, Lhotse, Nuptse, and Ama Dablam. Trekkers experience the unique lifestyle of the Sherpa people, explore charming villages like Namche Bazaar and Khumjung, and hike to viewpoints like Hotel Everest View for unforgettable panoramic vistas.',
                'fr' => 'Le Trek Panoramique de l\'Everest est un trek court et relativement facile dans la région de l\'Everest, parfait pour ceux qui souhaitent des vues imprenables sur l\'Everest sans les défis des treks de haute altitude. Il offre un mélange de beauté naturelle, de culture sherpa et de paysages de montagne à couper le souffle, notamment l\'Everest, le Lhotse, le Nuptse et l\'Ama Dablam. Les trekkeurs découvrent le mode de vie unique du peuple sherpa, explorent de charmants villages comme Namche Bazaar et Khumjung, et font de la randonnée jusqu\'à des points de vue comme l\'Hotel Everest View pour des panoramas inoubliables.',
            ],
            'duration' => '12',
            'grade' => '5',
            'starting_point' => 'Kathmandu',
            'ending_point' => 'Kathmandu',
            'best_time_for_trek' => [
                'en' => 'September to May',
                'fr' => 'Septembre à Mai',
            ],
            'starting_altitude' => 1400,
            'highest_altitude' => 3962,
            'region_id' => Region::first()->id,
            'category_id' => Category::find(7)->id,
            'trek_difficulty' => TrekDifficulty::MODERATE,
            'costs_include' => [
                [
                    'en' => 'Airport transfers',
                    'fr' => 'Transferts aéroport',
                ],
                [
                    'en' => 'Kathmandu accommodation',
                    'fr' => 'Hébergement à Katmandou',
                ],
                [
                    'en' => 'Sightseeing tour in Kathmandu',
                    'fr' => 'Visite touristique à Katmandou',
                ],
                [
                    'en' => 'Flight to/from Lukla',
                    'fr' => 'Vol aller-retour pour Lukla',
                ],
                [
                    'en' => 'Accommodation in teahouses during trek',
                    'fr' => 'Hébergement dans des maisons de thé pendant le trek',
                ],
                [
                    'en' => 'Meals (breakfast, lunch, dinner) during trek',
                    'fr' => 'Repas (petit-déjeuner, déjeuner, dîner) pendant le trek',
                ],
                [
                    'en' => 'Experienced trekking guide',
                    'fr' => 'Guide de trekking expérimenté',
                ],
                [
                    'en' => 'Porters to carry luggage',
                    'fr' => 'Porteurs pour transporter les bagages',
                ],
                [
                    'en' => 'Sagarmatha National Park entry permit',
                    'fr' => 'Permis d\'entrée au parc national de Sagarmatha',
                ],
                [
                    'en' => 'TIMS card (Trekker\'s Information Management System)',
                    'fr' => 'Carte TIMS (Système de gestion de l\'information des trekkeurs)',
                ],
            ],
            'costs_exclude' => [
                [
                    'en' => 'Personal expenses (drinks, snacks, souvenirs)',
                    'fr' => 'Dépenses personnelles (boissons, collations, souvenirs)',
                ],
                [
                    'en' => 'Lunch and dinner in Kathmandu',
                    'fr' => 'Déjeuner et dîner à Katmandou',
                ],
                [
                    'en' => 'Tips for guide and porters',
                    'fr' => 'Pourboires pour le guide et les porteurs',
                ],
                [
                    'en' => 'Travel insurance',
                    'fr' => 'Assurance voyage',
                ],
                [
                    'en' => 'Visa fees',
                    'fr' => 'Frais de visa',
                ],
            ],
            'is_featured' => false,
        ]);
        // Associate destinations (replace with actual logic to select relevant destinations)
        $everest_panorama_trek_data->destinations()->sync(
            Destination::where('region_id', 1) // Assuming region_id 1 is Everest region
                ->inRandomOrder()
                ->limit(5)
                ->get()
                ->pluck('id')
                ->toArray()
        );
        CuratorSeederHelper::seedBelongsTo(
            $everest_panorama_trek_data,
            'cover_image_id',
            public_path('photos/mountain2.jpg')
        );

        CuratorSeederHelper::seedBelongsTo(
            $everest_panorama_trek_data,
            'feature_image_id',
            public_path('photos/mountain2.jpg')
        );

        CuratorSeederHelper::seedBelongsToMany(
            $everest_panorama_trek_data,
            'images',
            public_path('photos/mountain4.jpg')
        );


        //id6

        $gokyo_valley_trek_data = Trek::create([
            'title' => [
                'en' => 'Gokyo Valley Trek',
                'fr' => 'Trek de la vallée de Gokyo',
            ],
            'description' => [
                'en' => 'Trek to the stunning Gokyo Lakes in the Khumbu region, offering spectacular views of Everest and other Himalayan giants.  Explore Sherpa villages and enjoy a less crowded, more tranquil trekking experience.',
                'fr' => 'Trek vers les magnifiques lacs de Gokyo dans la région de Khumbu, offrant des vues spectaculaires sur l\'Everest et d\'autres géants himalayens. Explorez les villages sherpas et profitez d\'une expérience de trekking moins fréquentée et plus tranquille.',
            ],
            'duration' => '14', // Example duration
            'grade' => '7', // Example grade
            'starting_point' => 'Lukla', // Example
            'ending_point' => 'Lukla', // Example
            'best_time_for_trek' => [
                'en' => 'Autumn (Sep-Oct-Nov) and Spring (Mar-Apr-May)', // Example
                'fr' => 'Automne (sept.-oct.-nov.) et printemps (mars-avril-mai)', // Example
            ],
            'starting_altitude' => 2840, // Example
            'highest_altitude' => 5400, // Example
            'region_id' => Region::first()->id, // Make sure your regions table is seeded
            'category_id' => Category::find(7)->id,
            'trek_difficulty' => TrekDifficulty::CHALLENGING, // Or appropriate difficulty
            'costs_include' => [
                [
                    'en' => 'Airport transfers',
                    'fr' => 'Transferts aéroport',
                ],
                [
                    'en' => 'Accommodation in Kathmandu',
                    'fr' => 'Hébergement à Katmandou',
                ],
                [
                    'en' => 'Flight to/from Lukla',
                    'fr' => 'Vol aller-retour pour Lukla',
                ],
                // ... Add ALL your ACTUAL "costs include" items here in this format! ...
            ],
            'costs_exclude' => [
                [
                    'en' => 'International airfare',
                    'fr' => 'Billet d\'avion international',
                ],
                [
                    'en' => 'Visa fees',
                    'fr' => 'Frais de visa',
                ],
                [
                    'en' => 'Personal expenses',
                    'fr' => 'Dépenses personnelles',
                ],
                // ... Add ALL your ACTUAL "costs exclude" items here in this format! ...
            ],
            'is_featured' => false,
        ]);
        $gokyo_valley_trek_data->destinations()->sync(
            Destination::where('region_id', 1)
                ->inRandomOrder()
                ->limit(5)
                ->get()
                ->pluck('id')
                ->toArray()
        );
        CuratorSeederHelper::seedBelongsTo(
            $gokyo_valley_trek_data,
            'cover_image_id',
            public_path('photos/mountain1.jpg') // Replace with the actual path
        );

        CuratorSeederHelper::seedBelongsTo(
            $gokyo_valley_trek_data,
            'feature_image_id',
            public_path('photos/mountain1.jpg') // Replace with the actual path
        );

        CuratorSeederHelper::seedBelongsToMany(
            $gokyo_valley_trek_data,
            'images',
            public_path('photos/mountain4.jpg')
        );


        //id7

        $everest_three_passes_trek_data = Trek::create([
            'title' => [
                'en' => 'Everest Three Passes Trek',
                'fr' => 'Trek des Trois Passages de l\'Everest',
            ],
            'description' => [
                'en' => 'Kongma La, Cho La, and Renjo La are the three infamous passes of the Khumbu region that connect the different sections of the region- hence, it is called the Everest Three Passes trek. It is a thrilling 21 days expedition in Nepal, offering a unique blend of adventure, local heritage, and stunning mountain panoramas. The Everest Three Passes trek is like a circuit trek that provides an opportunity for trekkers to go beyond the classic EBC trail and discover the hidden gems of the Khumbu region. If you are traveling to Nepal and you have strong physical and mental fitness, you should definitely do the Everest Three Passes trekking. Do note that this trek is very demanding. It is not a leisure walk in the mountains. You will face high altitudes, varying climatic zones, offbeat terrain, and limited tourist infrastructure. So, only when you are ready to commit and push yourself join the Everest Three Passes trek 21 days with us. The journey will reward you for all the hard walk with some of the greatest mountain vistas on Earth. Not only that, but the hospitality of the Sherpas, the interactions with fellow trekkers and locals along the way, the ancient cultural roots, and all the stories and myths surrounding the trails will make the trek a once in a lifetime venture for you.',
                'fr' => 'Kongma La, Cho La et Renjo La sont les trois passages tristement célèbres de la région de Khumbu qui relient les différentes sections de la région - d\'où son nom, le trek des Trois Passages de l\'Everest. Il s\'agit d\'une expédition passionnante de 21 jours au Népal, offrant un mélange unique d\'aventure, de patrimoine local et de superbes panoramas de montagne. Le trek des Trois Passages de l\'Everest est comme un trek en circuit qui offre aux trekkeurs la possibilité d\'aller au-delà du sentier classique du CBE et de découvrir les joyaux cachés de la région de Khumbu. Si vous voyagez au Népal et que vous avez une bonne condition physique et mentale, vous devriez absolument faire le trekking des Trois Passages de l\'Everest. Notez que ce trek est très exigeant. Ce n\'est pas une promenade de loisir en montagne. Vous ferez face à de hautes altitudes, à des zones climatiques variées, à un terrain hors des sentiers battus et à une infrastructure touristique limitée. Par conséquent, seulement lorsque vous êtes prêt à vous engager et à vous dépasser, rejoignez le trek des Trois Passages de l\'Everest de 21 jours avec nous. Le voyage vous récompensera pour toute la marche difficile avec certaines des plus belles vues de montagne sur Terre. Non seulement cela, mais l\'hospitalité des Sherpas, les interactions avec les autres trekkeurs et les habitants le long du chemin, les anciennes racines culturelles et toutes les histoires et mythes entourant les sentiers feront du trek une aventure unique dans votre vie.',
            ],
            'duration' => '21',
            'grade' => '8', // Example: Strenuous
            'starting_point' => 'Kathmandu',
            'ending_point' => 'Kathmandu',
            'best_time_for_trek' => [
                'en' => 'September to May',
                'fr' => 'Septembre à Mai',
            ],
            'starting_altitude' => 1400, // Kathmandu's altitude (approx.)
            'highest_altitude' => 5545,
            'region_id' => Region::first()->id, // Replace with the correct Region ID
            'category_id' => Category::find(7)->id,
            'trek_difficulty' => TrekDifficulty::CHALLENGING,  // Or appropriate difficulty
            'costs_include' => [
                [
                    'en' => 'All Transport (Private)',
                    'fr' => 'Tous les transports (privés)',
                ],
                [
                    'en' => 'Standard Accommodation (Twin share) in Kathmandu with Breakfast',
                    'fr' => 'Hébergement standard (chambre double) à Katmandou avec petit-déjeuner',
                ],
                [
                    'en' => 'Duffle Bag for Trekking',
                    'fr' => 'Sac de voyage pour le trekking',
                ],
                [
                    'en' => 'Breakfast, Lunch and Dinner during the Trekking',
                    'fr' => 'Petit-déjeuner, déjeuner et dîner pendant le trekking',
                ],
                [
                    'en' => 'Accommodation in Tea house (mountain lodge) while trekking',
                    'fr' => 'Hébergement dans une maison de thé (lodge de montagne) pendant le trekking',
                ],
                [
                    'en' => 'Domestic Flight with Airport Tax',
                    'fr' => 'Vol intérieur avec taxes d\'aéroport',
                ],
                [
                    'en' => 'Trekking Porter with Insurance (1 porter for two trekkers)',
                    'fr' => 'Porteur de trekking avec assurance (1 porteur pour deux trekkeurs)',
                ],
                [
                    'en' => 'Trekking Guide with insurance',
                    'fr' => 'Guide de trekking avec assurance',
                ],
                [
                    'en' => 'Trekking Guide and Porters food and accommodation, wages etc.',
                    'fr' => 'Nourriture et hébergement, salaires, etc. du guide de trekking et des porteurs',
                ],
                [
                    'en' => 'Everest Three Passes Trekking map',
                    'fr' => 'Carte de trekking des Trois Passages de l\'Everest',
                ],
                [
                    'en' => 'Sagarmatha (Everest) National park permits fee',
                    'fr' => 'Frais de permis du parc national de Sagarmatha (Everest)',
                ],
                [
                    'en' => 'Farewell dinner with cultural program',
                    'fr' => 'Dîner d\'adieu avec programme culturel',
                ],
                [
                    'en' => 'Khumbu Pasang Lhamu Rural Municipality entry permit fee',
                    'fr' => 'Frais de permis d\'entrée de la municipalité rurale de Khumbu Pasang Lhamu',
                ],
                [
                    'en' => 'Trekker’s Information Management system (TIMS)',
                    'fr' => 'Système de gestion de l\'information des trekkeurs (TIMS)',
                ],
                [
                    'en' => 'All Government taxes (Income tax plus VAT)',
                    'fr' => 'Toutes les taxes gouvernementales (impôt sur le revenu plus TVA)',
                ],
                [
                    'en' => 'Office services charge',
                    'fr' => 'Frais de service de bureau',
                ],
                [
                    'en' => 'Water purification tablets',
                    'fr' => 'Pastilles de purification de l\'eau',
                ],
            ],
            'costs_exclude' => [
                [
                    'en' => 'International Airfare',
                    'fr' => 'Billet d\'avion international',
                ],
                [
                    'en' => 'Your travel insurance of any kind',
                    'fr' => 'Votre assurance voyage de toute nature',
                ],
                [
                    'en' => 'Nepal entry Visa fee (US$ 50 for 30 days) (US$ 30 for 15 days)',
                    'fr' => 'Frais de visa d\'entrée au Népal (50 $ US pour 30 jours) (30 $ US pour 15 jours)',
                ],
                [
                    'en' => 'Drinks, Dessert, Juice, Mineral Water, Heater charge, Hot Shower, Wi-Fi etc. during the Trekking and main meals in cities',
                    'fr' => 'Boissons, dessert, jus, eau minérale, frais de chauffage, douche chaude, Wi-Fi, etc. pendant le trekking et les principaux repas dans les villes',
                ],
                [
                    'en' => 'Tips for Guide, Porter and driver',
                    'fr' => 'Pourboires pour le guide, le porteur et le chauffeur',
                ],
            ],
            'is_featured' => false,
        ]);
        $everest_three_passes_trek_data->destinations()->sync(
            Destination::where('region_id', 1)
                ->inRandomOrder()
                ->limit(5)
                ->get()
                ->pluck('id')
                ->toArray()
        );


        CuratorSeederHelper::seedBelongsTo(
            $everest_three_passes_trek_data,
            'cover_image_id',
            public_path('photos/mountain3.jpg') // Replace with the actual path
        );

        CuratorSeederHelper::seedBelongsTo(
            $everest_three_passes_trek_data,
            'feature_image_id',
            public_path('photos/mountain3.jpg') // Replace with the actual path
        );

        CuratorSeederHelper::seedBelongsToMany(
            $everest_three_passes_trek_data,
            'images',
            public_path('photos/mountain4.jpg')
        );


        //id8

        $renjo_la_pass_trek_data = Trek::create([
            'title' => [
                'en' => 'Renjo La Pass Trek',
                'fr' => 'Trek du col de Renjo La',
            ],
            'description' => [
                'en' => 'Gokyo Lakes and Renjo La pass trekking adventure offers a fresh option for high pass trekking in the Everest region. This trek is not too demanding like the Three High Passes, but it definitely tests your limits. On this epic trek in Nepal, you will explore the lovely Sherpa villages and the stunning Gokyo Lakes. Packed with adventure, lifetime experience, and intimate encounters with the locals, the Renjo La pass trek is a fantastic two-week trekking program! While traversing the lush rhododendron forests and winding hillsides, see the rich biodiversity of the region. Share trails with mules and locals frequently. In April and May, the trekking route is most beautiful. During this time, flowers bloom throughout the lower part of the route. Likewise, you will also enjoy the Renjo La pass trek in March, late September, October, November, and December. Trekkers who are looking for a less crowded, pristine trail in the Everest region will love the Renjola pass trek. The views along this trek route are phenomenal. You will see many mountains including Everest (8,849 m/29,032 ft), Ama Dablam (6,812 m/22,349 ft), Thamserku (6,608 m/21,680 ft), Island Peak (6,165 m/20,226 ft), Makalu (8,463 m/27,766 ft), Cho Oyu (8,188 m/26,864 ft), Nuptse (7,861 m/25,791 ft), etc.',
                'fr' => 'L\'aventure de trekking des lacs de Gokyo et du col de Renjo La offre une nouvelle option pour le trekking de haut col dans la région de l\'Everest. Ce trek n\'est pas aussi exigeant que les Trois Hauts Cols, mais il teste définitivement vos limites. Lors de ce trek épique au Népal, vous explorerez les charmants villages sherpas et les magnifiques lacs de Gokyo. Rempli d\'aventure, d\'une expérience unique et de rencontres intimes avec les habitants, le trek du col de Renjo La est un fantastique programme de trekking de deux semaines ! En traversant les forêts luxuriantes de rhododendrons et les flancs de collines sinueux, découvrez la riche biodiversité de la région. Partagez fréquemment les sentiers avec les mules et les habitants. En avril et mai, l\'itinéraire de trekking est le plus beau. Pendant cette période, les fleurs éclosent dans toute la partie inférieure de l\'itinéraire. De même, vous apprécierez également le trek du col de Renjo La en mars, fin septembre, octobre, novembre et décembre. Les trekkeurs qui recherchent un sentier moins fréquenté et vierge dans la région de l\'Everest adoreront le trek du col de Renjo La. Les vues le long de cet itinéraire de trek sont phénoménales. Vous verrez de nombreuses montagnes, notamment l\'Everest (8 849 m/29 032 pi), l\'Ama Dablam (6 812 m/22 349 pi), le Thamserku (6 608 m/21 680 pi), l\'Island Peak (6 165 m/20 226 pi), le Makalu (8 463 m/27 766 pi), le Cho Oyu (8 188 m/26 864 pi), le Nuptse (7 861 m/25 791 pi), etc.',
            ],
            'duration' => '14',
            'grade' => '7', // Example: Strenuous
            'starting_point' => 'Kathmandu',
            'ending_point' => 'Kathmandu',
            'best_time_for_trek' => [
                'en' => 'September to May',
                'fr' => 'Septembre à Mai',
            ],
            'starting_altitude' => 1400, // Kathmandu's altitude (approx.)
            'highest_altitude' => 5360,
            'region_id' => Region::first()->id, // Replace with the correct Region ID
            'category_id' => Category::find(7)->id,
            'trek_difficulty' => TrekDifficulty::CHALLENGING,  // Or appropriate difficulty
            'costs_include' => [
                [
                    'en' => 'All Transport (Private)',
                    'fr' => 'Tous les transports (privés)',
                ],
                [
                    'en' => 'Standard Accommodation (Twin share) in Kathmandu with Breakfast',
                    'fr' => 'Hébergement standard (chambre double) à Katmandou avec petit-déjeuner',
                ],
                [
                    'en' => 'Duffle Bag for Trekking',
                    'fr' => 'Sac de voyage pour le trekking',
                ],
                [
                    'en' => 'Breakfast, Lunch and Dinner during the Trekking',
                    'fr' => 'Petit-déjeuner, déjeuner et dîner pendant le trekking',
                ],
                [
                    'en' => 'Accommodation in Tea house (mountain lodge) while trekking',
                    'fr' => 'Hébergement dans une maison de thé (lodge de montagne) pendant le trekking',
                ],
                [
                    'en' => 'Domestic Flight with Airport Tax',
                    'fr' => 'Vol intérieur avec taxes d\'aéroport',
                ],
                [
                    'en' => 'Trekking Porter with Insurance (1 porter for two trekkers)',
                    'fr' => 'Porteur de trekking avec assurance (1 porteur pour deux trekkeurs)',
                ],
                [
                    'en' => 'Trekking Guide with insurance',
                    'fr' => 'Guide de trekking avec assurance',
                ],
                [
                    'en' => 'Trekking Guide and Porters food and accommodation, wages etc.',
                    'fr' => 'Nourriture et hébergement, salaires, etc. du guide de trekking et des porteurs',
                ],
                [
                    'en' => 'Everest Three Passes Trekking map',
                    'fr' => 'Carte de trekking des Trois Passages de l\'Everest',
                ],
                [
                    'en' => 'Sagarmatha (Everest) National park permits fee',
                    'fr' => 'Frais de permis du parc national de Sagarmatha (Everest)',
                ],
                [
                    'en' => 'Farewell dinner with cultural program',
                    'fr' => 'Dîner d\'adieu avec programme culturel',
                ],
                [
                    'en' => 'Khumbu Pasang Lhamu Rural Municipality entry permit fee',
                    'fr' => 'Frais de permis d\'entrée de la municipalité rurale de Khumbu Pasang Lhamu',
                ],
                [
                    'en' => 'Trekker’s Information Management system (TIMS)',
                    'fr' => 'Système de gestion de l\'information des trekkeurs (TIMS)',
                ],
                [
                    'en' => 'All Government taxes (Income tax plus VAT)',
                    'fr' => 'Toutes les taxes gouvernementales (impôt sur le revenu plus TVA)',
                ],
                [
                    'en' => 'Office services charge',
                    'fr' => 'Frais de service de bureau',
                ],
                [
                    'en' => 'Water purification tablets',
                    'fr' => 'Pastilles de purification de l\'eau',
                ],
            ],
            'costs_exclude' => [
                [
                    'en' => 'International Airfare',
                    'fr' => 'Billet d\'avion international',
                ],
                [
                    'en' => 'Your travel insurance of any kind',
                    'fr' => 'Votre assurance voyage de toute nature',
                ],
                [
                    'en' => 'Nepal entry Visa fee (US$ 50 for 30 days) (US$ 30 for 15 days)',
                    'fr' => 'Frais de visa d\'entrée au Népal (50 $ US pour 30 jours) (30 $ US pour 15 jours)',
                ],
                [
                    'en' => 'Drinks, Dessert, Juice, Mineral Water, Heater charge, Hot Shower, Wi-Fi etc. during the Trekking and main meals in cities',
                    'fr' => 'Boissons, dessert, jus, eau minérale, frais de chauffage, douche chaude, Wi-Fi, etc. pendant le trekking et les principaux repas dans les villes',
                ],
                [
                    'en' => 'Tips for Guide, Porter and driver',
                    'fr' => 'Pourboires pour le guide, le porteur et le chauffeur',
                ],
            ],
            'is_featured' => false,
        ]);
        $renjo_la_pass_trek_data->destinations()->sync(
            Destination::where('region_id', 1)
                ->inRandomOrder()
                ->limit(5)
                ->get()
                ->pluck('id')
                ->toArray()
        );

        CuratorSeederHelper::seedBelongsTo(
            $renjo_la_pass_trek_data,
            'cover_image_id',
            public_path('photos/mountain9.jpg') // Replace with the actual path
        );

        CuratorSeederHelper::seedBelongsTo(
            $renjo_la_pass_trek_data,
            'feature_image_id',
            public_path('photos/mountain9.jpg') // Replace with the actual path
        );

        CuratorSeederHelper::seedBelongsToMany(
            $renjo_la_pass_trek_data,
            'images',
            public_path('photos/mountain4.jpg')
        );

        //id9

        $annapurna_dhaulagiri_trek_data = Trek::create([
            'title' => [
                'en' => 'Annapurna Dhaulagiri Trek',
                'fr' => 'Trek Annapurna Dhaulagiri',
            ],
            'description' => [
                'en' => 'Annapurna Dhaulagiri Trek is a less explored trekking destination in the heart of Annapurna Region. Being so close with many popular treks such as Ghorepani Poonhill Trek and Annapurna Base Camp Trek, this trek is still unknown to many travelers which offers a thrilling off the beaten path trekking experience to everyone. With some of the amazing panoramic views of the Annapurna and Dhaulagiri Range, this region is perfect for travelers looking for less crowded trails in Nepal. Annapurna Dhaulagiri Trek, also commonly known as Khopra Ridge / Danda Trek is an easy trek in the Annapurna that allows the travelers to go deep into dense forests along with climbs up to grassy pastures. People with kids or old age citizens anyone will be able to complete the trek without any difficulty. Another special feature of this trek is to witness magical sunrises from multiple spots i.e Poonhill (3,210 m / 10,531 ft) and Muldai View Point (3,637m / 11,932 ft). The panoramic view of Dhaulagiri I, Annapurna I, Tukuche Peak, Nilgiri South and North, Annapurna South, Hiuchuli, Machhapuchre (Fishtail) from these sunrise spots can leave you speechless.',
                'fr' => 'Le trek Annapurna Dhaulagiri est une destination de trekking moins explorée au cœur de la région de l\'Annapurna. Étant si proche de nombreux treks populaires tels que le trek Ghorepani Poonhill et le trek du camp de base de l\'Annapurna, ce trek est encore inconnu de nombreux voyageurs, ce qui offre une expérience de trekking hors des sentiers battus passionnante à tous. Avec certaines des vues panoramiques incroyables des chaînes de l\'Annapurna et du Dhaulagiri, cette région est parfaite pour les voyageurs à la recherche de sentiers moins fréquentés au Népal. Le trek Annapurna Dhaulagiri, également connu sous le nom de trek Khopra Ridge / Danda, est un trek facile dans l\'Annapurna qui permet aux voyageurs d\'aller au plus profond des forêts denses avec des ascensions jusqu\'à des pâturages. Les personnes avec des enfants ou des personnes âgées pourront effectuer le trek sans difficulté. Une autre particularité de ce trek est d\'assister à des levers de soleil magiques depuis plusieurs endroits, à savoir Poonhill (3 210 m / 10 531 pi) et Muldai View Point (3 637 m / 11 932 pi). La vue panoramique du Dhaulagiri I, de l\'Annapurna I, du Tukuche Peak, du Nilgiri Sud et Nord, de l\'Annapurna Sud, du Hiuchuli, du Machhapuchre (Queue de poisson) depuis ces points de vue au lever du soleil peut vous laisser sans voix.',
            ],
            'duration' => '14',
            'grade' => '5', // Example: Moderate
            'starting_point' => 'Pokhara', // Example
            'ending_point' => 'Pokhara', // Example
            'best_time_for_trek' => [
                'en' => 'September to May',
                'fr' => 'Septembre à Mai',
            ],
            'starting_altitude' => 1000, // Example
            'highest_altitude' => 4660,
            'region_id' => Region::find(3)->id, // Replace with the correct Region ID (Annapurna)
            'category_id' => Category::find(8)->id,
            'trek_difficulty' => TrekDifficulty::MODERATE, // Or appropriate difficulty
            'costs_include' => [
                [
                    'en' => 'Arrival and Departure Transport',
                    'fr' => 'Transport d\'arrivée et de départ',
                ],
                [
                    'en' => 'Accommodation in Kathmandu and Pokhara with breakfast',
                    'fr' => 'Hébergement à Katmandou et Pokhara avec petit-déjeuner',
                ],
                [
                    'en' => 'Duffle Bag for Trekking',
                    'fr' => 'Sac de voyage pour le trekking',
                ],
                [
                    'en' => 'Breakfast, Lunch & Dinner during the Trekking',
                    'fr' => 'Petit-déjeuner, déjeuner et dîner pendant le trekking',
                ],
                [
                    'en' => 'Accommodation in Tea house (mountain lodge) while trekking (In Khopra be Dormitory sometimes)',
                    'fr' => 'Hébergement dans une maison de thé (lodge de montagne) pendant le trekking (À Khopra, il peut parfois s\'agir d\'un dortoir)',
                ],
                [
                    'en' => 'Pokhara-Ghandruk and Nayapul Pokhara Transport',
                    'fr' => 'Transport Pokhara-Ghandruk et Nayapul Pokhara',
                ],
                [
                    'en' => 'Kathmandu-Pokhara drive',
                    'fr' => 'Trajet Katmandou-Pokhara',
                ],
                [
                    'en' => 'Pokhara - Kathmandu flights with airport Tax',
                    'fr' => 'Vols Pokhara - Katmandou avec taxes d\'aéroport',
                ],
                [
                    'en' => 'Trekking Porter with Insurance (1 Porter for 2 Pax)',
                    'fr' => 'Porteur de trekking avec assurance (1 porteur pour 2 personnes)',
                ],
                [
                    'en' => 'Trekking Guide with insurance',
                    'fr' => 'Guide de trekking avec assurance',
                ],
                [
                    'en' => 'Trekking guide and porter\'s food and accommodation, wages etc.',
                    'fr' => 'Nourriture et hébergement, salaires, etc. du guide de trekking et des porteurs',
                ],
                [
                    'en' => 'First Aid kit',
                    'fr' => 'Trousse de premiers secours',
                ],
                [
                    'en' => 'Water purification tablets',
                    'fr' => 'Pastilles de purification de l\'eau',
                ],
                [
                    'en' => 'Farewell dinner with cultural program',
                    'fr' => 'Dîner d\'adieu avec programme culturel',
                ],
                [
                    'en' => 'Annapurna Dhaulagiri Trekking Region map',
                    'fr' => 'Carte de la région de trekking d\'Annapurna Dhaulagiri',
                ],
                [
                    'en' => 'Annapurna Conservation Area Project (ACAP) entry permit fee',
                    'fr' => 'Frais de permis d\'entrée du projet de zone de conservation d\'Annapurna (ACAP)',
                ],
                [
                    'en' => 'Trekker’s Information Management system (TIMS)',
                    'fr' => 'Système de gestion de l\'information des trekkeurs (TIMS)',
                ],
                [
                    'en' => 'All Government taxes VAT',
                    'fr' => 'Toutes les taxes gouvernementales TVA',
                ],
                [
                    'en' => 'Office service charge',
                    'fr' => 'Frais de service de bureau',
                ],
            ],
            'costs_exclude' => [
                [
                    'en' => 'International Airfare',
                    'fr' => 'Billet d\'avion international',
                ],
                [
                    'en' => 'Your travel insurance',
                    'fr' => 'Votre assurance voyage',
                ],
                [
                    'en' => 'Nepal entry Visa fee (US$ 30 for 15 days and US$ 50 for 30 days)',
                    'fr' => 'Frais de visa d\'entrée au Népal (30 $ US pour 15 jours et 50 $ US pour 30 jours)',
                ],
                [
                    'en' => 'Drinks, Dessert, Juice, Mineral Water, Heater charge, Hot Shower during the Trekking and main meals in cities',
                    'fr' => 'Boissons, dessert, jus, eau minérale, frais de chauffage, douche chaude pendant le trekking et les principaux repas dans les villes',
                ],
                [
                    'en' => 'Tips for Guide, Porter and driver',
                    'fr' => 'Pourboires pour le guide, le porteur et le chauffeur',
                ],
            ],
            'is_featured' => false,
        ]);
        $annapurna_dhaulagiri_trek_data->destinations()->sync(
            Destination::where('region_id', 3)
                ->inRandomOrder()
                ->limit(5)
                ->get()
                ->pluck('id')
                ->toArray()
        );

        CuratorSeederHelper::seedBelongsTo(
            $annapurna_dhaulagiri_trek_data,
            'cover_image_id',
            public_path('photos/trek1.JPG') // Replace with the actual path
        );

        CuratorSeederHelper::seedBelongsTo(
            $annapurna_dhaulagiri_trek_data,
            'feature_image_id',
            public_path('photos/trek1.JPG') // Replace with the actual path
        );

        CuratorSeederHelper::seedBelongsToMany(
            $annapurna_dhaulagiri_trek_data,
            'images',
            public_path('photos/mountain4.jpg')
        );

        //id10

        $mardi_himal_trek_data = Trek::create([
            'title' => [
                'en' => 'Mardi Himal Trek',
                'fr' => 'Trek du Mardi Himal',
            ],
            'description' => [
                'en' => 'Mardi Himal (5,587m), first summited in 1961 lies on the lap of Mt. Machhapuchhre (Fishtail). The trek to Mardi Himal was not so popular a few decades ago. With the special effort of locals Mardi Himal Trek was opened to travelers from all over the world in 2012 A.D. This trekking is located at North of Pokhara valley in the Annapurna Region and has close up views of Annapurna South (7,219m), Hiuchuli (6,440m), Annapurna I (8,091m), Gangapurna (7,455), Annapurna III (7,555m) and Fishtail (6,993m). Mardi Himal Trek also offers you to witness wide variation in vegetation as we trek from 900 meters to all the way up to 4,500 meters. As we continue further towards Base Camp the dense Oak and Rhododendron forest turn into short grasslands meadows. In a short span of time travelers have the opportunity to witness different landscapes of Annapurna in Mardi Trek. Likewise, walking in the Rhododendron forest in the spring season while it blossoms is a moment that will be remembered for a long time. Anybody who treks to Mardi Himal Base Camp during spring will automatically fall in love with this region or Nepal in general. Along with splendid Himalayan views you will be treated to great hospitality of the Gurung community.',
                'fr' => 'Le Mardi Himal (5 587 m), dont la première ascension a eu lieu en 1961, se trouve au pied du mont Machhapuchhre (Queue de poisson). Le trek du Mardi Himal n\'était pas si populaire il y a quelques décennies. Grâce aux efforts spéciaux des habitants, le trek du Mardi Himal a été ouvert aux voyageurs du monde entier en 2012 après J.-C. Ce trekking est situé au nord de la vallée de Pokhara dans la région de l\'Annapurna et offre des vues rapprochées de l\'Annapurna Sud (7 219 m), du Hiuchuli (6 440 m), de l\'Annapurna I (8 091 m), du Gangapurna (7 455 m), de l\'Annapurna III (7 555 m) et du Fishtail (6 993 m). Le trek du Mardi Himal vous offre également la possibilité d\'observer une grande variété de végétation lors de notre trek de 900 mètres jusqu\'à 4 500 mètres. Alors que nous continuons vers le camp de base, la forêt dense de chênes et de rhododendrons se transforme en prairies courtes. En peu de temps, les voyageurs ont la possibilité d\'observer différents paysages de l\'Annapurna lors du trek du Mardi. De même, se promener dans la forêt de rhododendrons au printemps, pendant qu\'elle fleurit, est un moment dont on se souviendra longtemps. Toute personne qui se rend au camp de base du Mardi Himal au printemps tombera automatiquement amoureuse de cette région ou du Népal en général. Outre les splendides vues sur l\'Himalaya, vous bénéficierez de la grande hospitalité de la communauté Gurung.',
            ],
            'duration' => '14',
            'grade' => '5', // Example: Moderate
            'starting_point' => 'Kathmandu',
            'ending_point' => 'Kathmandu',
            'best_time_for_trek' => [
                'en' => 'September to May',
                'fr' => 'Septembre à Mai',
            ],
            'starting_altitude' => 1400, // Kathmandu's altitude (approx.)
            'highest_altitude' => 4500,
            'region_id' => Region::find(3)->id, // Replace with the correct Region ID (Annapurna)
            'category_id' => Category::find(8)->id,
            'trek_difficulty' => TrekDifficulty::MODERATE, // Or appropriate difficulty
            'costs_include' => [
                [
                    'en' => 'Arrival and Departure Transport',
                    'fr' => 'Transport d\'arrivée et de départ',
                ],
                [
                    'en' => 'Accommodation in Kathmandu and Pokhara with breakfast',
                    'fr' => 'Hébergement à Katmandou et Pokhara avec petit-déjeuner',
                ],
                [
                    'en' => 'Duffle Bag for Trekking',
                    'fr' => 'Sac de voyage pour le trekking',
                ],
                [
                    'en' => 'Breakfast, Lunch & Dinner during the Trekking',
                    'fr' => 'Petit-déjeuner, déjeuner et dîner pendant le trekking',
                ],
                [
                    'en' => 'Accommodation in Tea house (mountain lodge) while trekking',
                    'fr' => 'Hébergement dans une maison de thé (lodge de montagne) pendant le trekking',
                ],
                [
                    'en' => 'Pokhara-Hyangja and Lumre Pokhara drive',
                    'fr' => 'Trajet Pokhara-Hyangja et Lumre Pokhara',
                ],
                [
                    'en' => 'Kathmandu-Pokhara drive (Tourist Bus)',
                    'fr' => 'Trajet Katmandou-Pokhara (bus touristique)',
                ],
                [
                    'en' => 'Pokhara - Kathmandu flights (Buddha Air) with airport tax',
                    'fr' => 'Vols Pokhara - Katmandou (Buddha Air) avec taxes d\'aéroport',
                ],
                [
                    'en' => 'Trekking Porter with Insurance (1 Porter for 2 Pax)',
                    'fr' => 'Porteur de trekking avec assurance (1 porteur pour 2 personnes)',
                ],
                [
                    'en' => 'Trekking Guide with insurance',
                    'fr' => 'Guide de trekking avec assurance',
                ],
                [
                    'en' => 'Trekking guide and porter\'s food and accommodation, wages etc.',
                    'fr' => 'Nourriture et hébergement, salaires, etc. du guide de trekking et des porteurs',
                ],
                [
                    'en' => 'First Aid kit',
                    'fr' => 'Trousse de premiers secours',
                ],
                [
                    'en' => 'Mardi Himal Trekking map',
                    'fr' => 'Carte de trekking du Mardi Himal',
                ],
                [
                    'en' => 'Annapurna Conservation Area Project (ACAP) entry permit fee',
                    'fr' => 'Frais de permis d\'entrée du projet de zone de conservation d\'Annapurna (ACAP)',
                ],
                [
                    'en' => 'Trekker’s Information Management system (TIMS)',
                    'fr' => 'Système de gestion de l\'information des trekkeurs (TIMS)',
                ],
                [
                    'en' => 'Farewell dinner with cultural program',
                    'fr' => 'Dîner d\'adieu avec programme culturel',
                ],
                [
                    'en' => 'Water purification tablets',
                    'fr' => 'Pastilles de purification de l\'eau',
                ],
                [
                    'en' => 'All Government taxes',
                    'fr' => 'Toutes les taxes gouvernementales',
                ],
                [
                    'en' => 'Office service charge',
                    'fr' => 'Frais de service de bureau',
                ],
            ],
            'costs_exclude' => [
                [
                    'en' => 'International Airfare',
                    'fr' => 'Billet d\'avion international',
                ],
                [
                    'en' => 'Your travel insurance',
                    'fr' => 'Votre assurance voyage',
                ],
                [
                    'en' => 'Nepal entry Visa fee (US$ 30 for 15 days and US$ 50 for 30 days)',
                    'fr' => 'Frais de visa d\'entrée au Népal (30 $ US pour 15 jours et 50 $ US pour 30 jours)',
                ],
                [
                    'en' => 'Drinks, Dessert, Juice, Mineral Water, Heater charge, Hot Shower during the Trekking and main meals in cities',
                    'fr' => 'Boissons, dessert, jus, eau minérale, frais de chauffage, douche chaude pendant le trekking et les principaux repas dans les villes',
                ],
                [
                    'en' => 'Tips for Guide, Porter and driver',
                    'fr' => 'Pourboires pour le guide, le porteur et le chauffeur',
                ],
            ],
            'is_featured' => false,
        ]);
        $mardi_himal_trek_data->destinations()->sync(
            Destination::where('region_id', 3)
                ->inRandomOrder()
                ->limit(5)
                ->get()
                ->pluck('id')
                ->toArray()
        );
        CuratorSeederHelper::seedBelongsTo(
            $mardi_himal_trek_data,
            'cover_image_id',
            public_path('photos/trek2.JPG') // Replace with the actual path
        );

        CuratorSeederHelper::seedBelongsTo(
            $mardi_himal_trek_data,
            'feature_image_id',
            public_path('photos/trek2.JPG') // Replace with the actual path
        );

        CuratorSeederHelper::seedBelongsToMany(
            $mardi_himal_trek_data,
            'images',
            public_path('photos/mountain4.jpg')
        );

        //id11


        $annapurna_circuit_trek_data = Trek::create([
            'title' => [
                'en' => 'Annapurna Circuit Trek',
                'fr' => 'Trek du Circuit de l\'Annapurna',
            ],
            'description' => [
                'en' => 'Is trekking in the Himalayan desert of Nepal while you get close to the mountains with views that leave your mouth open in your bucket list? If Yes, Annapurna Circuit Trek 18 Days by Sherpalaya is a perfect choice for you. With a reputation of being one of the most beautiful trekking trails in the world, our Annapurna Circuit Trek 18 days will not disappoint anyone exploring the region. Travelers have been observing the glorious views of Annapurna and Chu lu range since it was opened for trekking in 1977 A.D. The dramatically changing landscapes as we begin our trek from Chyamje (1,430m) is admired by everyone instead of driving up the valley to minimize the trekking days. Annapurna Circuit Trek by Sherpalaya is prepared by expert guides because of whom you will not miss anything that this trail has to offer. The vegetation changes drastically from dense Oak forest to Pine forests and finally onto a Himalayan desert. As we gain altitude the landscape turns drier and the mountains seem huge as we approach them. The mixture of people living throughout the trail also offers a lot of new experience and an opportunity to get in contact with their diversified culture. On the beginning part of the trail (i.e. Bahundanda, Chamje) you will see Bhramins people followed by villages inhabited by Magar community in Chame, Tal, Dharapani. The last settlements of the trail are mostly inhabited by the Sherpa community reflecting preserved Buddhist culture.',
                'fr' => 'Le trekking dans le désert himalayen du Népal tout en vous rapprochant des montagnes avec des vues qui vous laissent la bouche ouverte sur votre liste de choses à faire ? Si oui, le trek du circuit de l\'Annapurna de 18 jours par Sherpalaya est un choix parfait pour vous. Réputé pour être l\'un des plus beaux sentiers de trekking au monde, notre trek du circuit de l\'Annapurna de 18 jours ne décevra personne explorant la région. Les voyageurs observent les vues magnifiques des chaînes de l\'Annapurna et du Chulu depuis son ouverture au trekking en 1977 après J.-C. Les paysages qui changent radicalement alors que nous commençons notre trek depuis Chyamje (1 430 m) sont admirés par tous au lieu de monter la vallée en voiture pour minimiser les jours de trekking. Le trek du circuit de l\'Annapurna par Sherpalaya est préparé par des guides experts grâce à qui vous ne manquerez rien de ce que ce sentier a à offrir. La végétation change radicalement, passant d\'une forêt de chênes dense à des forêts de pins, puis à un désert himalayen. Au fur et à mesure que nous gagnons en altitude, le paysage devient plus sec et les montagnes semblent immenses à mesure que nous nous en approchons. Le mélange de personnes vivant tout au long du sentier offre également beaucoup de nouvelles expériences et une opportunité d\'entrer en contact avec leur culture diversifiée. Au début du sentier (c\'est-à-dire Bahundanda, Chamje), vous verrez des Brahmins suivis de villages habités par la communauté Magar à Chame, Tal, Dharapani. Les derniers villages du sentier sont principalement habités par la communauté Sherpa, reflétant une culture bouddhiste préservée.',
            ],
            'duration' => '18',
            'grade' => '7', // Example: Strenuous - REPLACE THIS
            'starting_point' => 'Kathmandu', // Or Pokhara - REPLACE THIS
            'ending_point' => 'Kathmandu', // Or Pokhara - REPLACE THIS
            'best_time_for_trek' => [
                'en' => 'September to May',
                'fr' => 'Septembre à Mai',
            ],
            'starting_altitude' => 1430, // Chyamje's altitude - REPLACE THIS if starting elsewhere
            'highest_altitude' => 5416,
            'region_id' => Region::find(3)->id, // Replace with the correct Region ID (Annapurna) - VERIFY THIS
            'category_id' => Category::find(8)->id,
            'trek_difficulty' => TrekDifficulty::CHALLENGING, // Or appropriate difficulty - VERIFY THIS
            'costs_include' => [
                [
                    'en' => 'Arrival and Departure Transport',
                    'fr' => 'Transport d\'arrivée et de départ',
                ],
                [
                    'en' => 'Accommodation in Kathmandu and Pokhara with breakfast',
                    'fr' => 'Hébergement à Katmandou et Pokhara avec petit-déjeuner',
                ],
                [
                    'en' => 'Duffle Bag for Trekking',
                    'fr' => 'Sac de voyage pour le trekking',
                ],
                [
                    'en' => 'Breakfast, Lunch & Dinner during the Trekking',
                    'fr' => 'Petit-déjeuner, déjeuner et dîner pendant le trekking',
                ],
                [
                    'en' => 'Accommodation in Tea house (mountain lodge) while trekking',
                    'fr' => 'Hébergement dans une maison de thé (lodge de montagne) pendant le trekking',
                ],
                [
                    'en' => 'Pokhara-Hyangja and Lumre Pokhara drive',
                    'fr' => 'Trajet Pokhara-Hyangja et Lumre Pokhara',
                ],
                [
                    'en' => 'Kathmandu-Pokhara drive (Tourist Bus)',
                    'fr' => 'Trajet Katmandou-Pokhara (bus touristique)',
                ],
                [
                    'en' => 'Pokhara - Kathmandu flights (Buddha Air) with airport tax',
                    'fr' => 'Vols Pokhara - Katmandou (Buddha Air) avec taxes d\'aéroport',
                ],
                [
                    'en' => 'Trekking Porter with Insurance (1 Porter for 2 Pax)',
                    'fr' => 'Porteur de trekking avec assurance (1 porteur pour 2 personnes)',
                ],
                [
                    'en' => 'Trekking Guide with insurance',
                    'fr' => 'Guide de trekking avec assurance',
                ],
                [
                    'en' => 'Trekking guide and porter\'s food and accommodation, wages etc.',
                    'fr' => 'Nourriture et hébergement, salaires, etc. du guide de trekking et des porteurs',
                ],
                [
                    'en' => 'First Aid kit',
                    'fr' => 'Trousse de premiers secours',
                ],
                [
                    'en' => 'Mardi Himal Trekking map',
                    'fr' => 'Carte de trekking du Mardi Himal',
                ],
                [
                    'en' => 'Annapurna Conservation Area Project (ACAP) entry permit fee',
                    'fr' => 'Frais de permis d\'entrée du projet de zone de conservation d\'Annapurna (ACAP)',
                ],
                [
                    'en' => 'Trekker’s Information Management system (TIMS)',
                    'fr' => 'Système de gestion de l\'information des trekkeurs (TIMS)',
                ],
                [
                    'en' => 'Farewell dinner with cultural program',
                    'fr' => 'Dîner d\'adieu avec programme culturel',
                ],
                [
                    'en' => 'Water purification tablets',
                    'fr' => 'Pastilles de purification de l\'eau',
                ],
                [
                    'en' => 'All Government taxes',
                    'fr' => 'Toutes les taxes gouvernementales',
                ],
                [
                    'en' => 'Office service charge',
                    'fr' => 'Frais de service de bureau',
                ],
            ],
            'costs_exclude' => [
                [
                    'en' => 'International Airfare',
                    'fr' => 'Billet d\'avion international',
                ],
                [
                    'en' => 'Your travel insurance',
                    'fr' => 'Votre assurance voyage',
                ],
                [
                    'en' => 'Nepal entry Visa fee (US$ 30 for 15 days and US$ 50 for 30 days)',
                    'fr' => 'Frais de visa d\'entrée au Népal (30 $ US pour 15 jours et 50 $ US pour 30 jours)',
                ],
                [
                    'en' => 'Drinks, Dessert, Juice, Mineral Water, Heater charge, Hot Shower during the Trekking and main meals in cities',
                    'fr' => 'Boissons, dessert, jus, eau minérale, frais de chauffage, douche chaude pendant le trekking et les principaux repas dans les villes',
                ],
                [
                    'en' => 'Tips for Guide, Porter and driver',
                    'fr' => 'Pourboires pour le guide, le porteur et le chauffeur',
                ],
            ],
            'is_featured' => false,
        ]);
        $annapurna_circuit_trek_data->destinations()->sync(
            Destination::where('region_id', 3)
                ->inRandomOrder()
                ->limit(5)
                ->get()
                ->pluck('id')
                ->toArray()
        );
        CuratorSeederHelper::seedBelongsTo(
            $annapurna_circuit_trek_data,
            'cover_image_id',
            public_path('photos/basecamp4.JPG') // Replace with the actual path
        );

        CuratorSeederHelper::seedBelongsTo(
            $annapurna_circuit_trek_data,
            'feature_image_id',
            public_path('photos/basecamp4.JPG') // Replace with the actual path
        );

        CuratorSeederHelper::seedBelongsToMany(
            $annapurna_circuit_trek_data,
            'images',
            public_path('photos/mountain4.jpg')
        );

        //id12

        $langtang_valley_trek_data = Trek::create([
            'title' => [
                'en' => 'Langtang Valley Trek',
                'fr' => 'Trek de la Vallée de Langtang', // French translation
            ],
            'description' => [
                'en' => 'Discover the valley of glaciers and the home of the Tamang community on the Langtang Valley trek. Located close to Kathmandu, the Langtang region offers a quick and short retreat from the city. Trekkers can savor stunning mountain panoramas, the warm hospitality of the locals, tranquility, and adventure. Open to all ages of trekkers, the Langtang Valley trek 11 days is one of the best treks in Nepal. If you are on a short holiday and looking to experience the Himalayas, then this trek is one of the excellent options for you. The trail is not offbeat and has adequate tourist infrastructure for a comfortable journey. Unlike the very popular Everest Base Camp and Annapurna Base Camp treks, the Langtang trek does not require you to take an overwhelming domestic flight or travel to another city to access the trailhead. In just 7 to 8 hours of driving from Kathmandu, you will reach Syabrubesi, from where the Langtang Valley trek begins.',
                'fr' => 'Découvrez la vallée des glaciers et la patrie de la communauté Tamang lors du trek de la vallée de Langtang. Située à proximité de Katmandou, la région de Langtang offre une retraite rapide et courte de la ville. Les trekkeurs peuvent savourer de superbes panoramas de montagnes, l\'hospitalité chaleureuse des habitants, la tranquillité et l\'aventure. Ouvert aux trekkeurs de tous âges, le trek de la vallée de Langtang de 11 jours est l\'un des meilleurs treks au Népal. Si vous êtes en vacances courtes et que vous cherchez à découvrir l\'Himalaya, ce trek est l\'une des excellentes options pour vous. Le sentier n\'est pas hors des sentiers battus et possède une infrastructure touristique adéquate pour un voyage confortable. Contrairement aux treks très populaires du camp de base de l\'Everest et du camp de base de l\'Annapurna, le trek de Langtang ne vous oblige pas à prendre un vol intérieur accablant ou à vous rendre dans une autre ville pour accéder au point de départ du sentier. En seulement 7 à 8 heures de route de Katmandou, vous atteindrez Syabrubesi, d\'où commence le trek de la vallée de Langtang.', // French translation
            ],
            'duration' => '11', // Duration in days
            'grade' => '8', // Trip grade
            'starting_point' => 'Kathmandu', // Starting point
            'ending_point' => 'Kathmandu',   // Ending point
            'best_time_for_trek' => [
                'en' => 'Sep-May',
                'fr' => 'Sep-Mai', // French translation
            ],
            'starting_altitude' => 1400, // Starting altitude (Not provided in the data)
            'highest_altitude' => 4984, // Highest altitude in meters
            'region_id' => Region::find(4)->id, // Replace with the correct Region ID (Langtang) - VERIFY THIS
            'category_id' => Category::find(9)->id,
            'trek_difficulty' => TrekDifficulty::MODERATE, // Or appropriate difficulty - VERIFY THIS
            'costs_include' => [
                [
                    'en' => 'Arrival and Departure Transport',
                    'fr' => 'Transport d\'arrivée et de départ',
                ],
                [
                    'en' => 'Accommodation in Kathmandu with breakfast. (Twin sharing).',
                    'fr' => 'Hébergement à Katmandou avec petit-déjeuner. (Chambre double).',
                ],
                [
                    'en' => 'Trekking Duffle Bag using for Trekking.',
                    'fr' => 'Sac de voyage de trekking pour le trekking.',
                ],
                [
                    'en' => 'Breakfast, Lunch and Dinner during the Trekking.',
                    'fr' => 'Petit-déjeuner, déjeuner et dîner pendant le trekking.',
                ],
                [
                    'en' => 'Accommodation in Tea house (mountain lodge) during trekking.',
                    'fr' => 'Hébergement dans une maison de thé (lodge de montagne) pendant le trekking.',
                ],
                [
                    'en' => 'Kathmandu Syabru bensi and Kathmandu transport.',
                    'fr' => 'Transport Katmandou Syabru Besi et Katmandou.',
                ],
                [
                    'en' => 'Trekking Porter with Insurance. (We Provide 01 Porter for 02 Pax).',
                    'fr' => 'Porteur de trekking avec assurance. (Nous fournissons 01 porteur pour 02 personnes).',
                ],
                [
                    'en' => 'Trekking Guide with insurance.',
                    'fr' => 'Guide de trekking avec assurance.',
                ],
                [
                    'en' => 'Trekking Guide and Porters food and accommodation, wages etc.',
                    'fr' => 'Nourriture et hébergement, salaires, etc. du guide de trekking et des porteurs.',
                ],
                [
                    'en' => 'Langtang Valley Trekking map.',
                    'fr' => 'Carte de trekking de la vallée de Langtang.',
                ],
                [
                    'en' => 'First Aid kit.',
                    'fr' => 'Trousse de premiers secours.',
                ],
                [
                    'en' => 'Trekker’s Information Management system (TIMS).',
                    'fr' => 'Système de gestion de l\'information des trekkeurs (TIMS).',
                ],
                [
                    'en' => 'Langtang National park entry fees.',
                    'fr' => 'Frais d\'entrée du parc national de Langtang.',
                ],
                [
                    'en' => 'Water purification tablets.',
                    'fr' => 'Pastilles de purification de l\'eau.',
                ],
                [
                    'en' => 'Farewell dinner with cultural program.',
                    'fr' => 'Dîner d\'adieu avec programme culturel.',
                ],
                [
                    'en' => 'Government taxes.',
                    'fr' => 'Taxes gouvernementales.',
                ],
                [
                    'en' => 'Office service charge.',
                    'fr' => 'Frais de service de bureau.',
                ],

            ],
            'costs_exclude' => [
                [
                    'en' => 'International Airfare.',
                    'fr' => 'Billet d\'avion international.',
                ],
                [
                    'en' => 'Travel insurance.',
                    'fr' => 'Assurance voyage.',
                ],
                [
                    'en' => 'Nepal entry Visa fee (US$ 50 for 30 days ad US$ 30 for 15 days), you should get visa Upon your arrival)',
                    'fr' => 'Frais de visa d\'entrée au Népal (50 $ US pour 30 jours et 30 $ US pour 15 jours), vous devriez obtenir un visa à votre arrivée).',
                ],
                [
                    'en' => 'Drinks, Dessert, Juice, Mineral Water, Heater charge, Hot Shower during the Trekking and main meals in cities.',
                    'fr' => 'Boissons, dessert, jus, eau minérale, frais de chauffage, douche chaude pendant le trekking et les principaux repas dans les villes.',
                ],
                [
                    'en' => 'Tips for Guide, Porter and driver.',
                    'fr' => 'Pourboires pour le guide, le porteur et le chauffeur.',
                ],
            ],
            'is_featured' => false, // Set as needed
        ]);
        $langtang_valley_trek_data->destinations()->sync(
            Destination::where('region_id', 4)
                ->inRandomOrder()
                ->limit(5)
                ->get()
                ->pluck('id')
                ->toArray()
        );
        CuratorSeederHelper::seedBelongsTo(
            $langtang_valley_trek_data,
            'cover_image_id',
            public_path('photos/basecamp.JPG') // Replace with the actual path
        );

        CuratorSeederHelper::seedBelongsTo(
            $langtang_valley_trek_data,
            'feature_image_id',
            public_path('photos/basecamp.JPG') // Replace with the actual path
        );

        CuratorSeederHelper::seedBelongsToMany(
            $langtang_valley_trek_data,
            'images',
            public_path('photos/mountain4.jpg')
        );

        //id13

        $kanchenjunga_circuit_trek_data = Trek::create([
            'title' => [
                'en' => 'Kanchanjunga Circuit Trek',
                'fr' => 'Trek du Circuit du Kanchenjunga', // French translation
            ],
            'description' => [
                'en' => 'On the Kanchenjunga Circuit trek, you will dive deep into the wilderness of the far eastern Himalayas in Nepal. The journey takes you to the north (5,140 m/16,863 ft) and south (4,050 m/13,287 ft) base camps of Mount Kanchenjunga, the third-highest mountain on Earth. It is an epic trip, ideal for backpackers. Travelers who love exploring untouched, remote locations and dare to go beyond the mainstream trails will love the Kanchenjunga trek. Not many people know about this trek, so the trails remain empty even in the peak seasons. Kanchenjunga Circuit trek is also known as Kanchenjunga Base Camp trek. From Kathmandu, it takes two days to reach the trail\'s starting point. The region\'s inaccessibility is one of the big causes for fewer tourists. Likewise, it is an advanced trek with challenging terrain, high altitude, and bare minimum infrastructures for the trekkers. All these factors have kept Kanchenjunga Circuit pristine.',
                'fr' => 'Lors du trek du circuit du Kanchenjunga, vous plongerez au cœur de la nature sauvage de l\'Extrême-Orient de l\'Himalaya au Népal. Le voyage vous emmène aux camps de base nord (5 140 m/16 863 pi) et sud (4 050 m/13 287 pi) du mont Kanchenjunga, la troisième plus haute montagne de la planète. C\'est un voyage épique, idéal pour les routards. Les voyageurs qui aiment explorer des lieux intacts et isolés et qui osent aller au-delà des sentiers traditionnels adoreront le trek du Kanchenjunga. Peu de gens connaissent ce trek, les sentiers restent donc vides même en haute saison. Le trek du circuit du Kanchenjunga est également connu sous le nom de trek du camp de base du Kanchenjunga. Depuis Katmandou, il faut deux jours pour atteindre le point de départ du sentier. L\'inaccessibilité de la région est l\'une des principales causes du faible nombre de touristes. De même, il s\'agit d\'un trek avancé avec un terrain difficile, une haute altitude et un minimum d\'infrastructures pour les trekkeurs. Tous ces facteurs ont préservé le caractère vierge du circuit du Kanchenjunga.', // French translation
            ],
            'duration' => '21',
            'grade' => 'Strenuous',
            'starting_point' => 'Kathmandu',
            'ending_point' => 'Kathmandu',
            'best_time_for_trek' => [
                'en' => 'September to May', // Add specific best time if known
                'fr' => 'Septembre à Mai', // French translation
            ],
            'starting_altitude' => 1400, // Not provided
            'highest_altitude' => 5140, // North Base Camp altitude
            'region_id' => Region::find(7)->id, // Kanchenjunga Region ID - ALREADY CORRECT
            'category_id' => Category::find(10)->id,
            'trek_difficulty' => TrekDifficulty::CHALLENGING, // Or appropriate difficulty - VERIFY THIS
            'costs_include' => [
                [
                    'en' => 'Arrival and Departure Transport.',
                    'fr' => 'Transport d\'arrivée et de départ.',
                ],
                [
                    'en' => 'Accommodation in Kathmandu with breakfast.',
                    'fr' => 'Hébergement à Katmandou avec petit-déjeuner.',
                ],
                [
                    'en' => 'Sightseeing tour in Kathmandu with an entrance fee.',
                    'fr' => 'Visite touristique à Katmandou avec frais d\'entrée.',
                ],
                [
                    'en' => 'Trekking Duffle Bag using for Trekking.',
                    'fr' => 'Sac de voyage de trekking pour le trekking.',
                ],
                [
                    'en' => 'Breakfast, Lunch and Dinner during the Trekking.',
                    'fr' => 'Petit-déjeuner, déjeuner et dîner pendant le trekking.',
                ],
                [
                    'en' => 'Accommodation in Tea house while trekking.',
                    'fr' => 'Hébergement dans une maison de thé pendant le trekking.',
                ],
                [
                    'en' => 'Kathmandu - Bhadrapur - Kathmandu Flight.',
                    'fr' => 'Vol Katmandou - Bhadrapur - Katmandou.',
                ],
                [
                    'en' => 'Bhadrapur-Suketar-Bhadrapur Drive.',
                    'fr' => 'Trajet Bhadrapur-Suketar-Bhadrapur.',
                ],
                [
                    'en' => 'Trekking porter with insurance. (We Provide 01 Porter for 02 Pax).',
                    'fr' => 'Porteur de trekking avec assurance. (Nous fournissons 01 porteur pour 02 personnes).',
                ],
                [
                    'en' => 'Trekking Guide with insurance.',
                    'fr' => 'Guide de trekking avec assurance.',
                ],
                [
                    'en' => 'Trekking Guide and Porters food and accommodation, wages etc.',
                    'fr' => 'Nourriture et hébergement, salaires, etc. du guide de trekking et des porteurs.',
                ],
                [
                    'en' => 'Water purification tablets.',
                    'fr' => 'Pastilles de purification de l\'eau.',
                ],
                [
                    'en' => 'Kanchanjunga Trekking Region map.',
                    'fr' => 'Carte de la région de trekking du Kanchanjunga.',
                ],
                [
                    'en' => 'Farewell dinner with cultural program.',
                    'fr' => 'Dîner d\'adieu avec programme culturel.',
                ],
                [
                    'en' => 'Trekker’s Information Management system (TIMS).',
                    'fr' => 'Système de gestion de l\'information des trekkeurs (TIMS).',
                ],
                [
                    'en' => 'Special Permit for Kanchanjunga.',
                    'fr' => 'Permis spécial pour le Kanchanjunga.',
                ],
                [
                    'en' => 'Government taxes.',
                    'fr' => 'Taxes gouvernementales.',
                ],
                [
                    'en' => 'Office services charge.',
                    'fr' => 'Frais de service de bureau.',
                ],
            ],
            'costs_exclude' => [
                [
                    'en' => 'International Airfare.',
                    'fr' => 'Billet d\'avion international.',
                ],
                [
                    'en' => 'Your travel insurance of any kind',
                    'fr' => 'Votre assurance voyage de toute nature',
                ],
                [
                    'en' => 'Nepal entry Visa fee (US$ 50 for 30 days) you should get visa Upon your arrival)',
                    'fr' => 'Frais de visa d\'entrée au Népal (50 $ US pour 30 jours), vous devriez obtenir un visa à votre arrivée).',
                ],
                [
                    'en' => 'Drinks, Dessert, Juice, Mineral Water, Wi-Fi, Heater charge, Hot Shower during the Trekking and main meals in cities.',
                    'fr' => 'Boissons, dessert, jus, eau minérale, Wi-Fi, frais de chauffage, douche chaude pendant le trekking et les principaux repas dans les villes.',
                ],
                [
                    'en' => 'Tips for Guide, Porter and driver.',
                    'fr' => 'Pourboires pour le guide, le porteur et le chauffeur.',
                ],
            ],
            'is_featured' => false, // Set as needed
        ]);
        $kanchenjunga_circuit_trek_data->destinations()->sync(
            Destination::where('region_id', 7)
                ->inRandomOrder()
                ->limit(5)
                ->get()
                ->pluck('id')
                ->toArray()
        );
        CuratorSeederHelper::seedBelongsTo(
            $kanchenjunga_circuit_trek_data,
            'cover_image_id',
            public_path('photos/basecamp2.JPG') // Replace with the actual path
        );

        CuratorSeederHelper::seedBelongsTo(
            $kanchenjunga_circuit_trek_data,
            'feature_image_id',
            public_path('photos/basecamp2.JPG') // Replace with the actual path
        );

        CuratorSeederHelper::seedBelongsToMany(
            $kanchenjunga_circuit_trek_data,
            'images',
            public_path('photos/mountain4.jpg')
        );

        //id14

        $upper_mustang_trek_data = Trek::create([
            'title' => [
                'en' => 'Upper Mustang Trek',
                'fr' => 'Trek du Haut Mustang', // French translation
            ],
            'description' => [
                'en' => 'The Upper Mustang trek is a magical journey to the walled city and last forbidden kingdom of Nepal, Lo Manthang. On this trek, you will traverse a trans-Himalayan region, which is unlike any other trekking region in Nepal. The trail is offbeat and crosses many mountain passes under 4,000 meters. The landscape along the Upper Mustang trek route is arid, with towering cliffs, huge rocks, meadows, barren hills, rice and barley fields, and snow-capped mountains. The Upper Mustang trail is dotted with tea houses, so you will get a comfortable and clean space to spend the night. Services are limited but good enough for the trekkers. Likewise, there are many stupas, chortens, mani walls, and prayer flags scattered throughout the trail. Centuries-old monasteries are one of the highlights of Upper Mustang. Even though the Upper Mustang trek is an adventurous trip, the voyage will present you with the rich cultural heritage of the residents that has profoundly influenced Tibetan Buddhism.',
                'fr' => 'Le trek du Haut Mustang est un voyage magique vers la ville fortifiée et le dernier royaume interdit du Népal, Lo Manthang. Lors de ce trek, vous traverserez une région transhimalayenne, qui ne ressemble à aucune autre région de trekking au Népal. Le sentier est hors des sentiers battus et traverse de nombreux cols de montagne à moins de 4 000 mètres. Le paysage le long de la route de trek du Haut Mustang est aride, avec des falaises imposantes, d\'énormes rochers, des prairies, des collines arides, des champs de riz et d\'orge et des montagnes enneigées. Le sentier du Haut Mustang est parsemé de maisons de thé, vous aurez donc un espace confortable et propre pour passer la nuit. Les services sont limités mais suffisants pour les trekkeurs. De même, de nombreux stupas, chortens, murs mani et drapeaux de prière sont dispersés tout au long du sentier. Les monastères centenaires sont l\'un des points forts du Haut Mustang. Même si le trek du Haut Mustang est un voyage aventureux, le voyage vous présentera le riche patrimoine culturel des habitants qui a profondément influencé le bouddhisme tibétain.', // French translation
            ],
            'duration' => '18',
            'grade' => 'Moderate',
            'starting_point' => 'Kathmandu',
            'ending_point' => 'Kathmandu',
            'best_time_for_trek' => [
                'en' => 'September to May', // Add specific best time if known
                'fr' => 'Septembre à Mai', // French translation
            ],
            'starting_altitude' => 1400, // Not provided
            'highest_altitude' => 4780, // Not provided (but under 4000m)
            'region_id' => Region::find(7)->id, // Upper Mustang Region ID - ALREADY CORRECT
            'category_id' => Category::find(10)->id,
            'trek_difficulty' => TrekDifficulty::MODERATE, // Or appropriate difficulty - VERIFY THIS
            'costs_include' => [
                [
                    'en' => 'Arrival and Departure Transport.',
                    'fr' => 'Transport d\'arrivée et de départ.',
                ],
                [
                    'en' => 'Standard Accommodation in Kathmandu and Pokhara as mentioned with breakfast.',
                    'fr' => 'Hébergement standard à Katmandou et Pokhara comme mentionné avec petit-déjeuner.',
                ],
                [
                    'en' => 'Sightseeing tour in Kathmandu with an entrance fee.',
                    'fr' => 'Visite touristique à Katmandou avec frais d\'entrée.',
                ],
                [
                    'en' => 'Duffle Bag using for Trekking.',
                    'fr' => 'Sac de voyage pour le trekking.',
                ],
                [
                    'en' => 'Breakfast, Lunch and Dinner during the Trekking.',
                    'fr' => 'Petit-déjeuner, déjeuner et dîner pendant le trekking.',
                ],
                [
                    'en' => 'Accommodation in Tea house while trekking.',
                    'fr' => 'Hébergement dans une maison de thé pendant le trekking.',
                ],
                [
                    'en' => 'Kathmandu - Pokhara drive.',
                    'fr' => 'Trajet Katmandou - Pokhara.',
                ],
                [
                    'en' => 'Pokhara Jomsom Pokhara Kathmandu flight with airport Tax.',
                    'fr' => 'Vol Pokhara Jomsom Pokhara Katmandou avec taxes d\'aéroport.',
                ],
                [
                    'en' => 'Annapurna Conservation Area Project (ACAP) entry permit fee.',
                    'fr' => 'Frais de permis d\'entrée du projet de zone de conservation d\'Annapurna (ACAP).',
                ],
                [
                    'en' => 'Trekking Porter with Insurance. (We Provide 01 Porter for 02 Pax).',
                    'fr' => 'Porteur de trekking avec assurance. (Nous fournissons 01 porteur pour 02 personnes).',
                ],
                [
                    'en' => 'Trekking Guide with insurance.',
                    'fr' => 'Guide de trekking avec assurance.',
                ],
                [
                    'en' => 'Trekker’s Information Management system (TIMS).',
                    'fr' => 'Système de gestion de l\'information des trekkeurs (TIMS).',
                ],
                [
                    'en' => 'Mustang Trekking Region map.',
                    'fr' => 'Carte de la région de trekking du Mustang.',
                ],
                [
                    'en' => 'Water purification tablets.',
                    'fr' => 'Pastilles de purification de l\'eau.',
                ],
                [
                    'en' => 'Farewell dinner with cultural program.',
                    'fr' => 'Dîner d\'adieu avec programme culturel.',
                ],
                [
                    'en' => 'Special Permit for Mustang.',
                    'fr' => 'Permis spécial pour le Mustang.',
                ],
                [
                    'en' => 'Government taxes.',
                    'fr' => 'Taxes gouvernementales.',
                ],
                [
                    'en' => 'Office services charge.',
                    'fr' => 'Frais de service de bureau.',
                ],
            ],
            'costs_exclude' => [
                [
                    'en' => 'International Airfare.',
                    'fr' => 'Billet d\'avion international.',
                ],
                [
                    'en' => 'Your travel insurance.',
                    'fr' => 'Votre assurance voyage.',
                ],
                [
                    'en' => 'Nepal entry Visa fee (US$ 50 for 30 days) you should get visa Upon your arrival)',
                    'fr' => 'Frais de visa d\'entrée au Népal (50 $ US pour 30 jours), vous devriez obtenir un visa à votre arrivée).',
                ],
                [
                    'en' => 'Drinks, Dessert, Juice, Mineral Water, Heater charge, Hot Shower during the Trekking and main meals in cities.',
                    'fr' => 'Boissons, dessert, jus, eau minérale, frais de chauffage, douche chaude pendant le trekking et les principaux repas dans les villes.',
                ],
                [
                    'en' => 'Tips for Guide, Porter and driver.',
                    'fr' => 'Pourboires pour le guide, le porteur et le chauffeur.',
                ],
            ],
            'is_featured' => false, // Set as needed
        ]);
        $upper_mustang_trek_data->destinations()->sync(
            Destination::inRandomOrder()
                ->limit(5)
                ->get()
                ->pluck('id')
                ->toArray()
        );
        CuratorSeederHelper::seedBelongsTo(
            $upper_mustang_trek_data,
            'cover_image_id',
            public_path('photos/trek1.JPG') // Replace with the actual path
        );

        CuratorSeederHelper::seedBelongsTo(
            $upper_mustang_trek_data,
            'feature_image_id',
            public_path('photos/trek1.JPG') // Replace with the actual path
        );

        CuratorSeederHelper::seedBelongsToMany(
            $upper_mustang_trek_data,
            'images',
            public_path('photos/mountain4.jpg')
        );

        //id 15
        $nar_phu_trek_data = Trek::create([
            'title' => [
                'en' => 'Nar Phu Valley Trek with Annapurna Circuit',
                'fr' => 'Trek Vallée de Nar Phu avec Circuit Annapurna', // French translation
            ],
            'description' => [
                'en' => 'The Nar Phu Valley trek with Annapurna Circuit is an epic adventure in the Annapurna region of Nepal. This trek combines the two greatest Himalayan trails and presents a lifetime experience amidst giant mountains and remote villages. This 21-day voyage is for those who dare to challenge themselves and discover less traveled areas. The Annapurna Circuit is a high pass trek that is famous in Nepal for its adventure, nature\'s diversity, stunning mountain landscapes, and interactions with the Nepalese communities. The Nar Phu Valley, on the other hand, is a restricted area between the Annapurna and Manaslu regions. This trek route is known for its exclusivity, offbeat terrain, empty trails, and heavenly vistas. Trekkers usually do these two treks separately. However, we have curated this particular itinerary that allows you to do both treks in one trip. You will start the journey exploring the isolation of the Nar Phu Valley and ascend to Kang La Pass. Crossing this pass, the trail drops to Ngawal and joins the Annapurna Circuit. You will then climb to Thorong La Pass.',
                'fr' => 'Le trek de la vallée de Nar Phu avec le circuit de l\'Annapurna est une aventure épique dans la région de l\'Annapurna au Népal. Ce trek combine les deux plus grands sentiers himalayens et offre une expérience unique au milieu de montagnes géantes et de villages isolés. Ce voyage de 21 jours est pour ceux qui osent se mettre au défi et découvrir des zones moins fréquentées. Le circuit de l\'Annapurna est un trek de haut col qui est célèbre au Népal pour son aventure, la diversité de la nature, les paysages de montagne époustouflants et les interactions avec les communautés népalaises. La vallée de Nar Phu, quant à elle, est une zone restreinte entre les régions de l\'Annapurna et du Manaslu. Cet itinéraire de trek est connu pour son exclusivité, son terrain hors des sentiers battus, ses sentiers vides et ses vues paradisiaques. Les trekkeurs font généralement ces deux treks séparément. Cependant, nous avons créé cet itinéraire particulier qui vous permet de faire les deux treks en un seul voyage. Vous commencerez le voyage en explorant l\'isolement de la vallée de Nar Phu et monterez jusqu\'au col de Kang La. En traversant ce col, le sentier descend à Ngawal et rejoint le circuit de l\'Annapurna. Vous monterez ensuite jusqu\'au col de Thorong La.', // French translation
            ],
            'duration' => '21',
            'grade' => '7',
            'starting_point' => 'Kathmandu', // Or specify if different
            'ending_point' => 'Kathmandu', // Or specify if different
            'best_time_for_trek' => [
                'en' => 'September to November and March to May', // Add specific best time if known
                'fr' => 'Septembre à Novembre et Mars à Mai', // French translation
            ],
            'starting_altitude' => 1400, // Add if known
            'highest_altitude' => 4000, // Add if known
            'region_id' => Region::find(3)->id, // Annapurna Region ID - ALREADY CORRECT
            'category_id' => Category::find(8)->id,
            'trek_difficulty' => TrekDifficulty::MODERATE, // Or appropriate difficulty - VERIFY THIS
            'costs_include' => [
                [
                    'en' => 'Arrival and Departure Transport.',
                    'fr' => 'Transport d\'arrivée et de départ.',
                ],
                [
                    'en' => 'Accommodation in Kathmandu and Pokhara with breakfast.',
                    'fr' => 'Hébergement à Katmandou et Pokhara avec petit-déjeuner.',
                ],
                [
                    'en' => 'Sightseeing tour in Kathmandu with an entrance fee.',
                    'fr' => 'Visite touristique à Katmandou avec frais d\'entrée.',
                ],
                [
                    'en' => 'Trekking Duffle Bag using for Trekking.',
                    'fr' => 'Sac de voyage pour le trekking.',
                ],
                [
                    'en' => 'Breakfast, Lunch and Dinner during the Trekking.',
                    'fr' => 'Petit-déjeuner, déjeuner et dîner pendant le trekking.',
                ],
                [
                    'en' => 'Accommodation in Tea house (mountain lodge) while trekking.',
                    'fr' => 'Hébergement dans une maison de thé (lodge de montagne) pendant le trekking.',
                ],
                [
                    'en' => 'Kathmandu Besisahar drive.',
                    'fr' => 'Trajet Katmandou Besisahar.',
                ],
                [
                    'en' => 'Besisahar - Chamje drive.',
                    'fr' => 'Trajet Besisahar - Chamje.',
                ],
                [
                    'en' => 'Trekking Porter with Insurance. (We Provide 01 Porter for 02 Pax).',
                    'fr' => 'Porteur de trekking avec assurance. (Nous fournissons 01 porteur pour 02 personnes).',
                ],
                [
                    'en' => 'Trekking Guide with insurance.',
                    'fr' => 'Guide de trekking avec assurance.',
                ],
                [
                    'en' => 'Trekking Guide and Porters food and accommodation, wages etc.',
                    'fr' => 'Nourriture, hébergement, salaires, etc. du guide de trekking et des porteurs.',
                ],
                [
                    'en' => 'Water purification tablets.',
                    'fr' => 'Pastilles de purification de l\'eau.',
                ],
                [
                    'en' => 'Narphu Valley Trekking map.',
                    'fr' => 'Carte de trekking de la vallée de Narphu.',
                ],
                [
                    'en' => 'Trekker’s Information Management system (TIMS).',
                    'fr' => 'Système de gestion de l\'information des trekkeurs (TIMS).',
                ],
                [
                    'en' => 'Annapurna Conservation Area Project (ACAP) entry permit fee.',
                    'fr' => 'Frais de permis d\'entrée du projet de zone de conservation d\'Annapurna (ACAP).',
                ],
                [
                    'en' => 'Special Permit for Narphu Valley.',
                    'fr' => 'Permis spécial pour la vallée de Narphu.',
                ],
                [
                    'en' => 'Jomsom - Pokhara flight or drive.',
                    'fr' => 'Vol ou trajet Jomsom - Pokhara.',
                ],
                [
                    'en' => 'Pokhara - Kathmandu flights or drive.',
                    'fr' => 'Vols ou trajet Pokhara - Katmandou.',
                ],
                [
                    'en' => 'Farewell dinner with cultural program.',
                    'fr' => 'Dîner d\'adieu avec programme culturel.',
                ],
                [
                    'en' => 'Government taxes.',
                    'fr' => 'Taxes gouvernementales.',
                ],
                [
                    'en' => 'Office services charge.',
                    'fr' => 'Frais de service de bureau.',
                ],
            ], // Add costs if known.  Use the same structure as the Upper Mustang example.
            'costs_exclude' => [
                [
                    'en' => 'International Airfare.',
                    'fr' => 'Billet d\'avion international.',
                ],
                [
                    'en' => 'Your travel insurance of any kind',
                    'fr' => 'Votre assurance voyage de toute nature',
                ],
                [
                    'en' => 'Nepal entry Visa fee (US$ 50 for 30 days), you should get visa Upon your arrival)',
                    'fr' => 'Frais de visa d\'entrée au Népal (50 $ US pour 30 jours), vous devriez obtenir un visa à votre arrivée).',
                ],
                [
                    'en' => 'Drinks, Dessert, Juice, Mineral Water, Heater charge, Hot Shower during the Trekking and main meals in cities.',
                    'fr' => 'Boissons, dessert, jus, eau minérale, frais de chauffage, douche chaude pendant le trekking et les principaux repas dans les villes.',
                ],
                [
                    'en' => 'Tips for Guide, Porter and driver.',
                    'fr' => 'Pourboires pour le guide, le porteur et le chauffeur.',
                ],
            ], // Add exclusions if known. Use the same structure as the Upper Mustang example.
            'is_featured' => false, // Set as needed
        ]);
        $nar_phu_trek_data->destinations()->sync(
            Destination::where('region_id', 3)
                ->inRandomOrder()
                ->limit(5)
                ->get()
                ->pluck('id')
                ->toArray()
        );
        CuratorSeederHelper::seedBelongsTo(
            $nar_phu_trek_data,
            'cover_image_id',
            public_path('photos/mountain9.jpg') // Replace with the actual path
        );

        CuratorSeederHelper::seedBelongsTo(
            $nar_phu_trek_data,
            'feature_image_id',
            public_path('photos/mountain9.jpg') // Replace with the actual path
        );

        CuratorSeederHelper::seedBelongsToMany(
            $nar_phu_trek_data,
            'images',
            public_path('photos/mountain4.jpg')
        );


        //id 16

        $tsum_valley_trek_data = Trek::create([
            'title' => [
                'en' => 'Tsum Valley Trek',
                'fr' => 'Trek Vallée de Tsum', // French translation
            ],
            'description' => [
                'en' => 'Tsum Valley is one of the most untouched corners of the Himalayas. The trek route is located east of the famous Manaslu Circuit. Known as the hidden Shangri La, the Tsum Valley trek offers a magical journey in the Manaslu region. Dominated by Ganesh Himal, Shringi Himal, Himlachuli, and Mount Manaslu, the Tsum Valley offers magnificent vistas. Unlike famous treks such as Everest Base Camp, Annapurna Base Camp, and Langtang Valley, the Tsum Valley is much less crowded. Not even 10% of the tourists do the Tsum Valley trek, which makes it unspoiled and pristine. The trail is not commercialized at all. So, if you are searching for a raw adventure in the Himalayas, consider the Tsum Valley trek 15 days. Luckily, camping is not required on this trek. However, only a handful of tea houses are available in the villages along the way. Not many travelers know about the Tsum Valley trail, and its starting point is also not easily accessible. You have to drive 8 to 9 hours from Kathmandu and walk for two days to reach the entrance of Tsum Valley.',
                'fr' => 'La vallée de Tsum est l\'un des coins les plus intacts de l\'Himalaya. L\'itinéraire de trek est situé à l\'est du célèbre circuit du Manaslu. Connue sous le nom de Shangri La cachée, le trek de la vallée de Tsum offre un voyage magique dans la région du Manaslu. Dominée par le Ganesh Himal, le Shringi Himal, l\'Himlachuli et le mont Manaslu, la vallée de Tsum offre de magnifiques panoramas. Contrairement aux treks célèbres tels que le camp de base de l\'Everest, le camp de base de l\'Annapurna et la vallée de Langtang, la vallée de Tsum est beaucoup moins fréquentée. Moins de 10 % des touristes font le trek de la vallée de Tsum, ce qui la rend intacte et immaculée. Le sentier n\'est pas du tout commercialisé. Donc, si vous êtes à la recherche d\'une aventure brute dans l\'Himalaya, envisagez le trek de la vallée de Tsum de 15 jours. Heureusement, le camping n\'est pas nécessaire sur ce trek. Cependant, seules quelques maisons de thé sont disponibles dans les villages le long du chemin. Peu de voyageurs connaissent le sentier de la vallée de Tsum, et son point de départ n\'est pas non plus facilement accessible. Vous devez conduire 8 à 9 heures depuis Katmandou et marcher pendant deux jours pour atteindre l\'entrée de la vallée de Tsum.', // French translation
            ],
            'duration' => '15',
            'grade' => '6',
            'starting_point' => 'Kathmandu', // Verify
            'ending_point' => 'Kathmandu', // Verify
            'best_time_for_trek' => [
                'en' => 'September to November and March to May',
                'fr' => 'Septembre à Novembre et Mars à Mai', // French translation
            ], // Add if known
            'starting_altitude' => 1400, // Add if known
            'highest_altitude' => 4000, // Add if known
            'region_id' => Region::find(7)->id, // Manaslu Region ID - ALREADY CORRECT#
            'category_id' => Category::find(9)->id,
            'trek_difficulty' => TrekDifficulty::MODERATE, // Verify
            'costs_include' => [
                [
                    'en' => 'Arrival and Departure Transport.',
                    'fr' => 'Transport d\'arrivée et de départ.',
                ],
                [
                    'en' => 'Accommodation in Kathmandu with breakfast.',
                    'fr' => 'Hébergement à Katmandou avec petit-déjeuner.',
                ],
                [
                    'en' => 'Trekking Duffle Bag using for Trekking.',
                    'fr' => 'Sac de voyage pour le trekking.',
                ],
                [
                    'en' => 'Sightseeing tour in Kathmandu with an entrance fee.',
                    'fr' => 'Visite touristique à Katmandou avec frais d\'entrée.',
                ],
                [
                    'en' => 'Breakfast, Lunch & Dinner during the Trekking.',
                    'fr' => 'Petit-déjeuner, déjeuner et dîner pendant le trekking.',
                ],
                [
                    'en' => 'Accommodation in Tea house (mountain lodge) while trekking.',
                    'fr' => 'Hébergement dans une maison de thé (lodge de montagne) pendant le trekking.',
                ],
                [
                    'en' => 'Kathmandu Machhakhola and Sotikhola Kathmandu by Jeep.',
                    'fr' => 'Trajet Katmandou Machhakhola et Sotikhola Katmandou en Jeep.',
                ],
                [
                    'en' => 'Trekking Porter with Insurance. (We Provide 01 Porter for 02 Pax).',
                    'fr' => 'Porteur de trekking avec assurance. (Nous fournissons 01 porteur pour 02 personnes).',
                ],
                [
                    'en' => 'Trekking Guide with insurance.',
                    'fr' => 'Guide de trekking avec assurance.',
                ],
                [
                    'en' => 'Trekking Guide and Porters food and accommodation, wages etc.',
                    'fr' => 'Nourriture, hébergement, salaires, etc. du guide de trekking et des porteurs.',
                ],
                [
                    'en' => 'Tsum Valley Trekking map.',
                    'fr' => 'Carte de trekking de la vallée de Tsum.',
                ],
                [
                    'en' => 'Trekker’s Information Management system (TIMS).',
                    'fr' => 'Système de gestion de l\'information des trekkeurs (TIMS).',
                ],
                [
                    'en' => 'Special Permit for Tsum Valley.',
                    'fr' => 'Permis spécial pour la vallée de Tsum.',
                ],
                [
                    'en' => 'Water purification tablets.',
                    'fr' => 'Pastilles de purification de l\'eau.',
                ],
                [
                    'en' => 'Farewell dinner with cultural program.',
                    'fr' => 'Dîner d\'adieu avec programme culturel.',
                ],
                [
                    'en' => 'Government taxes.',
                    'fr' => 'Taxes gouvernementales.',
                ],
                [
                    'en' => 'Office services charge.',
                    'fr' => 'Frais de service de bureau.',
                ],
            ],
            'costs_exclude' => [
                [
                    'en' => 'International Airfare.',
                    'fr' => 'Billet d\'avion international.',
                ],
                [
                    'en' => 'Your travel insurance.',
                    'fr' => 'Votre assurance voyage.',
                ],
                [
                    'en' => 'Nepal entry Visa fee (US$ 30 for 15 days and US$ 50 for 30 days, you should get visa open your arrival)',
                    'fr' => 'Frais de visa d\'entrée au Népal (30 $ US pour 15 jours et 50 $ US pour 30 jours, vous devriez obtenir un visa à votre arrivée).',
                ],
                [
                    'en' => 'Drinks, Dessert, Juice, Mineral Water, Heater charge, Hot Shower during the Trekking and main meals in cities.',
                    'fr' => 'Boissons, dessert, jus, eau minérale, frais de chauffage, douche chaude pendant le trekking et les principaux repas dans les villes.',
                ],
                [
                    'en' => 'Tips for Guide, Porter and driver.',
                    'fr' => 'Pourboires pour le guide, le porteur et le chauffeur.',
                ],
            ],
            'is_featured' => false, // Set as needed
        ]);

        $tsum_valley_trek_data->destinations()->sync(
            Destination::where('region_id', 4)
                ->inRandomOrder()
                ->limit(5)
                ->get()
                ->pluck('id')
                ->toArray()
        );
        CuratorSeederHelper::seedBelongsTo(
            $tsum_valley_trek_data,
            'cover_image_id',
            public_path('photos/mountain1.jpg') // Replace with the actual path
        );

        CuratorSeederHelper::seedBelongsTo(
            $tsum_valley_trek_data,
            'feature_image_id',
            public_path('photos/mountain9.jpg') // Replace with the actual path
        );

        CuratorSeederHelper::seedBelongsToMany(
            $tsum_valley_trek_data,
            'images',
            public_path('photos/mountain4.jpg')
        );


        //id 17
        $tamang_heritage_trek_data = Trek::create([
            'title' => [
                'en' => 'Tamang Heritage Trek',
                'fr' => 'Trek du Patrimoine Tamang', // French translation
            ],
            'description' => [
                'en' => 'With the objective of sustainable tourism in the Langtang region, Tamang Heritage trail is one of the recently opened and less travelled trekking trails in Nepal. The villagers of this region have been operating Home stays throughout the trail with the intention of offering an authentic trekking experience as you move ahead completely blending with locals. Taman Heritage region holds deep rooted belief in Buddhism and reflects ancient Buddhism through their lifestyles and monuments like Chortens. With rich cultural value this region has some of the jaw dropping sceneries of the central Himalayas. Located north of Kathmandu and close to the Tibetan border white pearls line up in front of trekkers marching in the Tamang Heritage route. With very few travelers on the trail, this itinerary is an ideal match for people wanting to connect with unspoiled nature. Moreover, the gradual change in landscape from sub-tropical forest to high altitude grassland with varieties of flora and fauna is a treat to everyone. Majority of the forest is filled with Rhododendron trees (Nepal\'s national flower) with different species of birds, butterflies, monkeys, insects.',
                'fr' => 'Dans le but de promouvoir un tourisme durable dans la région de Langtang, le sentier du patrimoine tamang est l\'un des sentiers de trekking récemment ouverts et les moins fréquentés du Népal. Les villageois de cette région exploitent des séjours chez l\'habitant tout au long du sentier dans le but d\'offrir une expérience de trekking authentique en vous intégrant complètement aux habitants. La région du patrimoine tamang est profondément ancrée dans le bouddhisme et reflète le bouddhisme ancien à travers leurs modes de vie et leurs monuments comme les chortens. Avec une riche valeur culturelle, cette région possède des paysages époustouflants de l\'Himalaya central. Située au nord de Katmandou et proche de la frontière tibétaine, des perles blanches s\'alignent devant les trekkeurs qui empruntent la route du patrimoine tamang. Avec très peu de voyageurs sur le sentier, cet itinéraire est idéal pour les personnes souhaitant se connecter avec une nature intacte. De plus, le changement progressif du paysage, de la forêt subtropicale aux prairies de haute altitude avec une variété de flore et de faune, est un régal pour tous. La majorité de la forêt est remplie de rhododendrons (fleur nationale du Népal) avec différentes espèces d\'oiseaux, de papillons, de singes, d\'insectes.', // French translation
            ],
            'duration' => '11',
            'grade' => '7',
            'starting_point' => 'Kathmandu',
            'ending_point' => 'Kathmandu',
            'category_id' => Category::find(9)->id,
            'best_time_for_trek' => [
                'en' => 'Sep-May',
                'fr' => 'Septembre à Mai'
            ],
            'starting_altitude' => 1400, // Add if known
            'highest_altitude' => 3165,
            'region_id' => Region::find(4)->id, // Langtang Region ID - ALREADY CORRECT.  Region ID 4 is likely incorrect. It should be the Langtang region.
            'trek_difficulty' => TrekDifficulty::MODERATE, // Verify
            'costs_include' => [
                [
                    'en' => 'Arrival and Departure Transport.',
                    'fr' => 'Transport d\'arrivée et de départ.',
                ],
                [
                    'en' => 'Accommodation in Kathmandu with breakfast. (Twin sharing).',
                    'fr' => 'Hébergement à Katmandou avec petit-déjeuner. (Chambre double).',
                ],
                [
                    'en' => 'Sightseeing tour in Kathmandu with an entrance fee.',
                    'fr' => 'Visite touristique à Katmandou avec frais d\'entrée.',
                ],
                [
                    'en' => 'Trekking Duffle Bag using for Trekking.',
                    'fr' => 'Sac de voyage pour le trekking.',
                ],
                [
                    'en' => 'Breakfast, Lunch and Dinner during the Trekking.',
                    'fr' => 'Petit-déjeuner, déjeuner et dîner pendant le trekking.',
                ],
                [
                    'en' => 'Accommodation in Tea house (mountain lodge) during trekking.',
                    'fr' => 'Hébergement dans une maison de thé (lodge de montagne) pendant le trekking.',
                ],
                [
                    'en' => 'Kathmandu Syabru bensi and Kathmandu transport.',
                    'fr' => 'Transport Katmandou Syabru bensi et Katmandou.',
                ],
                [
                    'en' => 'Trekking Porter with Insurance. (We Provide 01 Porter for 02 Pax).',
                    'fr' => 'Porteur de trekking avec assurance. (Nous fournissons 01 porteur pour 02 personnes).',
                ],
                [
                    'en' => 'Trekking Guide with insurance.',
                    'fr' => 'Guide de trekking avec assurance.',
                ],
                [
                    'en' => 'Trekking Guide and Porters food and accommodation, wages etc.',
                    'fr' => 'Nourriture, hébergement, salaires, etc. du guide de trekking et des porteurs.',
                ],
                [
                    'en' => 'Tamang Heritage trail Trekking map.',
                    'fr' => 'Carte de trekking du sentier du patrimoine tamang.',
                ],
                [
                    'en' => 'First Aid kit.',
                    'fr' => 'Trousse de premiers secours.',
                ],
                [
                    'en' => 'Trekker’s Information Management system (TIMS).',
                    'fr' => 'Système de gestion de l\'information des trekkeurs (TIMS).',
                ],
                [
                    'en' => 'Langtang National park entry fees.',
                    'fr' => 'Frais d\'entrée du parc national de Langtang.',
                ],
                [
                    'en' => 'Water purification tablets.',
                    'fr' => 'Pastilles de purification de l\'eau.',
                ],
                [
                    'en' => 'Farewell dinner with cultural program.',
                    'fr' => 'Dîner d\'adieu avec programme culturel.',
                ],
                [
                    'en' => 'Government taxes.',
                    'fr' => 'Taxes gouvernementales.',
                ],
                [
                    'en' => 'Office service charge.',
                    'fr' => 'Frais de service de bureau.',
                ],
            ],
            'costs_exclude' => [
                [
                    'en' => 'International Airfare.',
                    'fr' => 'Billet d\'avion international.',
                ],
                [
                    'en' => 'Travel insurance.',
                    'fr' => 'Assurance voyage.',
                ],
                [
                    'en' => 'Nepal entry Visa fee (US$ 50 for 30 days), you should get visa Upon your arrival)',
                    'fr' => 'Frais de visa d\'entrée au Népal (50 $ US pour 30 jours), vous devriez obtenir un visa à votre arrivée).',
                ],
                [
                    'en' => 'Drinks, Dessert, Juice, Mineral Water, Heater charge, Hot Shower during the Trekking and main meals in cities.',
                    'fr' => 'Boissons, dessert, jus, eau minérale, frais de chauffage, douche chaude pendant le trekking et les principaux repas dans les villes.',
                ],
                [
                    'en' => 'Tips for Guide, Porter and driver.',
                    'fr' => 'Pourboires pour le guide, le porteur et le chauffeur.',
                ],
            ],
            'is_featured' => false, // Set as needed
        ]);
        $tamang_heritage_trek_data->destinations()->sync(
            Destination::where('region_id', 4)
                ->inRandomOrder()
                ->limit(5)
                ->get()
                ->pluck('id')
                ->toArray()
        );
        CuratorSeederHelper::seedBelongsTo(
            $tamang_heritage_trek_data,
            'cover_image_id',
            public_path('photos/mountain2.jpg') // Replace with the actual path
        );

        CuratorSeederHelper::seedBelongsTo(
            $tamang_heritage_trek_data,
            'feature_image_id',
            public_path('photos/mountain9.jpg') // Replace with the actual path
        );

        CuratorSeederHelper::seedBelongsToMany(
            $tamang_heritage_trek_data,
            'images',
            public_path('photos/mountain4.jpg')
        );


        //id 18

        $everest_base_camp_cho_la_pass_trek_data = Trek::create([
            'title' => [
                'en' => 'Everest Base Camp via Cho La Pass and Gokyo Lakes',
                'fr' => 'Trek au Camp de Base de l\'Everest via le Col de Cho La et les Lacs de Gokyo', // French translation
            ],
            'description' => [
                'en' => 'The Everest Base Camp trek via Cho La Pass and Gokyo Lakes is an adventurous trekking program in the Khumbu region. On this trek, you will travel to the base of the tallest mountain on Earth and explore the stunning turquoise alpine lakes. Likewise, you will cross a challenging high pass. The journey is exhilarating and life-changing. You will trek through diverse climatic zones, enjoying varying scenery. The highest point touched during the Everest Cho La Pass trek is the Kala Patthar. It is situated at 5,545 meters. However, you will go multiple times above 5,000 meters. If you want to do something new in the Khumbu region or trek beyond the classic EBC trail, we highly recommend the Everest Base Camp Chola Pass Gokyo trek.',
                'fr' => 'Le trek du camp de base de l\'Everest via le col de Cho La et les lacs de Gokyo est un programme de trekking aventureux dans la région du Khumbu. Lors de ce trek, vous vous rendrez au pied de la plus haute montagne du monde et explorerez les superbes lacs alpins turquoise. De même, vous traverserez un haut col difficile. Le voyage est exaltant et change la vie. Vous traverserez diverses zones climatiques, en profitant de paysages variés. Le point culminant atteint lors du trek du col de Cho La de l\'Everest est le Kala Patthar. Il est situé à 5 545 mètres. Cependant, vous passerez plusieurs fois au-dessus de 5 000 mètres. Si vous voulez faire quelque chose de nouveau dans la région du Khumbu ou faire un trek au-delà du sentier classique du CBE, nous vous recommandons vivement le trek du camp de base de l\'Everest, du col de Chola et de Gokyo.', // French translation
            ],
            'duration' => '21',
            'grade' => '6',
            'starting_point' => 'Kathmandu',
            'ending_point' => 'Kathmandu',
            'best_time_for_trek' => [
                'en' => 'Sep-May',
                'fr' => 'Septembre à Mai'
            ], // Or be more specific if possible
            'starting_altitude' => 1400, // Add if known
            'highest_altitude' => 5545,
            'region_id' => Region::find(1)->id, // Khumbu Region ID - ALREADY CORRECT
            'category_id' => Category::find(7)->id,
            'trek_difficulty' => TrekDifficulty::CHALLENGING, // Verify
            'costs_include' => [
                [
                    'en' => 'All Transport (Private).',
                    'fr' => 'Tous les transports (privés).',
                ],
                [
                    'en' => 'Standard Accommodation (Twin share) in Kathmandu with Breakfast.',
                    'fr' => 'Hébergement standard (chambre double) à Katmandou avec petit-déjeuner.',
                ],
                [
                    'en' => 'Sightseeing tour with entrance fees.',
                    'fr' => 'Visite touristique avec frais d\'entrée.',
                ],
                [
                    'en' => 'Duffle Bag using for Trekking.',
                    'fr' => 'Sac de voyage pour le trekking.',
                ],
                [
                    'en' => 'Breakfast, Lunch and Dinner during the Trekking.',
                    'fr' => 'Petit-déjeuner, déjeuner et dîner pendant le trekking.',
                ],
                [
                    'en' => 'Standard Accommodation (Twin share) in Tea house (mountain lodge) while trekking.',
                    'fr' => 'Hébergement standard (chambre double) dans une maison de thé (lodge de montagne) pendant le trekking.',
                ],
                [
                    'en' => 'Domestic Flight with Airport Tax.',
                    'fr' => 'Vol intérieur avec taxes d\'aéroport.',
                ],
                [
                    'en' => 'Trekking Porter with Insurance. (We Provide 01 Porter for two trekkers)',
                    'fr' => 'Porteur de trekking avec assurance. (Nous fournissons 01 porteur pour deux trekkeurs)',
                ],
                [
                    'en' => 'Trekking Guide with insurance.',
                    'fr' => 'Guide de trekking avec assurance.',
                ],
                [
                    'en' => 'Trekking Guide and Porters food and accommodation, wages etc.',
                    'fr' => 'Nourriture, hébergement, salaires, etc. du guide de trekking et des porteurs.',
                ],
                [
                    'en' => 'Everest Base Camp Trekking Region map.',
                    'fr' => 'Carte de la région de trekking du camp de base de l\'Everest.',
                ],
                [
                    'en' => 'Sagarmatha (Everest) National park permits fee.',
                    'fr' => 'Frais de permis du parc national de Sagarmatha (Everest).',
                ],
                [
                    'en' => 'Khumbu pasang lhamu rural municipality entry permit fee.',
                    'fr' => 'Frais de permis d\'entrée de la municipalité rurale de Khumbu pasang lhamu.',
                ],
                [
                    'en' => 'Trekker’s Information Management system (TIMS).',
                    'fr' => 'Système de gestion de l\'information des trekkeurs (TIMS).',
                ],
                [
                    'en' => 'All Government taxes Income tax plus VAT.',
                    'fr' => 'Toutes les taxes gouvernementales, impôt sur le revenu plus TVA.',
                ],
                [
                    'en' => 'Farewell dinner with cultural program.',
                    'fr' => 'Dîner d\'adieu avec programme culturel.',
                ],
                [
                    'en' => 'Office services charge.',
                    'fr' => 'Frais de service de bureau.',
                ],
                [
                    'en' => 'Water purification tablets.',
                    'fr' => 'Pastilles de purification de l\'eau.',
                ],
            ],
            'costs_exclude' => [
                [
                    'en' => 'International Airfare.',
                    'fr' => 'Billet d\'avion international.',
                ],
                [
                    'en' => 'Your travel insurance of any kind',
                    'fr' => 'Votre assurance voyage de toute nature',
                ],
                [
                    'en' => 'Nepal entry Visa fee (US$ 50 for 30 days) (US$ 30 for 15 days) you should get visa open your arrival)',
                    'fr' => 'Frais de visa d\'entrée au Népal (50 $ US pour 30 jours) (30 $ US pour 15 jours), vous devriez obtenir un visa à votre arrivée).',
                ],
                [
                    'en' => 'Drinks, Dessert, Juice, Mineral Water, Heater charge, Hot Shower, Wi-Fi etc during the Trekking and main meals in cities.',
                    'fr' => 'Boissons, dessert, jus, eau minérale, frais de chauffage, douche chaude, Wi-Fi, etc. pendant le trekking et les principaux repas dans les villes.',
                ],
                [
                    'en' => 'Tips for Guide, Porter and driver.',
                    'fr' => 'Pourboires pour le guide, le porteur et le chauffeur.',
                ],
            ],
            'is_featured' => false, // Set as needed
        ]);
        $everest_base_camp_cho_la_pass_trek_data->destinations()->sync(
            Destination::where('region_id', 1)
                ->inRandomOrder()
                ->limit(5)
                ->get()
                ->pluck('id')
                ->toArray()
        );
        CuratorSeederHelper::seedBelongsTo(
            $everest_base_camp_cho_la_pass_trek_data,
            'cover_image_id',
            public_path('photos/mountain1.jpg') // Replace with the actual path
        );

        CuratorSeederHelper::seedBelongsTo(
            $everest_base_camp_cho_la_pass_trek_data,
            'feature_image_id',
            public_path('photos/mountain9.jpg') // Replace with the actual path
        );

        CuratorSeederHelper::seedBelongsToMany(
            $everest_base_camp_cho_la_pass_trek_data,
            'images',
            public_path('photos/mountain4.jpg')
        );


        // id 19
        $luxury_everest_base_camp_trek_data = Trek::create([
            'title' => [
                'en' => 'Luxury Everest Base Camp Trek',
                'fr' => 'Trek de Luxe au Camp de Base de l\'Everest', // French translation
            ],
            'description' => [
                'en' => 'Did you know you can trek to Everest Base Camp very comfortably, at least in terms of services? Because of the massive increase in budget-friendly travelers in the last few years, the luxury side of the Khumbu region has been shadowed. However, the services along the Everest Base Camp trail are only improving, even though they are not discussed much. If you\'re an adventure enthusiast who values comfort, our exclusive luxury Everest Base Camp trek package is designed just for you. We\'ve meticulously crafted this EBC trek package to ensure our guests experience the highest level of comfort, without compromising on the thrill and adventure of hiking to the base of the world\'s tallest mountain. Imagine starting your trip in the finest five-star hotel in Kathmandu and flying to Lukla in a helicopter. Indulge in superior lodging and food services throughout the trail. You will not have to adjust to basic service or share the room/washroom with fellow trekkers.',
                'fr' => 'Saviez-vous que vous pouvez faire un trek jusqu\'au camp de base de l\'Everest très confortablement, du moins en termes de services ? En raison de l\'augmentation massive du nombre de voyageurs soucieux de leur budget au cours des dernières années, le côté luxe de la région du Khumbu a été éclipsé. Cependant, les services le long du sentier du camp de base de l\'Everest ne font que s\'améliorer, même s\'ils ne sont pas beaucoup discutés. Si vous êtes un passionné d\'aventure qui apprécie le confort, notre forfait exclusif de trek de luxe au camp de base de l\'Everest est conçu spécialement pour vous. Nous avons méticuleusement conçu ce forfait de trek du CBE pour garantir à nos clients le plus haut niveau de confort, sans compromettre le frisson et l\'aventure de la randonnée jusqu\'à la base de la plus haute montagne du monde. Imaginez commencer votre voyage dans le plus bel hôtel cinq étoiles de Katmandou et vous envoler pour Lukla en hélicoptère. Laissez-vous tenter par des services d\'hébergement et de restauration supérieurs tout au long du sentier. Vous n\'aurez pas à vous adapter à un service de base ou à partager la chambre/les toilettes avec d\'autres trekkeurs.', // French translation
            ],
            'duration' => '14',
            'grade' => 'Strenuous', // You mentioned it's a digit between 1 and 10, but "Strenuous" is a word, not a number.  Clarify if you need to map this to a numerical grade.
            'starting_point' => 'Kathmandu',
            'ending_point' => 'Kathmandu',
            'best_time_for_trek' => [
                'en' => 'Sep-May',
                'fr' => 'Septembre à Mai'
            ], // Correct spelling to "September"
            'starting_altitude' => 1400, // Kathmandu's altitude
            'highest_altitude' => 5364,
            'region_id' => Region::find(1)->id, // Khumbu Region ID - ALREADY CORRECT
            'category_id' => Category::find(7)->id,
            'trek_difficulty' => TrekDifficulty::HARD, // Verify if "Strenuous" is the correct enum value. If you want to use a numerical grade, you need to define how that maps to the existing difficulty levels.
            'costs_include' => [
                [
                    'en' => 'All Transport (Private).',
                    'fr' => 'Tous les transports (privés).',
                ],
                [
                    'en' => 'Standard Accommodation (Twin share) in Kathmandu with Breakfast.',
                    'fr' => 'Hébergement standard (chambre double) à Katmandou avec petit-déjeuner.',
                ],
                [
                    'en' => 'Sightseeing tour with entrance fees.',
                    'fr' => 'Visite touristique avec frais d\'entrée.',
                ],
                [
                    'en' => 'Duffle Bag using for Trekking.',
                    'fr' => 'Sac de voyage pour le trekking.',
                ],
                [
                    'en' => 'Breakfast, Lunch and Dinner during the Trekking.',
                    'fr' => 'Petit-déjeuner, déjeuner et dîner pendant le trekking.',
                ],
                [
                    'en' => 'Standard Accommodation (Twin share) in Tea house (mountain lodge) while trekking.',
                    'fr' => 'Hébergement standard (chambre double) dans une maison de thé (lodge de montagne) pendant le trekking.',
                ],
                [
                    'en' => 'Domestic Flight with Airport Tax.',
                    'fr' => 'Vol intérieur avec taxes d\'aéroport.',
                ],
                [
                    'en' => 'Trekking Porter with Insurance. (We Provide 01 Porter for two trekkers)',
                    'fr' => 'Porteur de trekking avec assurance. (Nous fournissons 01 porteur pour deux trekkeurs)',
                ],
                [
                    'en' => 'Trekking Guide with insurance.',
                    'fr' => 'Guide de trekking avec assurance.',
                ],
                [
                    'en' => 'Trekking Guide and Porters food and accommodation, wages etc.',
                    'fr' => 'Nourriture, hébergement, salaires, etc. du guide de trekking et des porteurs.',
                ],
                [
                    'en' => 'Everest Base Camp Trekking Region map.',
                    'fr' => 'Carte de la région de trekking du camp de base de l\'Everest.',
                ],
                [
                    'en' => 'Sagarmatha (Everest) National park permits fee.',
                    'fr' => 'Frais de permis du parc national de Sagarmatha (Everest).',
                ],
                [
                    'en' => 'Khumbu pasang lhamu rural municipality entry permit fee.',
                    'fr' => 'Frais de permis d\'entrée de la municipalité rurale de Khumbu pasang lhamu.',
                ],
                [
                    'en' => 'Trekker’s Information Management system (TIMS).',
                    'fr' => 'Système de gestion de l\'information des trekkeurs (TIMS).',
                ],
                [
                    'en' => 'All Government taxes Income tax plus VAT.',
                    'fr' => 'Toutes les taxes gouvernementales, impôt sur le revenu plus TVA.',
                ],
                [
                    'en' => 'Farewell dinner with cultural program.',
                    'fr' => 'Dîner d\'adieu avec programme culturel.',
                ],
                [
                    'en' => 'Office services charge.',
                    'fr' => 'Frais de service de bureau.',
                ],
                [
                    'en' => 'Water purification tablets.',
                    'fr' => 'Pastilles de purification de l\'eau.',
                ],
            ],
            'costs_exclude' => [
                [
                    'en' => 'International Airfare.',
                    'fr' => 'Billet d\'avion international.',
                ],
                [
                    'en' => 'Your travel insurance of any kind',
                    'fr' => 'Votre assurance voyage de toute nature',
                ],
                [
                    'en' => 'Nepal entry Visa fee (US$ 50 for 30 days) (US$ 30 for 15 days) you should get visa open your arrival)',
                    'fr' => 'Frais de visa d\'entrée au Népal (50 $ US pour 30 jours) (30 $ US pour 15 jours), vous devriez obtenir un visa à votre arrivée).',
                ],
                [
                    'en' => 'Drinks, Dessert, Juice, Mineral Water, Heater charge, Hot Shower, Wi-Fi etc during the Trekking and main meals in cities.',
                    'fr' => 'Boissons, dessert, jus, eau minérale, frais de chauffage, douche chaude, Wi-Fi, etc. pendant le trekking et les principaux repas dans les villes.',
                ],
                [
                    'en' => 'Tips for Guide, Porter and driver.',
                    'fr' => 'Pourboires pour le guide, le porteur et le chauffeur.',
                ],
            ],
            'is_featured' => false, // Set as needed
        ]);
        $luxury_everest_base_camp_trek_data->destinations()->sync(
            Destination::where('region_id', 1)
                ->inRandomOrder()
                ->limit(5)
                ->get()
                ->pluck('id')
                ->toArray()
        );
        CuratorSeederHelper::seedBelongsTo(
            $luxury_everest_base_camp_trek_data,
            'cover_image_id',
            public_path('photos/mountain2.jpg') // Replace with the actual path
        );

        CuratorSeederHelper::seedBelongsTo(
            $luxury_everest_base_camp_trek_data,
            'feature_image_id',
            public_path('photos/mountain9.jpg') // Replace with the actual path
        );

        CuratorSeederHelper::seedBelongsToMany(
            $luxury_everest_base_camp_trek_data,
            'images',
            public_path('photos/mountain4.jpg')
        );

        //id 20
        $annapurna_excursion_trek_data = Trek::create([
            'title' => [
                'en' => 'Annapurna Excursion',
                'fr' => 'Excursion à l\'Annapurna', // French translation
            ],
            'description' => [
                'en' => 'Annapurna Excursion 12 Days is a customized trip by Sherpalaya that allows our valuable customers to see a glimpse of all geographical features of Nepal. The trip is mixed with multiple activities allowing you to have most of Nepal. With diversified landscapes and easy days, this can be a good choice for Family Trekking in Nepal. Our Annapurna Excursion is filled with thrilling activities as on 2nd day you will get into a raft and paddle your way through various levels of rapids in Trishuli River. Along with our professional river guides you will spend 2 - 3 hrs navigating your way. The next section of the trip is Ghorepani Poonhill Trek, one of the most popular treks in Nepal. During the hike you will be exposed to 7th and 10th highest mountains of the world. Once you step inside the Annapurna Conservation Area, many awesome views will appear in front of you. The Dhaulagiri and Annapurna Range providing 180 degree views of the Himalayan Giants is a major attraction of the trip.',
                'fr' => 'L\'excursion à l\'Annapurna de 12 jours est un voyage personnalisé par Sherpalaya qui permet à nos précieux clients d\'avoir un aperçu de toutes les caractéristiques géographiques du Népal. Le voyage est composé de plusieurs activités vous permettant de profiter au maximum du Népal. Avec des paysages diversifiés et des journées faciles, cela peut être un bon choix pour le trekking en famille au Népal. Notre excursion à l\'Annapurna est remplie d\'activités passionnantes. Le deuxième jour, vous monterez sur un radeau et pagayerez à travers différents niveaux de rapides dans la rivière Trishuli. Avec nos guides de rivière professionnels, vous passerez 2 à 3 heures à naviguer. La section suivante du voyage est le trek de Ghorepani Poonhill, l\'un des treks les plus populaires du Népal. Pendant la randonnée, vous serez exposé aux 7e et 10e plus hautes montagnes du monde. Une fois que vous aurez pénétré dans la zone de conservation de l\'Annapurna, de nombreuses vues impressionnantes apparaîtront devant vous. La chaîne du Dhaulagiri et de l\'Annapurna offrant une vue à 180 degrés sur les géants de l\'Himalaya est une attraction majeure du voyage.', // French translation
            ],
            'duration' => '12',
            'grade' => '7',
            'starting_point' => 'Kathmandu',
            'ending_point' => 'Kathmandu',
            'best_time_for_trek' => [
                'en' => 'Sep-May',
                'fr' => 'Septembre à Mai', // French translation
            ],
            'starting_altitude' => 1400, // Assuming Kathmandu's altitude - verify if needed
            'highest_altitude' => 3210,
            'region_id' => Region::find(3)->id, // Annapurna Region ID - ALREADY CORRECT
            'category_id' => Category::find(8)->id,
            'trek_difficulty' => TrekDifficulty::MODERATE, // Verify
            'costs_include' => [
                [
                    'en' => 'Arrival and Departure Transport',
                    'fr' => 'Transport d\'arrivée et de départ',
                ],
                [
                    'en' => 'Accommodation in Kathmandu and Pokhara with breakfast',
                    'fr' => 'Hébergement à Katmandou et Pokhara avec petit-déjeuner',
                ],
                [
                    'en' => 'Duffle Bag for Trekking',
                    'fr' => 'Sac de voyage pour le trekking',
                ],
                [
                    'en' => 'Breakfast, Lunch & Dinner during the Trekking',
                    'fr' => 'Petit-déjeuner, déjeuner et dîner pendant le trekking',
                ],
                [
                    'en' => 'Accommodation in Tea house (mountain lodge) while trekking',
                    'fr' => 'Hébergement dans une maison de thé (lodge de montagne) pendant le trekking',
                ],
                [
                    'en' => 'Pokhara-Hyangja and Lumre Pokhara drive',
                    'fr' => 'Trajet Pokhara-Hyangja et Lumre Pokhara',
                ],
                [
                    'en' => 'Kathmandu-Pokhara drive (Tourist Bus)',
                    'fr' => 'Trajet Katmandou-Pokhara (bus touristique)',
                ],
                [
                    'en' => 'Pokhara - Kathmandu flights (Buddha Air) with airport tax',
                    'fr' => 'Vols Pokhara - Katmandou (Buddha Air) avec taxes d\'aéroport',
                ],
                [
                    'en' => 'Trekking Porter with Insurance (1 Porter for 2 Pax)',
                    'fr' => 'Porteur de trekking avec assurance (1 porteur pour 2 personnes)',
                ],
                [
                    'en' => 'Trekking Guide with insurance',
                    'fr' => 'Guide de trekking avec assurance',
                ],
                [
                    'en' => 'Trekking guide and porter\'s food and accommodation, wages etc.',
                    'fr' => 'Nourriture et hébergement, salaires, etc. du guide de trekking et des porteurs',
                ],
                [
                    'en' => 'First Aid kit',
                    'fr' => 'Trousse de premiers secours',
                ],
                [
                    'en' => 'Mardi Himal Trekking map',
                    'fr' => 'Carte de trekking du Mardi Himal',
                ],
                [
                    'en' => 'Annapurna Conservation Area Project (ACAP) entry permit fee',
                    'fr' => 'Frais de permis d\'entrée du projet de zone de conservation d\'Annapurna (ACAP)',
                ],
                [
                    'en' => 'Trekker’s Information Management system (TIMS)',
                    'fr' => 'Système de gestion de l\'information des trekkeurs (TIMS)',
                ],
                [
                    'en' => 'Farewell dinner with cultural program',
                    'fr' => 'Dîner d\'adieu avec programme culturel',
                ],
                [
                    'en' => 'Water purification tablets',
                    'fr' => 'Pastilles de purification de l\'eau',
                ],
                [
                    'en' => 'All Government taxes',
                    'fr' => 'Toutes les taxes gouvernementales',
                ],
                [
                    'en' => 'Office service charge',
                    'fr' => 'Frais de service de bureau',
                ],
            ],
            'costs_exclude' => [
                [
                    'en' => 'International Airfare',
                    'fr' => 'Billet d\'avion international',
                ],
                [
                    'en' => 'Your travel insurance',
                    'fr' => 'Votre assurance voyage',
                ],
                [
                    'en' => 'Nepal entry Visa fee (US$ 30 for 15 days and US$ 50 for 30 days)',
                    'fr' => 'Frais de visa d\'entrée au Népal (30 $ US pour 15 jours et 50 $ US pour 30 jours)',
                ],
                [
                    'en' => 'Drinks, Dessert, Juice, Mineral Water, Heater charge, Hot Shower during the Trekking and main meals in cities',
                    'fr' => 'Boissons, dessert, jus, eau minérale, frais de chauffage, douche chaude pendant le trekking et les principaux repas dans les villes',
                ],
                [
                    'en' => 'Tips for Guide, Porter and driver',
                    'fr' => 'Pourboires pour le guide, le porteur et le chauffeur',
                ],
            ],
            'is_featured' => false, // Set as needed
        ]);

        $annapurna_excursion_trek_data->destinations()->sync(
            Destination::where('region_id', 3)
                ->inRandomOrder()
                ->limit(5)
                ->get()
                ->pluck('id')
                ->toArray()
        );
        CuratorSeederHelper::seedBelongsTo(
            $annapurna_excursion_trek_data,
            'cover_image_id',
            public_path('photos/mountain3.jpg') // Replace with the actual path
        );

        CuratorSeederHelper::seedBelongsTo(
            $annapurna_excursion_trek_data,
            'feature_image_id',
            public_path('photos/mountain9.jpg') // Replace with the actual path
        );

        CuratorSeederHelper::seedBelongsToMany(
            $annapurna_excursion_trek_data,
            'images',
            public_path('photos/mountain4.jpg')
        );

        //id 21
        $annapurna_sanctuary_trek_data = Trek::create([
            'title' => [
                'en' => 'Annapurna Sanctuary Trek',
                'fr' => 'Trek au Sanctuaire de l\'Annapurna', // French translation
            ],
            'description' => [
                'en' => 'Annapurna Sanctuary trek is an adventurous 10 days trip to the base of the tenth-highest mountain in the world, Mount Annapurna. This trek is famously known as the Annapurna Base Camp trek. It is one of the most loved trekking programs in Nepal and done by hundreds of trekkers every year. Unlike the Everest Base Camp trek, you will travel west of Kathmandu to the beautiful city of Pokhara and take a short drive from here to the lovely Ghandruk village to start the journey in the mountains. The trail goes through picturesque Nepali villages and terraced fields, followed by rhododendron forests and lush cliffsides. The trail gradually ascends along the Modi Khola. It takes you into the heart of the Annapurna Himalayas, where giant mountains like the Annapurna range, Dhaulagiri, Nilgiri, Fishtail, Hiunchuli, Gangapurna, Tukuche Peak, and many others reside.',
                'fr' => 'Le trek du Sanctuaire de l\'Annapurna est un voyage aventureux de 10 jours à la base de la dixième plus haute montagne du monde, le mont Annapurna. Ce trek est populairement connu sous le nom de trek du camp de base de l\'Annapurna. C\'est l\'un des programmes de trekking les plus appréciés au Népal et effectué par des centaines de trekkeurs chaque année. Contrairement au trek du camp de base de l\'Everest, vous voyagerez à l\'ouest de Katmandou jusqu\'à la belle ville de Pokhara et prendrez un court trajet en voiture d\'ici jusqu\'au charmant village de Ghandruk pour commencer le voyage dans les montagnes. Le sentier traverse des villages népalais pittoresques et des champs en terrasses, suivis de forêts de rhododendrons et de falaises luxuriantes. Le sentier monte progressivement le long de la Modi Khola. Il vous emmène au cœur de l\'Himalaya de l\'Annapurna, où résident des montagnes géantes comme la chaîne de l\'Annapurna, le Dhaulagiri, le Nilgiri, le Fishtail, l\'Hiunchuli, le Gangapurna, le Tukuche Peak et bien d\'autres.', // French translation
            ],
            'duration' => '10',
            'grade' => '6', // You provided a grade of 6, but "Moderate" is the word equivalent.  If you want to use a numerical grade (1-10), you *must* define the mapping.
            'starting_point' => 'Kathmandu',
            'ending_point' => 'Kathmandu',
            'best_time_for_trek' => [
                'en' => 'Sep-May',
                'fr' => 'Septembre à Mai', // French translation
            ],
            'starting_altitude' => 1400, // Kathmandu altitude - verify
            'highest_altitude' => 3500,  // You *must* add the highest altitude for this trek.
            'region_id' => Region::find(3)->id, // Annapurna Region ID - ALREADY CORRECT
            'category_id' => Category::find(8)->id,
            'trek_difficulty' => TrekDifficulty::MODERATE, // Verify. If using a numerical grade, define the mapping.
            'costs_include' => [
                [
                    'en' => 'Arrival and Departure Transport (Airport transfers).',
                    'fr' => 'Transport d\'arrivée et de départ (Transferts aéroport).',
                ],
                [
                    'en' => 'Accommodation in Kathmandu (Specify hotel level/stars) with breakfast.',
                    'fr' => 'Hébergement à Katmandou (Spécifiez le niveau/étoiles de l\'hôtel) avec petit-déjeuner.',
                ],
                [
                    'en' => 'Accommodation in Pokhara (Specify hotel level/stars) with breakfast (if applicable).',
                    'fr' => 'Hébergement à Pokhara (Spécifiez le niveau/étoiles de l\'hôtel) avec petit-déjeuner (si applicable).',
                ],
                [
                    'en' => 'Trekking permits (TIMS, ACAP, National Park fees, Special Permits if required).',
                    'fr' => 'Permis de trekking (TIMS, ACAP, frais de parc national, permis spéciaux si requis).',
                ],
                [
                    'en' => 'Trekking Guide (English-speaking, licensed).',
                    'fr' => 'Guide de trekking (Anglophone, licencié).',
                ],
                [
                    'en' => 'Porters to carry luggage (Specify porter/trekker ratio).',
                    'fr' => 'Porteurs pour transporter les bagages (Spécifiez le ratio porteur/trekker).',
                ],
                [
                    'en' => 'All meals during the trek (Breakfast, Lunch, Dinner).',
                    'fr' => 'Tous les repas pendant le trek (Petit-déjeuner, Déjeuner, Dîner).',
                ],
                [
                    'en' => 'Accommodation in teahouses/lodges during the trek.',
                    'fr' => 'Hébergement dans des maisons de thé/lodges pendant le trek.',
                ],
                [
                    'en' => 'Transportation to/from the trek starting/ending point (Specify mode of transport).',
                    'fr' => 'Transport vers/depuis le point de départ/arrivée du trek (Spécifiez le mode de transport).',
                ],
                [
                    'en' => 'Domestic flights (if applicable).',
                    'fr' => 'Vols intérieurs (si applicable).',
                ],
                [
                    'en' => 'Duffel bag for trekking.',
                    'fr' => 'Sac de voyage pour le trekking.',
                ],
                [
                    'en' => 'First-aid kit.',
                    'fr' => 'Trousse de premiers secours.',
                ],
                [
                    'en' => 'Water purification tablets or other water treatment.',
                    'fr' => 'Pastilles de purification d\'eau ou autre traitement de l\'eau.',
                ],
                [
                    'en' => 'Farewell dinner (if included).',
                    'fr' => 'Dîner d\'adieu (si inclus).',
                ],
                [
                    'en' => 'Government taxes and service charges.',
                    'fr' => 'Taxes gouvernementales et frais de service.',
                ],
                [
                    'en' => 'Office service charges.',
                    'fr' => 'Frais de service de bureau.',
                ],
                // Add any other specific inclusions from the trek information.
            ],
            'costs_exclude' => [
                [
                    'en' => 'International airfare.',
                    'fr' => 'Billet d\'avion international.',
                ],
                [
                    'en' => 'Nepal entry visa fee.',
                    'fr' => 'Frais de visa d\'entrée au Népal.',
                ],
                [
                    'en' => 'Travel insurance (Highly recommended).',
                    'fr' => 'Assurance voyage (Fortement recommandée).',
                ],
                [
                    'en' => 'Drinks (bottled water, soft drinks, alcohol).',
                    'fr' => 'Boissons (eau en bouteille, boissons gazeuses, alcool).',
                ],
                [
                    'en' => 'Meals in Kathmandu and Pokhara (except breakfasts where included).',
                    'fr' => 'Repas à Katmandou et Pokhara (sauf les petits-déjeuners lorsque inclus).',
                ],
                [
                    'en' => 'Hot showers, Wi-Fi, and other personal expenses.',
                    'fr' => 'Douches chaudes, Wi-Fi et autres dépenses personnelles.',
                ],
                [
                    'en' => 'Tips for guides, porters, and drivers (Customary).',
                    'fr' => 'Pourboires pour les guides, les porteurs et les chauffeurs (Habituel).',
                ],
                [
                    'en' => 'Souvenirs and other personal shopping.',
                    'fr' => 'Souvenirs et autres achats personnels.',
                ],
                // Add any other specific exclusions from the trek information.
            ],
            'is_featured' => false, // Set as needed
        ]);
        $annapurna_sanctuary_trek_data->destinations()->sync(
            Destination::where('region_id', 3)
                ->inRandomOrder()
                ->limit(5)
                ->get()
                ->pluck('id')
                ->toArray()
        );
        CuratorSeederHelper::seedBelongsTo(
            $annapurna_sanctuary_trek_data,
            'cover_image_id',
            public_path('photos/mountain4.jpg') // Replace with the actual path
        );

        CuratorSeederHelper::seedBelongsTo(
            $annapurna_sanctuary_trek_data,
            'feature_image_id',
            public_path('photos/mountain9.jpg') // Replace with the actual path
        );

        CuratorSeederHelper::seedBelongsToMany(
            $annapurna_sanctuary_trek_data,
            'images',
            public_path('photos/mountain4.jpg')
        );


        //  id 22

        $dhampus_sarangkot_chitwan_trek_data = Trek::create([
            'title' => [
                'en' => 'Dhampus / Sarangkot / Chitwan Pack',
                'fr' => 'Trek Dhampus Sarangkot avec Safari dans la Jungle de Chitwan', // French translation
            ],
            'description' => [
                'en' => 'The Dhampus Sarangkot trek with Chitwan jungle safari package is one of our most happening packages for travelers in Nepal. This package has a tour of historical sites in Kathmandu, a light hike to beautiful Dhampus village, a night stay at Sarangkot, a tour of caves, lakes, and waterfalls in Pokhara, and a jungle safari in Chitwan. You will explore and experience a lot following our Dhampus Sarangkot trek with Chitwan jungle safari itinerary. The journey is incredible and offers a profound glimpse of Nepali culture, traditions, art, and architecture. Not only that, but you will also get to see stunning views of the western Himalayan ranges that include the seventh and tenth-highest mountains in the world. Your time in both cities and nature will be excellent.',
                'fr' => 'Le forfait trek Dhampus Sarangkot avec safari dans la jungle de Chitwan est l\'un de nos forfaits les plus populaires pour les voyageurs au Népal. Ce forfait comprend une visite des sites historiques de Katmandou, une légère randonnée jusqu\'au magnifique village de Dhampus, une nuit à Sarangkot, une visite des grottes, des lacs et des cascades de Pokhara, et un safari dans la jungle à Chitwan. Vous explorerez et expérimenterez beaucoup en suivant notre itinéraire de trek Dhampus Sarangkot avec safari dans la jungle de Chitwan. Le voyage est incroyable et offre un aperçu profond de la culture, des traditions, de l\'art et de l\'architecture népalaises. Non seulement cela, mais vous aurez également la chance de voir des vues imprenables sur les chaînes de l\'Himalaya occidental qui comprennent les septième et dixième plus hautes montagnes du monde. Votre temps dans les villes et la nature sera excellent.', // French translation
            ],
            'duration' => '11',
            'grade' => '5',
            'starting_point' => 'Kathmandu',
            'ending_point' => 'Kathmandu',
            'best_time_for_trek' => [
                'en' => 'Sep-May',
                'fr' => 'Septembre à Mai', // French translation
            ],
            'starting_altitude' => 1400, // Kathmandu altitude - verify
            'highest_altitude' => 3500, // Add if known
            'region_id' => 7, // Add if known. It is likely a combination of regions.
            'category_id' => Category::find(10)->id,
            'trek_difficulty' => TrekDifficulty::MODERATE, // Verify
            'costs_include' => [
                [
                    'en' => 'Arrival and Departure Transport.',
                    'fr' => 'Transport d\'arrivée et de départ.',
                ],
                [
                    'en' => 'Accommodation in Kathmandu and Pokhara (Twin sharing) with breakfast.',
                    'fr' => 'Hébergement à Katmandou et Pokhara (chambre double) avec petit-déjeuner.',
                ],
                [
                    'en' => 'Accommodation in Chitwan (Twin sharing) with Breakfast, Lunch and dinner.',
                    'fr' => 'Hébergement à Chitwan (chambre double) avec petit-déjeuner, déjeuner et dîner.',
                ],
                [
                    'en' => 'Cultural Tour with entrance fees.',
                    'fr' => 'Visite culturelle avec frais d\'entrée.',
                ],
                [
                    'en' => 'Duffle Bag using for Trekking.',
                    'fr' => 'Sac de voyage pour le trekking.',
                ],
                [
                    'en' => 'Breakfast, Lunch & Dinner during the Trekking.',
                    'fr' => 'Petit-déjeuner, déjeuner et dîner pendant le trekking.',
                ],
                [
                    'en' => 'Accommodation in Tea house (mountain lodge) while trekking.',
                    'fr' => 'Hébergement dans une maison de thé (lodge de montagne) pendant le trekking.',
                ],
                [
                    'en' => 'Kathmandu -Pokhara Transport.',
                    'fr' => 'Transport Katmandou -Pokhara.',
                ],
                [
                    'en' => 'Pokhara-Hyangja Transport.',
                    'fr' => 'Transport Pokhara-Hyangja.',
                ],
                [
                    'en' => 'Pokhara - Chitwan Transport.',
                    'fr' => 'Transport Pokhara - Chitwan.',
                ],
                [
                    'en' => 'Chitwan-Kathmandu Transport.',
                    'fr' => 'Transport Chitwan-Katmandou.',
                ],
                [
                    'en' => 'Trekking Guide with insurance.',
                    'fr' => 'Guide de trekking avec assurance.',
                ],
                [
                    'en' => 'Trekking Guide\'\'s food and accommodation, wages etc.',
                    'fr' => 'Nourriture, hébergement, salaires, etc. du guide de trekking.',
                ],
                [
                    'en' => 'First Aid kit.',
                    'fr' => 'Trousse de premiers secours.',
                ],
                [
                    'en' => 'Dhampus sarangkot Trekking map.',
                    'fr' => 'Carte de trekking Dhampus Sarangkot.',
                ],
                [
                    'en' => 'Annapurna Conservation Area Project (ACAP) entry permit fee.',
                    'fr' => 'Frais de permis d\'entrée du projet de zone de conservation d\'Annapurna (ACAP).',
                ],
                [
                    'en' => 'All Jungle activities in Chitwan National Park.',
                    'fr' => 'Toutes les activités dans la jungle du parc national de Chitwan.',
                ],
                [
                    'en' => 'Farewell dinner with cultural program.',
                    'fr' => 'Dîner d\'adieu avec programme culturel.',
                ],
                [
                    'en' => 'Water purification tablets.',
                    'fr' => 'Pastilles de purification de l\'eau.',
                ],
                [
                    'en' => 'All Government taxes.',
                    'fr' => 'Toutes les taxes gouvernementales.',
                ],
                [
                    'en' => 'Office service charge.',
                    'fr' => 'Frais de service de bureau.',
                ],
            ],
            'costs_exclude' => [
                [
                    'en' => 'International Airfare.',
                    'fr' => 'Billet d\'avion international.',
                ],
                [
                    'en' => 'Your travel insurance of any kind',
                    'fr' => 'Votre assurance voyage de toute nature',
                ],
                [
                    'en' => 'Nepal entry Visa fee (US$ 30 for 15 days and US$ 50 for 30 days, you should get visa open your arrival)',
                    'fr' => 'Frais de visa d\'entrée au Népal (30 $ US pour 15 jours et 50 $ US pour 30 jours, vous devriez obtenir un visa à votre arrivée).',
                ],
                [
                    'en' => 'Drinks, Dessert, Juice, Mineral Water, Heater charge, Hot Shower during the Trekking and main meals in cities.',
                    'fr' => 'Boissons, dessert, jus, eau minérale, frais de chauffage, douche chaude pendant le trekking et les principaux repas dans les villes.',
                ],
                [
                    'en' => 'Tips for Guide and driver.',
                    'fr' => 'Pourboires pour le guide et le chauffeur.',
                ],
                [
                    'en' => 'Trekking porter if needed.',
                    'fr' => 'Porteur de trekking si nécessaire.',
                ],
            ],
            'is_featured' => false, // Set as needed
        ]);
        $dhampus_sarangkot_chitwan_trek_data->destinations()->sync(
            Destination::inRandomOrder()
                ->limit(5)
                ->get()
                ->pluck('id')
                ->toArray()
        );
        CuratorSeederHelper::seedBelongsTo(
            $dhampus_sarangkot_chitwan_trek_data,
            'cover_image_id',
            public_path('photos/mountain3.jpg') // Replace with the actual path
        );

        CuratorSeederHelper::seedBelongsTo(
            $dhampus_sarangkot_chitwan_trek_data,
            'feature_image_id',
            public_path('photos/mountain9.jpg') // Replace with the actual path
        );

        CuratorSeederHelper::seedBelongsToMany(
            $dhampus_sarangkot_chitwan_trek_data,
            'images',
            public_path('photos/mountain4.jpg')
        );

        $ghorepani_poonhill_trek_data = Trek::create([
            'title' => [
                'en' => 'Ghorepani Poonhill Trek',
                'fr' => 'Trek Ghorepani Poonhill', // French translation
            ],
            'description' => [
                'en' => 'Ghorepani Poonhill Trek is a paradise for travelers who want to witness some amazing views of the Himalayas without facing a lot of difficulties. The trail takes us through enchanting rhododendron forests and along the flowing rivers eventually offering an extraordinary views of Dhaulagiri , Annapurna I , Annapurna South , Nilgiri , Tukuche Peak, Hiuchuli , Machhapuchre (Fishtail ) , Lamjung Himal and many more. This unforgettable trek in the Annapurna is loved by people of all age groups and physical fitness which allows one to explore deeply into the local ethnic communities and learn more about their culture and tradition. The Gurung Museum in Ghandruk village is a perfect place to witness the ancient lifestyles of people living in this region. Taking a mountain flight to Pokhara from Kathmandu, the trail then heads north-west of Pokhara city towards Nayapul, the starting point of the trail. We will reach Ghorepani after 2 days of trekking as we navigate our way through the village of Birethanti, Ramghai, Tikhedhunga, Ulleri.',
                'fr' => 'Le trek de Ghorepani Poonhill est un paradis pour les voyageurs qui souhaitent admirer des vues incroyables sur l\'Himalaya sans rencontrer beaucoup de difficultés. Le sentier nous emmène à travers des forêts de rhododendrons enchanteresses et le long des rivières sinueuses, offrant finalement une vue extraordinaire sur le Dhaulagiri, l\'Annapurna I, l\'Annapurna Sud, le Nilgiri, le Tukuche Peak, l\'Hiuchuli, le Machhapuchre (Fishtail), le Lamjung Himal et bien d\'autres. Ce trek inoubliable dans l\'Annapurna est apprécié par les personnes de tous âges et de toutes conditions physiques, ce qui permet d\'explorer en profondeur les communautés ethniques locales et d\'en apprendre davantage sur leur culture et leurs traditions. Le musée Gurung dans le village de Ghandruk est un endroit idéal pour découvrir les anciens modes de vie des habitants de cette région. Après avoir pris un vol de montagne vers Pokhara depuis Katmandou, le sentier se dirige vers le nord-ouest de la ville de Pokhara en direction de Nayapul, le point de départ du sentier. Nous atteindrons Ghorepani après 2 jours de trekking en nous frayant un chemin à travers les villages de Birethanti, Ramghai, Tikhedhunga et Ulleri.', // French translation
            ],
            'duration' => '11',
            'grade' => '6',
            'starting_point' => 'Kathmandu',
            'ending_point' => 'Kathmandu',
            'best_time_for_trek' => [
                'en' => 'Sep-May',
                'fr' => 'Septembre à Mai', // French translation
            ],
            'starting_altitude' => 1400, // Kathmandu altitude - verify
            'highest_altitude' => 3210,
            'region_id' => 3, // Annapurna Region - ALREADY CORRECT
            'category_id' => Category::find(8)->id,
            'trek_difficulty' => TrekDifficulty::MODERATE, // Verify
            'costs_include' => [
                [
                    'en' => 'Arrival and Departure Transport.',
                    'fr' => 'Transport d\'arrivée et de départ.',
                ],
                [
                    'en' => 'Accommodation in Kathmandu and Pokhara with breakfast.',
                    'fr' => 'Hébergement à Katmandou et Pokhara avec petit-déjeuner.',
                ],
                [
                    'en' => 'Cultural Tour with entrance fees.',
                    'fr' => 'Visite culturelle avec frais d\'entrée.',
                ],
                [
                    'en' => 'Duffle Bag using for Trekking.',
                    'fr' => 'Sac de voyage pour le trekking.',
                ],
                [
                    'en' => 'Breakfast, Lunch & Dinner during the Trekking.',
                    'fr' => 'Petit-déjeuner, déjeuner et dîner pendant le trekking.',
                ],
                [
                    'en' => 'Accommodation in Tea house (mountain lodge) while trekking.',
                    'fr' => 'Hébergement dans une maison de thé (lodge de montagne) pendant le trekking.',
                ],
                [
                    'en' => 'Kathmandu -Pokhara Transport. (Tourist Bus).',
                    'fr' => 'Transport Katmandou -Pokhara. (Bus touristique).',
                ],
                [
                    'en' => 'Pokhara-Nayapul Transport.',
                    'fr' => 'Transport Pokhara-Nayapul.',
                ],
                [
                    'en' => 'Kimche - Pokhara Transport.',
                    'fr' => 'Transport Kimche - Pokhara.',
                ],
                [
                    'en' => 'Pokhara - Kathmandu flights with airport Tax.',
                    'fr' => 'Vols Pokhara - Katmandou avec taxes d\'aéroport.',
                ],
                [
                    'en' => 'Trekking Porter with Insurance. (We Provide 01 Porter for 02 Pax).',
                    'fr' => 'Porteur de trekking avec assurance. (Nous fournissons 01 porteur pour 02 personnes).',
                ],
                [
                    'en' => 'Trekking Guide with insurance.',
                    'fr' => 'Guide de trekking avec assurance.',
                ],
                [
                    'en' => 'Trekking guide and porters food and accommodation, wages etc.',
                    'fr' => 'Nourriture, hébergement, salaires, etc. du guide de trekking et des porteurs.',
                ],
                [
                    'en' => 'First Aid kit.',
                    'fr' => 'Trousse de premiers secours.',
                ],
                [
                    'en' => 'Ghorepni Poonhill Trekking Region map.',
                    'fr' => 'Carte de la région de trekking de Ghorepani Poonhill.',
                ],
                [
                    'en' => 'Annapurna Conservation Area Project (ACAP) entry permit fee.',
                    'fr' => 'Frais de permis d\'entrée du projet de zone de conservation d\'Annapurna (ACAP).',
                ],
                [
                    'en' => 'Trekker’s Information Management system (TIMS).',
                    'fr' => 'Système de gestion de l\'information des trekkeurs (TIMS).',
                ],
                [
                    'en' => 'All Government taxes.',
                    'fr' => 'Toutes les taxes gouvernementales.',
                ],
                [
                    'en' => 'Office service charge.',
                    'fr' => 'Frais de service de bureau.',
                ],
            ],
            'costs_exclude' => [
                [
                    'en' => 'International Airfare.',
                    'fr' => 'Billet d\'avion international.',
                ],
                [
                    'en' => 'Your travel insurance of any kind',
                    'fr' => 'Votre assurance voyage de toute nature',
                ],
                [
                    'en' => 'Nepal entry Visa fee (US$ 30 for 15 days and US$ 50 for 30 days, you should get visa open your arrival)',
                    'fr' => 'Frais de visa d\'entrée au Népal (30 $ US pour 15 jours et 50 $ US pour 30 jours, vous devriez obtenir un visa à votre arrivée).',
                ],
                [
                    'en' => 'Drinks, Dessert, Juice, Mineral Water, Heater charge, Hot Shower during the Trekking and main meals in cities.',
                    'fr' => 'Boissons, dessert, jus, eau minérale, frais de chauffage, douche chaude pendant le trekking et les principaux repas dans les villes.',
                ],
                [
                    'en' => 'Tips for Guide, Porter and driver.',
                    'fr' => 'Pourboires pour le guide, le porteur et le chauffeur.',
                ],
            ],
            'is_featured' => false, // Set as needed
        ]);
        $ghorepani_poonhill_trek_data->destinations()->sync(
            Destination::where('region_id', 3)
                ->inRandomOrder()
                ->limit(5)
                ->get()
                ->pluck('id')
                ->toArray()
        );
        CuratorSeederHelper::seedBelongsTo(
            $ghorepani_poonhill_trek_data,
            'cover_image_id',
            public_path('photos/basecamp3.JPG') // Replace with the actual path
        );

        CuratorSeederHelper::seedBelongsTo(
            $ghorepani_poonhill_trek_data,
            'feature_image_id',
            public_path('photos/mountain9.jpg') // Replace with the actual path
        );

        CuratorSeederHelper::seedBelongsToMany(
            $ghorepani_poonhill_trek_data,
            'images',
            public_path('photos/mountain4.jpg')
        );
    }
}
