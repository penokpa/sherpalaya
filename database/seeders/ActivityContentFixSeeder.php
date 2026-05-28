<?php

namespace Database\Seeders;

use App\Models\Expedition;
use App\Models\Tour;
use App\Models\Trek;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Rewrites the four Activity (Tour) records whose content was generic
 * Kathmandu copy (Tour #1 Kathmandu Valley Sightseeing, Tour #5 Bhaktapur,
 * Tour #6 EBC Helicopter, Tour #7 Helicopter Rescue) with accurate details,
 * highlights and tips. Also nulls out price_from across Trek / Expedition /
 * Tour since prices are no longer displayed.
 *
 * Idempotent: matches by English title, replaces highlights/tips wholesale,
 * safe to re-run on every deploy.
 */
class ActivityContentFixSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {
            $this->fixKathmanduValley();
            $this->fixBhaktapur();
            $this->fixEbcHelicopter();
            $this->fixHelicopterRescue();
            $this->clearAllPrices();
        });
    }

    private function fixKathmanduValley(): void
    {
        $tour = Tour::where('title->en', 'Kathmandu Valley Sightseeing Tour')->first();
        if (! $tour) {
            return;
        }

        $tour->setTranslation('description', 'en',
            'A full-day private tour of the four most important UNESCO-listed sites in the Kathmandu Valley, with hotel pickup and a licensed English/French-speaking heritage guide. We start at Swayambhunath (the "Monkey Temple", a 2,000-year-old hilltop stupa with the all-seeing eyes of the Buddha and 360° views of the valley), continue to Boudhanath (one of the largest stupas in the world and the spiritual centre of the Tibetan diaspora in Nepal, ringed by monasteries and a 500-metre prayer-wheel kora), then to Pashupatinath (Nepal\'s holiest Hindu temple, on the banks of the Bagmati, where open-air cremation ghats run day and night), and finish at Patan Durbar Square (the medieval royal palace of the Malla kings, the 21-spired Krishna Mandir, and the Patan Museum — widely considered the finest museum in South Asia). Eight hours door to door, with a Newari lunch break in a Patan courtyard restaurant.'
        );
        $tour->setTranslation('description', 'fr',
            'Une journée complète privée à la découverte des quatre principaux sites classés à l’UNESCO de la vallée de Katmandou, avec prise en charge à l’hôtel et guide patrimonial diplômé anglophone et francophone. Nous commençons par Swayambhunath (le « temple des singes », stupa au sommet d’une colline vieux de 2 000 ans, avec les yeux du Bouddha qui voient tout et une vue à 360° sur la vallée), puis Boudhanath (l’un des plus grands stupas du monde et centre spirituel de la diaspora tibétaine au Népal, entouré de monastères et d’un kora de 500 mètres avec ses moulins à prières), Pashupatinath (le temple hindou le plus sacré du Népal, sur les rives de la Bagmati, où les bûchers funéraires en plein air brûlent jour et nuit), et nous terminons à Patan Durbar Square (le palais royal médiéval des rois Malla, le Krishna Mandir aux 21 flèches et le Patan Museum — considéré comme le plus beau musée d’Asie du Sud). Huit heures porte à porte, avec une pause déjeuner newari dans une cour-restaurant de Patan.'
        );
        $tour->duration = '7-8 hours (full day)';
        $tour->setTranslation('best_time_for_tour', 'en', 'October–April (clearest skies and lowest air pollution); avoid the June–September monsoon');
        $tour->setTranslation('best_time_for_tour', 'fr', 'D’octobre à avril (ciel le plus dégagé, pollution minimale) ; éviter la mousson de juin à septembre');

        $tour->costs_include = [
            ['en' => 'Licensed English/French-speaking heritage guide', 'fr' => 'Guide patrimonial diplômé anglophone et francophone'],
            ['en' => 'Hotel pickup and drop-off in Kathmandu by private vehicle', 'fr' => 'Prise en charge et retour à l’hôtel à Katmandou en véhicule privé'],
            ['en' => 'All UNESCO entry fees (Swayambhunath, Boudhanath, Pashupatinath, Patan Durbar Square — approx. NPR 4,500 / USD 35 total for foreigners)', 'fr' => 'Tous les droits d’entrée UNESCO (Swayambhunath, Boudhanath, Pashupatinath, Patan Durbar Square — environ 4 500 NPR / 35 USD au total pour les étrangers)'],
            ['en' => 'Patan Museum entrance', 'fr' => 'Entrée au Patan Museum'],
            ['en' => 'Bottled water throughout the day', 'fr' => 'Eau en bouteille tout au long de la journée'],
        ];
        $tour->costs_exclude = [
            ['en' => 'Lunch (typical Newari thali at a Patan courtyard restaurant, approx. USD 8–12 per person)', 'fr' => 'Déjeuner (thali newari typique dans une cour-restaurant de Patan, environ 8 à 12 USD par personne)'],
            ['en' => 'Camera/video fee at the Pashupatinath inner cremation viewpoint (NPR 100 if you want to film)', 'fr' => 'Droit photo/vidéo au point de vue intérieur des crémations de Pashupatinath (100 NPR si vous souhaitez filmer)'],
            ['en' => 'Temple offerings, donations and personal expenses', 'fr' => 'Offrandes au temple, dons et dépenses personnelles'],
            ['en' => 'Tips and gratuities for the guide and driver', 'fr' => 'Pourboires pour le guide et le chauffeur'],
        ];
        $tour->save();

        $this->replaceHighlights($tour, [
            ['en_title' => 'Swayambhunath — the Monkey Temple', 'fr_title' => 'Swayambhunath — le temple des singes',
             'en_desc' => 'Climbing the 365 east-side steps to a 2,000-year-old hilltop stupa, with the all-seeing eyes of the Buddha gazing across the valley in four directions, and a panorama that on a clear day reaches the Langtang and Ganesh Himal.',
             'fr_desc' => 'Monter les 365 marches du flanc est jusqu’à un stupa vieux de 2 000 ans, surmonté des yeux du Bouddha qui balaient la vallée dans les quatre directions, avec une vue qui, par temps clair, atteint le Langtang et le Ganesh Himal.'],
            ['en_title' => 'Boudhanath — the largest stupa in the world', 'fr_title' => 'Boudhanath — le plus grand stupa du monde',
             'en_desc' => 'Joining the morning kora — the clockwise circumambulation — with Tibetan refugees, maroon-robed monks and Newari Buddhists turning hundreds of prayer wheels beneath the 36-metre dome. The surrounding ring of monasteries is the spiritual heart of the Tibetan diaspora in Nepal.',
             'fr_desc' => 'Rejoindre le kora du matin — la circumambulation dans le sens horaire — avec des réfugiés tibétains, des moines en robe pourpre et des bouddhistes newars qui font tourner des centaines de moulins à prières sous le dôme de 36 mètres. L’anneau de monastères qui l’entoure est le cœur spirituel de la diaspora tibétaine au Népal.'],
            ['en_title' => 'Pashupatinath — Nepal’s holiest Hindu temple', 'fr_title' => 'Pashupatinath — le temple hindou le plus sacré du Népal',
             'en_desc' => 'Watching the funeral pyres on the Bagmati ghats from the opposite bank — a working cremation complex, not a tourist set — with sadhus in saffron, the resident monkey troop, and the smoke of the same fires that have burned here for more than a thousand years.',
             'fr_desc' => 'Observer depuis la rive opposée les bûchers funéraires sur les ghats de la Bagmati — un complexe de crémation en activité, et non un décor touristique — avec les sadhus en orange, la troupe de singes résidente, et la fumée des mêmes feux qui brûlent ici depuis plus de mille ans.'],
            ['en_title' => 'Patan Durbar Square — the Malla royal palace', 'fr_title' => 'Patan Durbar Square — le palais royal des Malla',
             'en_desc' => 'The Krishna Mandir with its 21 gilded spires carved entirely from stone (no two figures alike), the Royal Bath of Sundari Chowk, the Mul Chowk courtyard and the Taleju Bell — all built between the 14th and 17th centuries by the Malla kings.',
             'fr_desc' => 'Le Krishna Mandir aux 21 flèches dorées entièrement sculptées dans la pierre (aucune figure identique), le bain royal de Sundari Chowk, la cour de Mul Chowk et la cloche Taleju — tout cela bâti entre les XIVᵉ et XVIIᵉ siècles par les rois Malla.'],
            ['en_title' => 'Patan Museum — the finest in South Asia', 'fr_title' => 'Patan Museum — le plus beau d’Asie du Sud',
             'en_desc' => 'A restored wing of the old royal palace housing the largest collection of Newar bronze, gilt and stone sculpture anywhere in the world — explained on legible bilingual panels, in galleries cool and quiet enough to actually read them. Plan for at least 45 minutes inside.',
             'fr_desc' => 'Une aile restaurée de l’ancien palais royal abritant la plus grande collection de sculptures newars en bronze, doré et pierre du monde — expliquées sur des panneaux bilingues lisibles, dans des galeries assez fraîches et calmes pour vraiment les lire. Prévoir au moins 45 minutes à l’intérieur.'],
        ]);

        $this->replaceTips($tour, [
            ['en_title' => 'Wear shoes you can slip off quickly', 'fr_title' => 'Portez des chaussures faciles à retirer',
             'en_desc' => 'Every temple inner courtyard requires removing footwear. Loafers, slip-ons or sneakers with elastic laces save 10 minutes per stop — and you do four stops in a day. Heavy boots and tight laces are the slowest setup.',
             'fr_desc' => 'Chaque cour intérieure de temple impose de se déchausser. Mocassins, chaussures sans lacets ou baskets à lacets élastiques font gagner 10 minutes par étape — et il y en a quatre dans la journée. Les grosses chaussures à lacets serrés sont la pire configuration.'],
            ['en_title' => 'Cover shoulders and knees', 'fr_title' => 'Couvrez épaules et genoux',
             'en_desc' => 'Pashupatinath in particular is conservative — women must cover shoulders and knees, and men in shorts can be refused at some inner courtyards. A lightweight scarf in your daypack solves it; rented temple shawls at the gate are dusty and rarely fit.',
             'fr_desc' => 'Pashupatinath est particulièrement conservateur — les femmes doivent couvrir épaules et genoux, et les hommes en short peuvent se voir refuser l’accès à certaines cours intérieures. Un châle léger dans le sac à dos règle la question ; les pièces louées à l’entrée sont poussiéreuses et rarement à la bonne taille.'],
            ['en_title' => 'Eat lunch in Patan, not at Pashupatinath', 'fr_title' => 'Déjeunez à Patan, pas à Pashupatinath',
             'en_desc' => 'There are no good restaurants near the cremation ghats and the smell does not pair with food. The natural break is at Patan, where courtyard cafés in the old town serve Newari thali — and you can sit for 45 minutes before the museum visit.',
             'fr_desc' => 'Il n’y a pas de bonnes adresses près des ghats de crémation, et l’odeur ne s’accorde pas avec un repas. La pause naturelle se fait à Patan, où les cafés en cour intérieure servent le thali newari — vous pouvez vous y attabler 45 minutes avant la visite du musée.'],
            ['en_title' => 'Cremation ghats are real funerals', 'fr_title' => 'Les ghats de crémation sont de vraies funérailles',
             'en_desc' => 'Pashupatinath is not a spectacle. Photography is allowed only from the opposite bank, never close-up; some families ask for cameras to be put away and that is binding. Watch quietly, keep distance, follow the guide’s cues.',
             'fr_desc' => 'Pashupatinath n’est pas un spectacle. Les photos ne sont autorisées que depuis la rive opposée, jamais en gros plan ; certaines familles demandent que les appareils soient rangés, et cela s’impose à tous. Observez en silence, gardez la distance, suivez les indications du guide.'],
            ['en_title' => 'Carry small Nepali rupee notes', 'fr_title' => 'Prévoyez de petites coupures en roupies népalaises',
             'en_desc' => 'UNESCO ticket booths take cash only. Bottled water, offerings, parking tips and the camera fee at Pashupatinath are also cash-only — NPR 100 and NPR 500 notes go furthest. Card terminals are sparse around the heritage sites and unreliable when they exist.',
             'fr_desc' => 'Les guichets des sites UNESCO n’acceptent que les espèces. Eau en bouteille, offrandes, pourboires de parking et droit photo à Pashupatinath se règlent également en cash — les coupures de 100 et 500 NPR sont les plus utiles. Les terminaux de carte sont rares autour des sites patrimoniaux et peu fiables quand ils existent.'],
        ]);
    }

    private function fixBhaktapur(): void
    {
        $tour = Tour::where('title->en', 'Cultural Tour of Bhaktapur')->first();
        if (! $tour) {
            return;
        }

        $tour->setTranslation('description', 'en',
            'A half-day walk through the UNESCO-listed medieval city of Bhaktapur, 13 km east of Kathmandu, with a licensed Newari-speaking guide. We cover the four historic squares — Durbar Square (55-Window Palace, Golden Gate, Vatsala Temple), Taumadhi Square (Nyatapola Temple), Pottery Square at Talako, and Dattatreya Square with its Peacock Window — and finish with a tasting of juju dhau and a traditional samay baji platter in a 14th-century courtyard kitchen.'
        );
        $tour->setTranslation('description', 'fr',
            'Une demi-journée à pied dans la cité médiévale de Bhaktapur, classée au patrimoine mondial de l’UNESCO, à 13 km à l’est de Katmandou, avec un guide diplômé parlant newari. Nous parcourons les quatre places historiques — Durbar Square (palais aux 55 fenêtres, Porte d’Or, temple Vatsala), Taumadhi Square (temple Nyatapola), la place des Potiers à Talako, et Dattatreya Square avec sa fenêtre du paon — puis dégustation de juju dhau et d’un plateau traditionnel samay baji dans une cour-cuisine du XIVᵉ siècle.'
        );
        $tour->duration = '4-5 hours';
        $tour->setTranslation('best_time_for_tour', 'en', 'October–April (clearest skies); avoid the June–August monsoon');
        $tour->setTranslation('best_time_for_tour', 'fr', 'D’octobre à avril (ciel le plus dégagé) ; éviter la mousson de juin à août');

        $tour->costs_include = [
            ['en' => 'Licensed English/French/Newari-speaking cultural guide', 'fr' => 'Guide culturel diplômé anglophone, francophone et newari'],
            ['en' => 'Bhaktapur Durbar Square heritage entry fee (NPR 1,500 / approx. USD 12)', 'fr' => 'Droit d’entrée du site patrimonial de Durbar Square à Bhaktapur (1 500 NPR / environ 12 USD)'],
            ['en' => 'Private vehicle transfer from Kathmandu and back', 'fr' => 'Transfert privé aller-retour depuis Katmandou'],
            ['en' => 'Juju dhau tasting (king curd in a clay bowl)', 'fr' => 'Dégustation de juju dhau (caillé royal dans un bol en argile)'],
            ['en' => 'Samay baji platter at a Newari home kitchen', 'fr' => 'Plateau samay baji dans une cuisine familiale newari'],
        ];
        $tour->costs_exclude = [
            ['en' => 'Additional meals and drinks beyond the tasting', 'fr' => 'Repas et boissons supplémentaires en dehors de la dégustation'],
            ['en' => 'Optional pottery wheel workshop at Talako (approx. USD 10 per person)', 'fr' => 'Atelier optionnel de poterie au tour à Talako (environ 10 USD par personne)'],
            ['en' => 'Personal shopping (wood carvings, thangka, textiles)', 'fr' => 'Achats personnels (sculptures sur bois, thangka, textiles)'],
            ['en' => 'Tips and gratuities for the guide and driver', 'fr' => 'Pourboires pour le guide et le chauffeur'],
        ];
        $tour->save();

        $this->replaceHighlights($tour, [
            ['en_title' => 'Bhaktapur Durbar Square', 'fr_title' => 'Durbar Square de Bhaktapur',
             'en_desc' => 'The 55-Window Palace, the Golden Gate, and the Vatsala Bell on a square that once held twice as many temples before the 1934 earthquake — your guide points out which silhouettes were original and which were rebuilt.',
             'fr_desc' => 'Le palais aux 55 fenêtres, la Porte d’Or et la cloche Vatsala sur une place qui comptait autrefois deux fois plus de temples avant le séisme de 1934 — votre guide vous montre lesquelles silhouettes sont d’origine et lesquelles ont été reconstruites.'],
            ['en_title' => 'Nyatapola Temple at Taumadhi Square', 'fr_title' => 'Temple Nyatapola sur Taumadhi Square',
             'en_desc' => 'Climbing the steps of Nepal’s tallest pagoda — five tiers, 30 metres high, flanked by stone wrestlers, elephants, lions, griffins and goddesses, each rank ten times stronger than the one below.',
             'fr_desc' => 'Monter les marches de la plus haute pagode du Népal — cinq étages, 30 mètres de haut, gardée par des lutteurs de pierre, des éléphants, des lions, des griffons et des déesses, chaque rang dix fois plus puissant que le précédent.'],
            ['en_title' => 'Pottery Square (Talako)', 'fr_title' => 'La place des Potiers (Talako)',
             'en_desc' => 'Open-air drying yards covered in unfired clay pots, with master potters throwing on traditional wooden wheels — and the option to try a wheel yourself with a Prajapati family member.',
             'fr_desc' => 'Des cours à ciel ouvert couvertes de poteries d’argile crue, avec des maîtres potiers travaillant sur des tours en bois traditionnels — et la possibilité d’essayer un tour avec un membre de la famille Prajapati.'],
            ['en_title' => 'Newari food tasting in a courtyard kitchen', 'fr_title' => 'Dégustation newari dans une cour-cuisine',
             'en_desc' => 'Juju dhau served in unfired clay bowls, plus a samay baji platter — beaten rice, smoked buffalo, black soybeans, ginger, chhoila and aila — in a family courtyard the textbooks won’t show you.',
             'fr_desc' => 'Juju dhau servi dans des bols en argile crue, plus un plateau samay baji — riz battu, buffle fumé, soja noir, gingembre, chhoila et aila — dans une cour familiale que les guides ne mentionnent pas.'],
            ['en_title' => 'Dattatreya Square and the Peacock Window', 'fr_title' => 'Dattatreya Square et la fenêtre du paon',
             'en_desc' => 'The oldest quarter of the city, named after the 15th-century Dattatreya Temple built from the timber of a single tree, with the famous Peacock Window — the most photographed piece of wood-carving in Nepal.',
             'fr_desc' => 'Le quartier le plus ancien de la ville, nommé d’après le temple Dattatreya du XVᵉ siècle, bâti à partir du bois d’un seul arbre, avec la célèbre fenêtre du paon — la sculpture sur bois la plus photographiée du Népal.'],
        ]);

        $this->replaceTips($tour, [
            ['en_title' => 'Wear shoes that handle cobblestone', 'fr_title' => 'Portez des chaussures adaptées aux pavés',
             'en_desc' => 'Bhaktapur’s brick lanes are uneven and become slippery in rain — flip-flops will ruin your ankles by the second hour. Closed shoes with a real sole, not sandals, for the whole walk.',
             'fr_desc' => 'Les ruelles pavées de Bhaktapur sont irrégulières et deviennent glissantes sous la pluie — les tongs vous massacreront les chevilles en deux heures. Chaussures fermées à semelle, pas de sandales, pour toute la marche.'],
            ['en_title' => 'Eat the juju dhau in its clay bowl', 'fr_title' => 'Mangez le juju dhau dans son bol d’argile',
             'en_desc' => 'The "king curd" is served in unglazed terracotta that lets the whey wick out and thickens the yoghurt as you eat — the bowl is part of the dish, not packaging to discard. Eat the curd, keep the bowl as a souvenir.',
             'fr_desc' => 'Le « caillé royal » est servi dans une terre cuite non émaillée qui laisse le petit-lait s’évacuer et épaissit le yaourt à mesure que vous mangez — le bol fait partie du plat, ce n’est pas un emballage à jeter. Mangez le caillé, gardez le bol en souvenir.'],
            ['en_title' => 'Mornings beat afternoons', 'fr_title' => 'Le matin vaut mieux que l’après-midi',
             'en_desc' => 'The squares fill with tour groups after 10:30. Start the walk by 9:00 for clean photos of the Nyatapola steps, the Golden Gate and Pottery Square without ten other lenses in frame.',
             'fr_desc' => 'Les places se remplissent de groupes après 10h30. Commencer la marche à 9h00 permet des photos propres des marches du Nyatapola, de la Porte d’Or et de la place des Potiers sans dix autres objectifs dans le cadre.'],
            ['en_title' => 'The 2015 earthquake reshaped the city', 'fr_title' => 'Le séisme de 2015 a transformé la ville',
             'en_desc' => 'Some temples are reconstructions; others are still scaffolded a decade later. Ask your guide which are originals, which are post-quake rebuilds, and which are gone for good — it changes how you read the architecture.',
             'fr_desc' => 'Certains temples sont des reconstructions ; d’autres sont encore en chantier dix ans après. Demandez à votre guide lesquels sont d’origine, lesquels ont été refaits et lesquels ont disparu — cela change la lecture de l’architecture.'],
            ['en_title' => 'Carry small Nepali rupee notes', 'fr_title' => 'Prévoyez de petites coupures en roupies népalaises',
             'en_desc' => 'The pottery wheel workshop, additional juju dhau bowls, temple offerings and bottled water are all cash-only in small amounts. NPR 100 and NPR 500 notes go further than counting on card terminals inside the old city.',
             'fr_desc' => 'L’atelier de poterie, les bols supplémentaires de juju dhau, les offrandes au temple et l’eau en bouteille se règlent uniquement en espèces, en petites coupures. Les billets de 100 et 500 NPR sont plus utiles que de compter sur les terminaux de carte dans la vieille ville.'],
        ]);
    }

    private function fixEbcHelicopter(): void
    {
        $tour = Tour::where('title->en', 'Helicopter Tour to Everest Base Camp')->first();
        if (! $tour) {
            return;
        }

        $tour->setTranslation('description', 'en',
            'An early-morning helicopter charter from Kathmandu into the Khumbu, with a brief landing at Kala Patthar (5,545 m) for unobstructed views of Mount Everest, Nuptse and Lhotse, followed by a buffet breakfast on the terrace of Hotel Everest View (3,880 m) at Syangboche. The route flies via Lukla and Pheriche, where the group is split into smaller shuttles so the aircraft can safely lift to altitude. Round-trip from Kathmandu in 4–5 hours, returning before midday.'
        );
        $tour->setTranslation('description', 'fr',
            'Vol privé en hélicoptère au départ de Katmandou, tôt le matin, jusqu’au cœur du Khumbu, avec une brève escale à Kala Patthar (5 545 m) pour admirer le mont Everest, le Nuptse et le Lhotse, suivie d’un petit-déjeuner buffet sur la terrasse de l’Hôtel Everest View (3 880 m) à Syangboche. L’itinéraire passe par Lukla puis Pheriche, où le groupe est divisé en navettes plus légères pour respecter les limites d’altitude. Aller-retour depuis Katmandou en 4 à 5 heures, retour avant midi.'
        );
        $tour->duration = '4-5 hours';
        $tour->setTranslation('best_time_for_tour', 'en', 'September–November (autumn) and March–May (spring)');
        $tour->setTranslation('best_time_for_tour', 'fr', 'Septembre à novembre (automne) et mars à mai (printemps)');

        $tour->costs_include = [
            ['en' => 'Hotel–airport–hotel transfers in Kathmandu by private vehicle', 'fr' => 'Transferts privés hôtel–aéroport–hôtel à Katmandou'],
            ['en' => 'Helicopter charter (Airbus AS350 B3 / H125) with pilot and fuel', 'fr' => 'Affrètement de l’hélicoptère (Airbus AS350 B3 / H125), pilote et carburant inclus'],
            ['en' => 'Kala Patthar landing (subject to weight, altitude and weather)', 'fr' => 'Atterrissage à Kala Patthar (selon le poids, l’altitude et la météo)'],
            ['en' => 'Sagarmatha National Park entry permit', 'fr' => 'Permis d’entrée au parc national de Sagarmatha'],
            ['en' => 'Khumbu Pasang Lhamu Rural Municipality fee', 'fr' => 'Taxe de la municipalité rurale Khumbu Pasang Lhamu'],
            ['en' => 'Domestic airport tax and landing fees', 'fr' => 'Taxes d’aéroport et redevances d’atterrissage'],
            ['en' => 'Supplementary oxygen and first-aid kit on board', 'fr' => 'Oxygène d’appoint et trousse de premiers secours à bord'],
            ['en' => 'Government taxes and VAT', 'fr' => 'Taxes gouvernementales et TVA'],
        ];
        $tour->costs_exclude = [
            ['en' => 'Breakfast at Hotel Everest View (approx. USD 35 per person, paid on site)', 'fr' => 'Petit-déjeuner à l’Hôtel Everest View (environ 35 USD par personne, à régler sur place)'],
            ['en' => 'Travel insurance with high-altitude and helicopter evacuation cover', 'fr' => 'Assurance voyage couvrant la haute altitude et l’évacuation par hélicoptère'],
            ['en' => 'Personal expenses, tips and gratuities', 'fr' => 'Dépenses personnelles, pourboires et gratifications'],
            ['en' => 'Any additional costs caused by weather delays or itinerary changes beyond our control', 'fr' => 'Frais supplémentaires liés aux retards météo ou aux modifications d’itinéraire indépendants de notre volonté'],
        ];
        $tour->save();

        $this->replaceHighlights($tour, [
            ['en_title' => 'Sunrise lift-off from Kathmandu', 'fr_title' => 'Décollage au lever du soleil depuis Katmandou',
             'en_desc' => 'An early start to beat the afternoon Khumbu winds, with the Kathmandu Valley still glowing under the Himalaya skyline as you climb out.',
             'fr_desc' => 'Un départ matinal pour devancer les vents de l’après-midi dans le Khumbu, avec la vallée de Katmandou encore éclairée par la silhouette de l’Himalaya à l’horizon.'],
            ['en_title' => 'Landing on Kala Patthar (5,545 m)', 'fr_title' => 'Atterrissage à Kala Patthar (5 545 m)',
             'en_desc' => 'Eight to ten minutes on the highest point of the day, eye-level with the south face of Everest, Nuptse, Lhotse and Pumori.',
             'fr_desc' => 'Huit à dix minutes sur le point culminant de la journée, à hauteur d’yeux avec la face sud de l’Everest, le Nuptse, le Lhotse et le Pumori.'],
            ['en_title' => 'Aerial pass over Everest Base Camp and the Khumbu Icefall', 'fr_title' => 'Survol du camp de base de l’Everest et de la cascade de glace du Khumbu',
             'en_desc' => 'See the actual climbers’ camp and the broken seracs of the Khumbu Icefall from above, without the eight-day trek to reach them.',
             'fr_desc' => 'Découvrez d’en haut le camp des alpinistes et les séracs disloqués de la cascade de glace, sans la marche de huit jours pour y parvenir.'],
            ['en_title' => 'Breakfast at Hotel Everest View (3,880 m)', 'fr_title' => 'Petit-déjeuner à l’Hôtel Everest View (3 880 m)',
             'en_desc' => 'Buffet breakfast on the terrace of one of the world’s highest hotels, with Ama Dablam and the Everest amphitheatre directly in front of you.',
             'fr_desc' => 'Petit-déjeuner buffet sur la terrasse de l’un des hôtels les plus hauts du monde, face à l’Ama Dablam et à l’amphithéâtre de l’Everest.'],
            ['en_title' => 'Khumbu villages from the air', 'fr_title' => 'Les villages du Khumbu vus du ciel',
             'en_desc' => 'Lukla, Pheriche, Tengboche monastery and the Sherpa villages spread across the valley — all in a single morning, back in Kathmandu before midday.',
             'fr_desc' => 'Lukla, Pheriche, le monastère de Tengboche et les villages sherpas répartis dans la vallée — tout cela en une matinée, retour à Katmandou avant midi.'],
        ]);

        $this->replaceTips($tour, [
            ['en_title' => 'Dress in real layers', 'fr_title' => 'Habillez-vous en vraies couches',
             'en_desc' => 'The ten-minute Kala Patthar landing is windy and below freezing even in spring. A down jacket, hat and gloves stay essential — sneakers and a fleece are not enough.',
             'fr_desc' => 'L’escale de dix minutes à Kala Patthar est venteuse et sous le point de congélation, même au printemps. Doudoune, bonnet et gants restent indispensables — des baskets et un polaire ne suffisent pas.'],
            ['en_title' => 'Eat light before flying', 'fr_title' => 'Mangez léger avant le vol',
             'en_desc' => 'Rapid altitude gain combined with an early heavy breakfast often triggers nausea. Hydrate well, eat lightly, and save the buffet for Hotel Everest View at 3,880 m.',
             'fr_desc' => 'Une prise d’altitude rapide associée à un copieux petit-déjeuner matinal provoque souvent des nausées. Hydratez-vous bien, mangez léger et gardez le buffet pour l’Hôtel Everest View à 3 880 m.'],
            ['en_title' => 'Body weight matters', 'fr_title' => 'Le poids compte',
             'en_desc' => 'Total passenger weight is recorded at check-in. At Pheriche the group is often split into smaller shuttles so the aircraft can safely lift to altitude — this is normal, not a downgrade.',
             'fr_desc' => 'Le poids total des passagers est enregistré à l’enregistrement. À Pheriche, le groupe est souvent divisé en navettes plus légères pour que l’appareil puisse monter en altitude en toute sécurité — c’est une procédure normale, non un déclassement.'],
            ['en_title' => 'Sunglasses and high-SPF sunscreen', 'fr_title' => 'Lunettes de soleil et crème solaire haute protection',
             'en_desc' => 'UV at 5,500 m is intense and the snow glare on a clear morning is unforgiving. Category-3 or category-4 sunglasses and SPF 50 sunscreen on every exposed surface — including under the chin and inside the nose.',
             'fr_desc' => 'Les UV à 5 500 m sont intenses et la réverbération sur la neige par matinée dégagée est impitoyable. Lunettes de catégorie 3 ou 4 et crème solaire SPF 50 sur toutes les zones exposées — y compris sous le menton et l’intérieur du nez.'],
            ['en_title' => 'Weather has the final say', 'fr_title' => 'La météo a le dernier mot',
             'en_desc' => 'Flights are weather-dependent. Rescheduling inside your trip window is normal; if the weather is closed for the whole window, the heli portion is refunded — but a forced reschedule is not.',
             'fr_desc' => 'Les vols dépendent de la météo. Un report à l’intérieur de votre fenêtre de séjour est normal ; si le temps reste fermé pendant toute la fenêtre, la portion hélicoptère est remboursée — mais un simple report imposé ne l’est pas.'],
        ]);
    }

    private function fixHelicopterRescue(): void
    {
        $tour = Tour::where('title->en', 'Helicopter Rescue Service')->first();
        if (! $tour) {
            return;
        }

        $tour->setTranslation('description', 'en',
            'On-call helicopter evacuation and medical extraction across the Nepal Himalaya, coordinated 24/7 from our Kathmandu office. Most commonly used for acute mountain sickness (AMS), HACE/HAPE, traumatic injuries on technical climbs, or any condition where a rapid descent to a lower altitude or to hospital is required. We liaise with the pilot, the Himalayan Rescue Association aid posts (Pheriche, Manang, Macchermo) when available, and your insurer — so the rescue can launch the moment weather and authorisations allow. A valid travel insurance policy covering high-altitude helicopter evacuation is required before any rescue is initiated.'
        );
        $tour->setTranslation('description', 'fr',
            'Évacuation héliportée et extraction médicale d’urgence dans tout l’Himalaya népalais, coordonnées 24h/24 et 7j/7 depuis notre bureau de Katmandou. Indiquée pour le mal aigu des montagnes (MAM), l’œdème cérébral (OCHA) ou pulmonaire (OPHA), les traumatismes en escalade technique, ou toute situation nécessitant une descente rapide ou une hospitalisation. Nous coordonnons l’opération avec le pilote, les postes de secours de l’Himalayan Rescue Association (Pheriche, Manang, Macchermo) lorsque disponibles, et votre assureur — pour que le décollage ait lieu dès que la météo et les autorisations le permettent. Une assurance voyage couvrant l’évacuation héliportée en haute altitude est obligatoire avant toute opération.'
        );
        $tour->duration = 'On call, 24/7';

        $tour->costs_include = [
            ['en' => 'Coordination with helicopter operators and the pilot at any hour', 'fr' => 'Coordination avec les opérateurs et le pilote à toute heure'],
            ['en' => 'Communication with your travel insurer to confirm cover and authorise the flight', 'fr' => 'Échanges avec votre assureur pour valider la prise en charge et autoriser le vol'],
            ['en' => 'Liaison with HRA aid posts and Kathmandu hospitals for ongoing care', 'fr' => 'Liaison avec les postes de secours de l’HRA et les hôpitaux de Katmandou pour la suite des soins'],
            ['en' => 'Ground transfer from the receiving airport to a Kathmandu hospital', 'fr' => 'Transfert terrestre de l’aéroport d’arrivée vers un hôpital de Katmandou'],
            ['en' => 'English-speaking point of contact throughout the evacuation', 'fr' => 'Interlocuteur anglophone tout au long de l’évacuation'],
        ];
        $tour->costs_exclude = [
            ['en' => 'Helicopter flight charges — recovered from your travel insurer or billed directly to you', 'fr' => 'Frais du vol hélicoptère — récupérés auprès de votre assureur ou facturés directement'],
            ['en' => 'Hospital, doctor and medication costs', 'fr' => 'Frais hospitaliers, honoraires médicaux et médicaments'],
            ['en' => 'Personal travel insurance with high-altitude evacuation cover (mandatory)', 'fr' => 'Assurance voyage personnelle couvrant l’évacuation en haute altitude (obligatoire)'],
            ['en' => 'Costs arising from rescues launched without prior insurance confirmation', 'fr' => 'Frais liés à un sauvetage déclenché sans confirmation préalable de l’assurance'],
        ];
        $tour->save();

        $this->replaceHighlights($tour, [
            ['en_title' => '24/7 dispatch from Kathmandu', 'fr_title' => 'Coordination 24h/24 depuis Katmandou',
             'en_desc' => 'A single phone call from your guide on the trail triggers our coordination cell day or night — we own the call sequence from that moment until you reach hospital.',
             'fr_desc' => 'Un seul appel de votre guide sur le sentier déclenche notre cellule de coordination, de jour comme de nuit — nous prenons en charge la chaîne d’appels jusqu’à votre arrivée à l’hôpital.'],
            ['en_title' => 'Insurance liaison handled for you', 'fr_title' => 'Liaison avec l’assurance prise en charge pour vous',
             'en_desc' => 'We talk to your insurer in real time so the flight is authorised without you handling paperwork at altitude or chasing claim numbers from a tent.',
             'fr_desc' => 'Nous échangeons avec votre assureur en temps réel pour que le vol soit autorisé sans que vous ayez à gérer la paperasse en altitude ni à chercher un numéro de dossier depuis une tente.'],
            ['en_title' => 'HRA aid post integration', 'fr_title' => 'Intégration avec les postes de secours de l’HRA',
             'en_desc' => 'Where the route allows, we coordinate with Himalayan Rescue Association doctors at Pheriche, Manang and Macchermo so the patient is stabilised before the heli arrives.',
             'fr_desc' => 'Lorsque l’itinéraire le permet, nous coordonnons avec les médecins de l’Himalayan Rescue Association à Pheriche, Manang et Macchermo afin de stabiliser le patient avant l’arrivée de l’hélicoptère.'],
            ['en_title' => 'Direct handover to a Kathmandu hospital', 'fr_title' => 'Transfert direct vers un hôpital de Katmandou',
             'en_desc' => 'Ground transfer from the receiving airport straight to a partner hospital in Kathmandu — no scramble on arrival, no triage on the tarmac.',
             'fr_desc' => 'Transfert terrestre de l’aéroport d’arrivée directement vers un hôpital partenaire à Katmandou — pas d’improvisation à l’arrivée, pas de triage sur le tarmac.'],
        ]);

        $this->replaceTips($tour, [
            ['en_title' => 'Buy insurance with explicit heli-evacuation cover', 'fr_title' => 'Souscrivez une assurance avec couverture héliportée explicite',
             'en_desc' => 'Generic travel insurance is not enough. The policy must name high-altitude cover (6,000 m for most Nepal treks; higher for climbing) and helicopter extraction — without that, operators will refuse to fly.',
             'fr_desc' => 'Une assurance voyage standard ne suffit pas. La police doit mentionner explicitement la couverture haute altitude (6 000 m pour la plupart des treks au Népal, davantage pour l’alpinisme) et l’évacuation héliportée — sans cela, les opérateurs refuseront de voler.'],
            ['en_title' => 'Save our 24/7 number before you leave', 'fr_title' => 'Enregistrez notre numéro 24h/24 avant le départ',
             'en_desc' => 'Programme our number into your phone and your guide’s phone before you start trekking. Rescues are launched by voice call, not email — minutes matter.',
             'fr_desc' => 'Enregistrez notre numéro sur votre téléphone et sur celui de votre guide avant le début du trek. Les évacuations se déclenchent par appel vocal, pas par email — chaque minute compte.'],
            ['en_title' => 'Don’t wait for symptoms to worsen', 'fr_title' => 'N’attendez pas que les symptômes s’aggravent',
             'en_desc' => 'AMS, HACE and HAPE can deteriorate within hours. Severe headache, ataxia, confusion or breathlessness at rest are calls to descend immediately and contact us — not signals to push on for one more day.',
             'fr_desc' => 'Le MAM, l’OCHA et l’OPHA peuvent s’aggraver en quelques heures. Mal de tête sévère, ataxie, confusion ou essoufflement au repos imposent une descente immédiate et un appel — ce ne sont pas des signaux pour tenir un jour de plus.'],
            ['en_title' => 'Carry insurance and passport copies', 'fr_title' => 'Emportez des copies de l’assurance et du passeport',
             'en_desc' => 'The operator may ask for policy and passport details before lift-off if your insurer can’t be reached immediately. A digital copy on your phone is the simplest backup.',
             'fr_desc' => 'L’opérateur peut demander les détails de la police et du passeport avant le décollage si l’assureur n’est pas joignable immédiatement. Une copie numérique sur votre téléphone est la solution la plus simple.'],
            ['en_title' => 'False rescues are billed in full', 'fr_title' => 'Les fausses évacuations sont facturées intégralement',
             'en_desc' => 'Calling a helicopter for fatigue or to skip a day’s walking is treated as a private charter, not a medical evacuation — your insurer will not pay and the full flight cost falls on you.',
             'fr_desc' => 'Faire venir un hélicoptère par fatigue ou pour sauter une étape est considéré comme un vol privé, non comme une évacuation médicale — votre assureur ne prendra pas en charge et le coût intégral du vol vous reviendra.'],
        ]);
    }

    private function clearAllPrices(): void
    {
        Tour::query()->whereNotNull('price_from')->update(['price_from' => null]);
        Trek::query()->whereNotNull('price_from')->update(['price_from' => null]);
        Expedition::query()->whereNotNull('price_from')->update(['price_from' => null]);
    }

    private function replaceHighlights($tour, array $rows): void
    {
        $tour->keyHighlights()->delete();
        foreach ($rows as $r) {
            $tour->keyHighlights()->create([
                'title' => ['en' => $r['en_title'], 'fr' => $r['fr_title']],
                'description' => ['en' => $r['en_desc'], 'fr' => $r['fr_desc']],
            ]);
        }
    }

    private function replaceTips($tour, array $rows): void
    {
        $tour->essentialTips()->delete();
        foreach ($rows as $r) {
            $tour->essentialTips()->create([
                'title' => ['en' => $r['en_title'], 'fr' => $r['fr_title']],
                'description' => ['en' => $r['en_desc'], 'fr' => $r['fr_desc']],
            ]);
        }
    }
}
