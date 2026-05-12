<?php

namespace Database\Seeders;

use App\Models\Expedition;
use App\Models\Peak;
use App\Models\Tour;
use App\Models\Trek;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class EssentialTipsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $everest_base_camp_trek_tips = [
            [
                'title' => [
                    'en' => 'Train Before You Trek',
                    'fr' => 'Entraînez-vous avant le trek',
                ],
                'description' => [
                    'en' => 'Prepare with cardio, strength training, and endurance hikes to handle the demanding terrain and altitude.',
                    'fr' => 'Préparez-vous avec du cardio, de la musculation et des randonnées d\'endurance pour gérer le terrain exigeant et l\'altitude.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Acclimatize Properly',
                    'fr' => 'Acclimatisez-vous correctement',
                ],
                'description' => [
                    'en' => 'Take rest days in Namche Bazaar and Dingboche to let your body adjust to the high altitude and prevent AMS.',
                    'fr' => 'Prenez des jours de repos à Namche Bazaar et Dingboche pour permettre à votre corps de s\'adapter à la haute altitude et prévenir le MAM.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Pack Smart, Pack Light',
                    'fr' => 'Emportez l\'essentiel, voyagez léger',
                ],
                'description' => [
                    'en' => 'Carry only the essentials—layered clothing, a warm sleeping bag, a water purification system, and high-energy snacks.',
                    'fr' => 'Ne portez que l\'essentiel: des vêtements en couches, un sac de couchage chaud, un système de purification de l\'eau et des collations énergétiques.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Stay Hydrated',
                    'fr' => 'Restez hydraté',
                ],
                'description' => [
                    'en' => 'Drink at least 3-4 liters of water per day to combat dehydration and altitude sickness.',
                    'fr' => 'Buvez au moins 3 à 4 litres d\'eau par jour pour lutter contre la déshydratation et le mal des montagnes.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Embrace the Trekking Culture',
                    'fr' => 'Adoptez la culture du trekking',
                ],
                'description' => [
                    'en' => 'Respect local customs, greet with "Namaste," and take time to connect with Sherpa guides and fellow trekkers.',
                    'fr' => 'Respectez les coutumes locales, saluez avec "Namaste" et prenez le temps de vous connecter avec les guides Sherpas et les autres trekkeurs.',
                ],
            ],
        ];
        $annapurna_base_camp_trek_tips = [
            [
                'title' => [
                    'en' => 'Choose the Right Season',
                    'fr' => 'Choisissez la bonne saison',
                ],
                'description' => [
                    'en' => 'Trek in spring (March-May) or autumn (September-November) for clear skies, moderate temperatures, and beautiful landscapes.',
                    'fr' => 'Faites du trek au printemps (mars-mai) ou en automne (septembre-novembre) pour un ciel dégagé, des températures modérées et de beaux paysages.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Pace Yourself on the Steep Trails',
                    'fr' => 'Allez à votre rythme sur les sentiers escarpés',
                ],
                'description' => [
                    'en' => 'Some sections, like the climb to Ulleri, are steep—take it slow and steady to conserve energy.',
                    'fr' => 'Certaines sections, comme la montée vers Ulleri, sont raides - allez-y lentement et régulièrement pour conserver de l\'énergie.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Pack for Varied Weather',
                    'fr' => 'Préparez-vous à un temps variable',
                ],
                'description' => [
                    'en' => 'The weather changes quickly—bring a rain jacket, sun hat, and warm layers for the high-altitude nights.',
                    'fr' => 'Le temps change rapidement - apportez une veste de pluie, un chapeau de soleil et des couches chaudes pour les nuits en haute altitude.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Bring Enough Cash',
                    'fr' => 'Apportez suffisamment d\'argent liquide',
                ],
                'description' => [
                    'en' => 'ATMs are scarce—carry enough cash for food, accommodation, and personal expenses along the trail.',
                    'fr' => 'Les distributeurs automatiques sont rares - ayez suffisamment d\'argent liquide pour la nourriture, l\'hébergement et les dépenses personnelles le long du sentier.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Respect the Local Culture',
                    'fr' => 'Respectez la culture locale',
                ],
                'description' => [
                    'en' => 'Annapurna is home to Gurung and Magar communities—learn a few Nepali phrases and enjoy their hospitality.',
                    'fr' => 'L\'Annapurna abrite les communautés Gurung et Magar - apprenez quelques phrases népalaises et profitez de leur hospitalité.',
                ],
            ],
        ];
        $lobuche_peak_climbing_tips = [
            [
                'title' => [
                    'en' => 'Gain Prior Trekking Experience',
                    'fr' => 'Acquérir une expérience préalable en trekking',
                ],
                'description' => [
                    'en' => 'Before attempting Lobuche Peak, complete treks like Everest Base Camp to build endurance and altitude tolerance.',
                    'fr' => 'Avant de tenter le Lobuche Peak, effectuez des treks comme le camp de base de l\'Everest pour développer l\'endurance et la tolérance à l\'altitude.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Learn Basic Mountaineering Skills',
                    'fr' => 'Apprendre les compétences de base en alpinisme',
                ],
                'description' => [
                    'en' => 'Practice using crampons, ice axes, and ropes before the climb to increase safety and confidence.',
                    'fr' => 'Entraînez-vous à utiliser des crampons, des piolets et des cordes avant l\'ascension pour augmenter la sécurité et la confiance.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Dress in High-Quality Gear',
                    'fr' => 'S\'habiller avec des équipements de haute qualité',
                ],
                'description' => [
                    'en' => 'Invest in proper mountaineering boots, down jackets, and gloves to withstand freezing summit conditions.',
                    'fr' => 'Investissez dans des chaussures d\'alpinisme, des doudounes et des gants appropriés pour résister aux conditions glaciales du sommet.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Listen to Your Guide',
                    'fr' => 'Écoutez votre guide',
                ],
                'description' => [
                    'en' => 'Guides have valuable experience—follow their instructions, especially in technical sections and summit pushes.',
                    'fr' => 'Les guides ont une expérience précieuse - suivez leurs instructions, en particulier dans les sections techniques et les poussées vers le sommet.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Prepare for Mental and Physical Challenges',
                    'fr' => 'Préparez-vous aux défis mentaux et physiques',
                ],
                'description' => [
                    'en' => 'The high-altitude climb is exhausting—stay positive, take one step at a time, and trust your preparation.',
                    'fr' => 'L\'ascension en haute altitude est épuisante - restez positif, faites un pas à la fois et faites confiance à votre préparation.',
                ],
            ],
        ];
        $everest_expedition_tips = [
            [
                'title' => [
                    'en' => 'Build Years of Climbing Experience',
                    'fr' => 'Acquérir des années d\'expérience en escalade',
                ],
                'description' => [
                    'en' => 'Everest is not for beginners—gain experience on peaks like Lobuche, Mera, or Aconcagua before attempting it.',
                    'fr' => 'L\'Everest n\'est pas pour les débutants - acquérez de l\'expérience sur des sommets comme le Lobuche, le Mera ou l\'Aconcagua avant de le tenter.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Choose a Reputable Expedition Company',
                    'fr' => 'Choisissez une entreprise d\'expédition réputée',
                ],
                'description' => [
                    'en' => 'Pick a team with experienced guides, strong Sherpa support, and a solid safety record for the best chances of success.',
                    'fr' => 'Choisissez une équipe avec des guides expérimentés, un soutien Sherpa solide et un bilan de sécurité solide pour les meilleures chances de succès.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Train for Extreme Endurance',
                    'fr' => 'Entraînez-vous pour une endurance extrême',
                ],
                'description' => [
                    'en' => 'Your body must be in peak condition—train with heavy packs, high-altitude hikes, and breathing exercises.',
                    'fr' => 'Votre corps doit être au sommet de sa forme - entraînez-vous avec des sacs lourds, des randonnées en haute altitude et des exercices de respiration.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Understand the Risks',
                    'fr' => 'Comprendre les risques',
                ],
                'description' => [
                    'en' => 'Everest is deadly—know about altitude sickness, frostbite, and weather hazards before committing to the climb.',
                    'fr' => 'L\'Everest est mortel - renseignez-vous sur le mal des montagnes, les engelures et les dangers météorologiques avant de vous engager dans l\'ascension.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Prepare for the Long Haul',
                    'fr' => 'Préparez-vous pour le long terme',
                ],
                'description' => [
                    'en' => 'An Everest expedition takes 6-8 weeks—mentally prepare for waiting, weather delays, and harsh conditions.',
                    'fr' => 'Une expédition à l\'Everest dure 6 à 8 semaines - préparez-vous mentalement à l\'attente, aux retards météorologiques et aux conditions difficiles.',
                ],
            ],
        ];
        $kathmandu_cultural_tour_tips = [
            [
                'title' => [
                    'en' => 'Dress Modestly for Temples',
                    'fr' => 'Habillez-vous modestement pour les temples',
                ],
                'description' => [
                    'en' => 'Cover shoulders and legs when visiting religious sites like Pashupatinath and Swayambhunath to show respect.',
                    'fr' => 'Couvrez vos épaules et vos jambes lorsque vous visitez des sites religieux comme Pashupatinath et Swayambhunath pour montrer du respect.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Learn Basic Nepali Phrases',
                    'fr' => 'Apprenez quelques phrases de base en népalais',
                ],
                'description' => [
                    'en' => 'A simple "Namaste" or "Dhanyabad" (thank you) goes a long way in connecting with locals.',
                    'fr' => 'Un simple "Namaste" ou "Dhanyabad" (merci) contribue grandement à établir un lien avec les habitants.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Be Mindful of Street Scams',
                    'fr' => 'Soyez attentif aux arnaques de rue',
                ],
                'description' => [
                    'en' => 'Avoid overly pushy vendors and fake tour guides—stick to well-reviewed experiences and licensed guides.',
                    'fr' => 'Évitez les vendeurs trop insistants et les faux guides touristiques - optez pour des expériences bien évaluées et des guides agréés.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Try Local Cuisine',
                    'fr' => 'Essayez la cuisine locale',
                ],
                'description' => [
                    'en' => 'Don’t miss out on momos, dal bhat, and Newari dishes like yomari and samay baji for an authentic taste of Nepal.',
                    'fr' => 'Ne manquez pas les momos, le dal bhat et les plats newari comme le yomari et le samay baji pour un goût authentique du Népal.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Respect the Local Pace of Life',
                    'fr' => 'Respectez le rythme de vie local',
                ],
                'description' => [
                    'en' => 'Kathmandu is chaotic yet spiritual—embrace the honking, street cows, and bustling markets as part of the experience.',
                    'fr' => 'Katmandou est chaotique mais spirituelle - acceptez les klaxons, les vaches dans les rues et les marchés animés comme faisant partie de l\'expérience.',
                ],
            ],
        ];
        $manaslu_circuit_trek_tips = [
            [
                'title' => [
                    'en' => 'Obtain the Right Permits',
                    'fr' => 'Obtenez les permis appropriés',
                ],
                'description' => [
                    'en' => 'You need the Manaslu Restricted Area Permit (RAP), Manaslu Conservation Area Permit (MCAP), and Annapurna Conservation Area Permit (ACAP).',
                    'fr' => 'Vous avez besoin du permis de zone restreinte de Manaslu (RAP), du permis de zone de conservation de Manaslu (MCAP) et du permis de zone de conservation de l\'Annapurna (ACAP).',
                ],
            ],
            [
                'title' => [
                    'en' => 'Trek with a Licensed Guide & in a Group',
                    'fr' => 'Faites du trek avec un guide agréé et en groupe',
                ],
                'description' => [
                    'en' => 'Independent trekking is not allowed; you must hire a licensed guide and trek with at least one other person.',
                    'fr' => 'Le trekking indépendant n\'est pas autorisé ; vous devez embaucher un guide agréé et faire du trek avec au moins une autre personne.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Train for High-Altitude Trekking',
                    'fr' => 'Entraînez-vous pour le trekking en haute altitude',
                ],
                'description' => [
                    'en' => 'The trek involves long ascents, steep descents, and high altitudes—prepare with endurance training and regular hikes.',
                    'fr' => 'Le trek implique de longues montées, des descentes raides et de hautes altitudes - préparez-vous avec un entraînement d\'endurance et des randonnées régulières.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Acclimatize Properly to Avoid Altitude Sickness',
                    'fr' => 'Acclimatisez-vous correctement pour éviter le mal des montagnes',
                ],
                'description' => [
                    'en' => 'Take rest days in Samagaon or Samdo before crossing Larkya La Pass to prevent Acute Mountain Sickness (AMS).',
                    'fr' => 'Prenez des jours de repos à Samagaon ou Samdo avant de traverser le col de Larkya La pour prévenir le mal aigu des montagnes (MAM).',
                ],
            ],
            [
                'title' => [
                    'en' => 'Pack Smart & Dress in Layers',
                    'fr' => 'Emportez l\'essentiel et habillez-vous en couches',
                ],
                'description' => [
                    'en' => 'Weather varies greatly; carry thermal layers, a down jacket, rain gear, and comfortable trekking shoes.',
                    'fr' => 'Le temps varie considérablement ; emportez des couches thermiques, une doudoune, un équipement de pluie et des chaussures de trekking confortables.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Start Early for Larkya La Pass',
                    'fr' => 'Partez tôt pour le col de Larkya La',
                ],
                'description' => [
                    'en' => 'The pass is long and challenging; start before dawn to avoid strong afternoon winds.',
                    'fr' => 'Le col est long et difficile ; partez avant l\'aube pour éviter les forts vents de l\'après-midi.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Carry Enough Cash',
                    'fr' => 'Apportez suffisamment d\'argent liquide',
                ],
                'description' => [
                    'en' => 'ATMs are not available beyond Soti Khola—bring enough cash for accommodation, food, and any extra expenses.',
                    'fr' => 'Il n\'y a pas de distributeurs automatiques au-delà de Soti Khola - apportez suffisamment d\'argent liquide pour l\'hébergement, la nourriture et toutes les dépenses supplémentaires.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Be Ready for Basic Accommodation & Limited Facilities',
                    'fr' => 'Soyez prêt pour un hébergement de base et des installations limitées',
                ],
                'description' => [
                    'en' => 'The trek is remote, and teahouses offer simple food and accommodation—bring a sleeping bag for extra warmth.',
                    'fr' => 'Le trek est éloigné et les maisons de thé offrent une nourriture et un hébergement simples - apportez un sac de couchage pour plus de chaleur.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Respect Local Culture & Traditions',
                    'fr' => 'Respectez la culture et les traditions locales',
                ],
                'description' => [
                    'en' => 'Manaslu is home to Tibetan-influenced communities; be respectful, ask before taking photos, and follow local customs.',
                    'fr' => 'Manaslu abrite des communautés d\'influence tibétaine ; soyez respectueux, demandez avant de prendre des photos et suivez les coutumes locales.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Bring a Good Pair of Trekking Poles',
                    'fr' => 'Apportez une bonne paire de bâtons de trekking',
                ],
                'description' => [
                    'en' => 'The rugged terrain, river crossings, and steep descents make trekking poles a valuable tool for stability and endurance.',
                    'fr' => 'Le terrain accidenté, les traversées de rivières et les descentes raides font des bâtons de trekking un outil précieux pour la stabilité et l\'endurance.',
                ],
            ],
        ];
        $langtang_tips = [
            [
                'title' => [
                    'en' => 'Permits',
                    'fr' => 'Permis',
                ],
                'description' => [
                    'en' => 'Obtain the necessary permits: Langtang National Park Permit (USD 30) and TIMS Card (USD 20). Booking a package often simplifies this process.',
                    'fr' => 'Obtenez les permis nécessaires : permis du parc national de Langtang (30 USD) et carte TIMS (20 USD). La réservation d’un forfait simplifie souvent ce processus.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Trek Difficulty',
                    'fr' => 'Difficulté du trek',
                ],
                'description' => [
                    'en' => 'This is a challenging trek due to high altitude (reaching 4,610m at Lauribina La pass), rugged terrain, and daily ascents and descents of around 6 hours. Prepare physically with regular exercise and hiking.',
                    'fr' => 'Il s’agit d’un trek difficile en raison de la haute altitude (atteignant 4 610 m au col de Lauribina La), du terrain accidenté et des montées et descentes quotidiennes d’environ 6 heures. Préparez-vous physiquement avec de l’exercice régulier et de la randonnée.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Altitude Sickness',
                    'fr' => 'Mal des montagnes',
                ],
                'description' => [
                    'en' => 'Acclimatization is crucial. Trek slowly, stay hydrated, avoid alcohol and smoking, and be aware of altitude sickness symptoms (headache, vomiting, difficulty breathing, etc.). Inform your guide immediately if you experience any symptoms.',
                    'fr' => 'L’acclimatation est cruciale. Faites du trek lentement, restez hydraté, évitez l’alcool et le tabac et soyez conscient des symptômes du mal des montagnes (maux de tête, vomissements, difficultés respiratoires, etc.). Informez immédiatement votre guide si vous ressentez des symptômes.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Best Time to Trek',
                    'fr' => 'Meilleure période pour le trek',
                ],
                'description' => [
                    'en' => 'Spring (March-May) and Autumn (late September-November) offer the most stable weather and moderate climate.',
                    'fr' => 'Le printemps (mars-mai) et l’automne (fin septembre-novembre) offrent le temps le plus stable et un climat modéré.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Travel Insurance',
                    'fr' => 'Assurance voyage',
                ],
                'description' => [
                    'en' => 'Essential for emergency helicopter evacuation and medical expenses due to the remote location. Ensure your policy covers high-altitude trekking.',
                    'fr' => 'Essentielle pour l’évacuation par hélicoptère d’urgence et les dépenses médicales en raison de l’éloignement du site. Assurez-vous que votre police couvre le trekking en haute altitude.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Accommodation and Food',
                    'fr' => 'Hébergement et nourriture',
                ],
                'description' => [
                    'en' => 'Expect basic guesthouse accommodations (twin sharing, shared toilets). Three meals a day are provided (Dal Bhat, Thukpa, Momo, Noodles are common), but pack extra snacks. Consider a single room for an additional cost if desired.',
                    'fr' => 'Attendez-vous à un hébergement de base dans des maisons d’hôtes (chambre double, toilettes communes). Trois repas par jour sont fournis (Dal Bhat, Thukpa, Momo, nouilles sont courants), mais emportez des collations supplémentaires. Envisagez une chambre individuelle moyennant un coût supplémentaire si vous le souhaitez.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Packing',
                    'fr' => 'Bagages',
                ],
                'description' => [
                    'en' => 'Pack light but in layers. Essentials include comfortable underwear, trekking clothes, base/thermal layers, windproof/waterproof jacket/pants, fleece/down jacket, gloves, socks, scarf, beanie, sun hat, trekking boots, casual shoes, duffel bag, daypack, trekking pole, map, water bottle, sleeping bag, toiletries, first aid kit, snacks, camera, charger, journal, cash, and documents.',
                    'fr' => 'Emportez des bagages légers mais en couches. L’essentiel comprend des sous-vêtements confortables, des vêtements de trekking, des couches de base/thermiques, une veste/un pantalon coupe-vent/imperméable, une veste en polaire/duvet, des gants, des chaussettes, une écharpe, un bonnet, un chapeau de soleil, des chaussures de trekking, des chaussures décontractées, un sac de voyage, un sac à dos, un bâton de trekking, une carte, une bouteille d’eau, un sac de couchage, des articles de toilette, une trousse de premiers secours, des collations, un appareil photo, un chargeur, un journal, de l’argent liquide et des documents.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Physical Preparation',
                    'fr' => 'Préparation physique',
                ],
                'description' => [
                    'en' => 'Improve stamina, strength, and endurance through regular exercise, including strength training, aerobic exercises (swimming, cycling, running), and hiking. Practice breathing techniques.',
                    'fr' => 'Améliorez votre endurance, votre force et votre résistance grâce à un exercice régulier, notamment la musculation, les exercices aérobiques (natation, cyclisme, course à pied) et la randonnée. Pratiquez des techniques de respiration.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Respect Local Culture',
                    'fr' => 'Respectez la culture locale',
                ],
                'description' => [
                    'en' => 'Be mindful of local customs and traditions. Ask before taking photos and show respect for the Tamang and Sherpa communities.',
                    'fr' => 'Soyez attentif aux coutumes et traditions locales. Demandez avant de prendre des photos et montrez du respect pour les communautés Tamang et Sherpa.',
                ],
            ],
        ];
        $kanchanjunga_exped_essential_tips = [
            [
                'title' => [
                    'en' => 'Prior Mountaineering Experience',
                    'fr' => 'Expérience préalable en alpinisme',
                ],
                'description' => [
                    'en' => 'Kanchenjunga is a serious undertaking. You must have prior experience climbing 8000m peaks.',
                    'fr' => 'Le Kangchenjunga est une entreprise sérieuse. Vous devez avoir une expérience préalable en escalade de sommets de 8 000 m.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Physical Fitness',
                    'fr' => 'Condition physique',
                ],
                'description' => [
                    'en' => 'Be in excellent physical condition, with rigorous training and endurance.',
                    'fr' => 'Soyez en excellente condition physique, avec un entraînement rigoureux et de l’endurance.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Proper Gear',
                    'fr' => 'Équipement approprié',
                ],
                'description' => [
                    'en' => 'Invest in high-quality mountaineering gear suitable for extreme conditions.',
                    'fr' => 'Investissez dans un équipement d’alpinisme de haute qualité adapté aux conditions extrêmes.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Acclimatization',
                    'fr' => 'Acclimatation',
                ],
                'description' => [
                    'en' => 'Understand the importance of acclimatization and follow the expedition\'s plan carefully.',
                    'fr' => 'Comprenez l’importance de l’acclimatation et suivez attentivement le plan de l’expédition.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Mental Preparation',
                    'fr' => 'Préparation mentale',
                ],
                'description' => [
                    'en' => 'A strong mental attitude is essential for overcoming challenges and pushing through difficult moments.',
                    'fr' => 'Une attitude mentale forte est essentielle pour surmonter les défis et traverser les moments difficiles.',
                ],
            ],
        ];
        $eight_thousanders_expedition_tips = [
            [
                'title' => [
                    'en' => 'Elite Mountaineering Experience',
                    'fr' => 'Expérience en alpinisme d\'élite',
                ],
                'description' => [
                    'en' => 'Climbing 8000-meter peaks is the pinnacle of mountaineering.  You must have extensive experience on multiple 7000m peaks and a proven track record of high-altitude success.  Consider this the "doctorate" level of mountaineering.',
                    'fr' => 'L\'ascension de sommets de 8 000 mètres est le summum de l\'alpinisme. Vous devez avoir une vaste expérience sur plusieurs sommets de 7 000 mètres et des antécédents de succès en haute altitude. Considérez cela comme le niveau de "doctorat" de l\'alpinisme.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Exceptional Physical and Mental Fortitude',
                    'fr' => 'Force physique et mentale exceptionnelle',
                ],
                'description' => [
                    'en' => '8000m expeditions push the human body and mind to their limits.  Prepare for extreme cold, low oxygen, and grueling physical exertion.  Mental resilience, determination, and the ability to endure suffering are essential.',
                    'fr' => 'Les expéditions de 8 000 m poussent le corps et l\'esprit humains à leurs limites. Préparez-vous à un froid extrême, à un faible taux d\'oxygène et à un effort physique exténuant. La résilience mentale, la détermination et la capacité à endurer la souffrance sont essentielles.',
                ],
            ],
            [
                'title' => [
                    'en' => 'World-Class Expedition Team',
                    'fr' => 'Équipe d\'expédition de classe mondiale',
                ],
                'description' => [
                    'en' => 'Select an expedition operator with impeccable credentials, highly experienced guides, and a strong Sherpa support team.  Your life depends on their expertise and judgment.',
                    'fr' => 'Choisissez un opérateur d\'expédition avec des références impeccables, des guides très expérimentés et une solide équipe de soutien Sherpa. Votre vie dépend de leur expertise et de leur jugement.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Meticulous Preparation and Planning',
                    'fr' => 'Préparation et planification méticuleuses',
                ],
                'description' => [
                    'en' => 'Every detail matters.  Train specifically for the challenges of the chosen peak.  Research weather patterns, route conditions, and potential hazards.  Leave no room for error in your gear selection or logistics.',
                    'fr' => 'Chaque détail compte. Entraînez-vous spécifiquement pour les défis du sommet choisi. Renseignez-vous sur les conditions météorologiques, l\'état des itinéraires et les dangers potentiels. Ne laissez aucune place à l\'erreur dans le choix de votre équipement ou dans la logistique.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Embrace the Death Zone',
                    'fr' => 'Adopter la zone de la mort',
                ],
                'description' => [
                    'en' => 'Above 8000 meters, you enter the "Death Zone" where the human body cannot survive indefinitely.  Be prepared for the psychological and physiological effects of extreme altitude.  Supplemental oxygen is typically used.',
                    'fr' => 'Au-dessus de 8 000 mètres, vous entrez dans la "zone de la mort" où le corps humain ne peut survivre indéfiniment. Soyez prêt à affronter les effets psychologiques et physiologiques de l\'altitude extrême. L\'oxygène supplémentaire est généralement utilisé.',
                ],
            ],
        ];
        $seven_thousanders_expedition_tips = [
            [
                'title' => [
                    'en' => 'Extensive High-Altitude Experience',
                    'fr' => 'Vaste expérience en haute altitude',
                ],
                'description' => [
                    'en' => 'Climbing 7000+ meter peaks requires significant prior experience on lower 6000m peaks and preferably some 8000m experience.  This builds the necessary acclimatization knowledge and technical skills.',
                    'fr' => 'L\'ascension de sommets de plus de 7 000 mètres exige une vaste expérience préalable sur des sommets de 6 000 mètres inférieurs et, de préférence, une certaine expérience de 8 000 mètres. Cela permet d\'acquérir les connaissances nécessaires en matière d\'acclimatation et les compétences techniques.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Advanced Mountaineering Skills',
                    'fr' => 'Compétences avancées en alpinisme',
                ],
                'description' => [
                    'en' => 'Master advanced techniques in ice climbing, rock climbing, mixed climbing, and crevasse rescue.  Be proficient with using crampons, ice axes, ropes, and other technical equipment.',
                    'fr' => 'Maîtrisez les techniques avancées en escalade sur glace, en escalade rocheuse, en escalade mixte et en sauvetage en crevasse. Maîtrisez l\'utilisation des crampons, des piolets, des cordes et d\'autres équipements techniques.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Rigorous Physical Conditioning',
                    'fr' => 'Conditionnement physique rigoureux',
                ],
                'description' => [
                    'en' => '7000+ meter peaks demand exceptional physical fitness.  Engage in intense training focused on endurance, strength, and cardiovascular fitness, including training at altitude if possible.',
                    'fr' => 'Les sommets de plus de 7 000 mètres exigent une condition physique exceptionnelle. Participez à un entraînement intense axé sur l\'endurance, la force et la capacité cardiovasculaire, y compris un entraînement en altitude si possible.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Comprehensive Acclimatization Strategy',
                    'fr' => 'Stratégie d\'acclimatation complète',
                ],
                'description' => [
                    'en' => 'Develop a detailed acclimatization plan with your expedition team.  Understand the signs and symptoms of altitude sickness and be prepared to descend if necessary.  Supplemental oxygen may be considered.',
                    'fr' => 'Élaborez un plan d\'acclimatation détaillé avec votre équipe d\'expédition. Comprenez les signes et les symptômes du mal des montagnes et soyez prêt à descendre si nécessaire. L\'oxygène supplémentaire peut être envisagé.',
                ],
            ],
            [
                'title' => [
                    'en' => 'High-Quality Gear and Equipment',
                    'fr' => 'Équipement de haute qualité',
                ],
                'description' => [
                    'en' => 'Invest in the best quality mountaineering gear you can afford.  Ensure it is appropriate for the specific conditions of the mountain you are climbing.  Test all gear before the expedition.',
                    'fr' => 'Investissez dans l\'équipement d\'alpinisme de la meilleure qualité que vous pouvez vous permettre. Assurez-vous qu\'il est adapté aux conditions spécifiques de la montagne que vous escaladez. Testez tout l\'équipement avant l\'expédition.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Experienced Expedition Team',
                    'fr' => 'Équipe d\'expédition expérimentée',
                ],
                'description' => [
                    'en' => 'Choose a reputable expedition company with experienced guides and Sherpas who have successfully summited the peak.  A strong and cohesive team is crucial for safety and success.',
                    'fr' => 'Choisissez une entreprise d\'expédition réputée avec des guides et des Sherpas expérimentés qui ont gravi avec succès le sommet. Une équipe soudée et solide est cruciale pour la sécurité et le succès.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Contingency Planning',
                    'fr' => 'Planification des imprévus',
                ],
                'description' => [
                    'en' => 'Be prepared for unexpected challenges such as bad weather, injuries, or logistical problems.  Have backup plans in place and be flexible with your summit plans.',
                    'fr' => 'Soyez prêt à faire face à des défis inattendus tels que le mauvais temps, les blessures ou les problèmes logistiques. Prévoyez des plans de secours et soyez flexible quant à vos plans de sommet.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Respect for the Mountain',
                    'fr' => 'Respect de la montagne',
                ],
                'description' => [
                    'en' => '7000+ meter peaks are inherently dangerous.  Respect the power of nature and be prepared to turn back if conditions are unfavorable.  The summit is never worth risking your life.',
                    'fr' => 'Les sommets de plus de 7 000 mètres sont intrinsèquement dangereux. Respectez le pouvoir de la nature et soyez prêt à faire demi-tour si les conditions sont défavorables. Le sommet ne vaut jamais la peine de risquer votre vie.',
                ],
            ],
        ];
        $six_thousanders_expedition_tips = [
            [
                'title' => [
                    'en' => 'Solid Mountaineering Foundation',
                    'fr' => 'Solide base en alpinisme',
                ],
                'description' => [
                    'en' => '6000-meter peaks are a great stepping stone to higher altitudes. You should have prior experience in trekking and basic mountaineering skills, including using crampons, ice axes, and ropes.',
                    'fr' => 'Les sommets de 6 000 mètres sont un excellent tremplin vers des altitudes plus élevées. Vous devez avoir une expérience préalable en trekking et des compétences de base en alpinisme, notamment l\'utilisation de crampons, de piolets et de cordes.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Good Physical Fitness',
                    'fr' => 'Bonne condition physique',
                ],
                'description' => [
                    'en' => 'While not as demanding as 8000-meter peaks, 6000ers still require a good level of fitness. Train with cardio, strength training, and hiking, ideally at altitude if possible.',
                    'fr' => 'Bien que moins exigeants que les sommets de 8 000 mètres, les sommets de 6 000 mètres exigent toujours un bon niveau de forme physique. Entraînez-vous avec du cardio, de la musculation et de la randonnée, idéalement en altitude si possible.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Acclimatization Strategy',
                    'fr' => 'Stratégie d\'acclimatation',
                ],
                'description' => [
                    'en' => 'Proper acclimatization is essential. Ascend gradually, include rest days, and be aware of altitude sickness symptoms. Descend if necessary.',
                    'fr' => 'Une bonne acclimatation est essentielle. Montez progressivement, incluez des jours de repos et soyez conscient des symptômes du mal des montagnes. Descendez si nécessaire.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Appropriate Gear',
                    'fr' => 'Équipement approprié',
                ],
                'description' => [
                    'en' => 'Use reliable mountaineering gear suitable for the conditions. This includes warm layers, a good sleeping bag, sturdy boots, and necessary safety equipment.',
                    'fr' => 'Utilisez un équipement d\'alpinisme fiable et adapté aux conditions. Cela comprend des couches chaudes, un bon sac de couchage, des bottes robustes et l\'équipement de sécurité nécessaire.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Experienced Guide',
                    'fr' => 'Guide expérimenté',
                ],
                'description' => [
                    'en' => 'It\'s highly recommended to hire an experienced guide, especially if you are new to mountaineering. They can provide valuable guidance and ensure your safety.',
                    'fr' => 'Il est fortement recommandé d\'engager un guide expérimenté, surtout si vous débutez en alpinisme. Il peut vous fournir des conseils précieux et assurer votre sécurité.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Weather Awareness',
                    'fr' => 'Connaissance de la météo',
                ],
                'description' => [
                    'en' => 'Monitor weather forecasts and be prepared to adjust your plans accordingly. Mountain weather can change rapidly.',
                    'fr' => 'Surveillez les prévisions météorologiques et soyez prêt à adapter vos plans en conséquence. Le temps en montagne peut changer rapidement.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Teamwork and Communication',
                    'fr' => 'Travail d\'équipe et communication',
                ],
                'description' => [
                    'en' => 'Good communication and teamwork are crucial for safety and success. Stay in contact with your team and guide.',
                    'fr' => 'Une bonne communication et un bon travail d\'équipe sont essentiels pour la sécurité et le succès. Restez en contact avec votre équipe et votre guide.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Respect the Mountain',
                    'fr' => 'Respectez la montagne',
                ],
                'description' => [
                    'en' => 'Mountains are unpredictable. Be prepared to turn back if conditions are unfavorable.  The summit is not worth risking your life.',
                    'fr' => 'Les montagnes sont imprévisibles. Soyez prêt à faire demi-tour si les conditions sont défavorables. Le sommet ne vaut pas la peine de risquer votre vie.',
                ],
            ],
        ];
        $base_camp_trekking_tips = [
            [
                'title' => [
                    'en' => 'Prepare Physically',
                    'fr' => 'Préparez-vous physiquement',
                ],
                'description' => [
                    'en' => 'Base camp treks involve long days of hiking at altitude.  Train beforehand with cardio, strength training, and hiking, ideally with a weighted pack.',
                    'fr' => 'Les treks de camp de base impliquent de longues journées de randonnée en altitude. Entraînez-vous au préalable avec du cardio, de la musculation et de la randonnée, idéalement avec un sac à dos lesté.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Acclimatize Gradually',
                    'fr' => 'Acclimatisez-vous progressivement',
                ],
                'description' => [
                    'en' => 'Ascend slowly to allow your body to adjust to the altitude.  Rest days are crucial.  Listen to your body and descend if you experience altitude sickness symptoms.',
                    'fr' => 'Montez lentement pour permettre à votre corps de s\'adapter à l\'altitude. Les jours de repos sont cruciaux. Écoutez votre corps et descendez si vous ressentez des symptômes du mal des montagnes.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Pack Appropriately',
                    'fr' => 'Préparez vos bagages de manière appropriée',
                ],
                'description' => [
                    'en' => 'Pack layers of clothing for varying temperatures.  Include a good quality sleeping bag, rain gear, sturdy hiking boots, and essentials like sunscreen, a hat, and sunglasses.',
                    'fr' => 'Emportez des couches de vêtements pour les différentes températures. Incluez un sac de couchage de bonne qualité, un équipement de pluie, des chaussures de randonnée robustes et des essentiels comme de la crème solaire, un chapeau et des lunettes de soleil.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Stay Hydrated and Eat Well',
                    'fr' => 'Restez hydraté et mangez bien',
                ],
                'description' => [
                    'en' => 'Drink plenty of water (3-4 liters per day) and eat nutritious meals to fuel your body.  Carry snacks for energy between meals.',
                    'fr' => 'Buvez beaucoup d\'eau (3 à 4 litres par jour) et mangez des repas nutritifs pour alimenter votre corps. Emportez des collations pour avoir de l\'énergie entre les repas.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Respect Local Culture',
                    'fr' => 'Respectez la culture locale',
                ],
                'description' => [
                    'en' => 'Be mindful of local customs and traditions.  Dress modestly, ask permission before taking photos, and interact respectfully with locals.',
                    'fr' => 'Soyez attentif aux coutumes et traditions locales. Habillez-vous modestement, demandez la permission avant de prendre des photos et interagissez respectueusement avec les habitants.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Be Prepared for Basic Amenities',
                    'fr' => 'Soyez prêt pour des commodités de base',
                ],
                'description' => [
                    'en' => 'Teahouses and lodges along the trail offer basic accommodation and food.  Electricity and hot water may be limited or unavailable.',
                    'fr' => 'Les maisons de thé et les lodges le long du sentier offrent un hébergement et une nourriture de base. L\'électricité et l\'eau chaude peuvent être limitées ou indisponibles.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Hire a Guide and Porter (Optional)',
                    'fr' => 'Engagez un guide et un porteur (facultatif)',
                ],
                'description' => [
                    'en' => 'Hiring a guide enhances your safety and provides valuable insights into the local culture and environment. Porters can carry your heavy gear, making the trek more enjoyable.',
                    'fr' => 'Engager un guide améliore votre sécurité et fournit des informations précieuses sur la culture et l\'environnement locaux. Les porteurs peuvent transporter votre équipement lourd, ce qui rend le trek plus agréable.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Enjoy the Journey',
                    'fr' => 'Profitez du voyage',
                ],
                'description' => [
                    'en' => 'Base camp treks offer stunning scenery and a unique cultural experience. Take your time, savor the views, and connect with fellow trekkers and locals.',
                    'fr' => 'Les treks de camp de base offrent des paysages époustouflants et une expérience culturelle unique. Prenez votre temps, savourez les vues et connectez-vous avec les autres trekkeurs et les habitants.',
                ],
            ],
        ];
        $general_expedition_tips = [
            [
                'title' => [
                    'en' => 'Thorough Planning and Preparation',
                    'fr' => 'Planification et préparation approfondies',
                ],
                'description' => [
                    'en' => 'Research your destination extensively.  Understand the terrain, climate, potential hazards, and logistical requirements.  Create a detailed itinerary and contingency plans.',
                    'fr' => 'Faites des recherches approfondies sur votre destination. Comprenez le terrain, le climat, les dangers potentiels et les exigences logistiques. Créez un itinéraire détaillé et des plans d\'urgence.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Physical Fitness and Conditioning',
                    'fr' => 'Condition physique',
                ],
                'description' => [
                    'en' => 'Expeditions demand physical exertion.  Train appropriately with cardio, strength training, and activities specific to your expedition (e.g., hiking, climbing, paddling).',
                    'fr' => 'Les expéditions exigent un effort physique. Entraînez-vous de manière appropriée avec du cardio, de la musculation et des activités spécifiques à votre expédition (par exemple, randonnée, escalade, canotage).',
                ],
            ],
            [
                'title' => [
                    'en' => 'Essential Gear and Equipment',
                    'fr' => 'Équipement essentiel',
                ],
                'description' => [
                    'en' => 'Pack reliable and appropriate gear for your expedition.  This includes clothing, footwear, navigation tools, safety equipment, first-aid kit, and any specialized equipment required.',
                    'fr' => 'Emportez un équipement fiable et approprié pour votre expédition. Cela comprend les vêtements, les chaussures, les outils de navigation, l\'équipement de sécurité, une trousse de premiers secours et tout équipement spécialisé requis.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Navigation and Route Finding',
                    'fr' => 'Navigation et recherche d\'itinéraire',
                ],
                'description' => [
                    'en' => 'Develop strong navigation skills.  Use maps, compass, GPS, and other tools to plan your route and stay on course.  Be aware of potential hazards and changing conditions.',
                    'fr' => 'Développez de solides compétences en navigation. Utilisez des cartes, une boussole, un GPS et d\'autres outils pour planifier votre itinéraire et rester sur la bonne voie. Soyez conscient des dangers potentiels et des conditions changeantes.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Safety and Risk Management',
                    'fr' => 'Sécurité et gestion des risques',
                ],
                'description' => [
                    'en' => 'Prioritize safety.  Identify potential risks and develop mitigation strategies.  Carry a first-aid kit and know how to use it.  Communicate your plans with someone and have a way to contact them in emergencies.',
                    'fr' => 'Privilégiez la sécurité. Identifiez les risques potentiels et élaborez des stratégies d\'atténuation. Emportez une trousse de premiers secours et sachez l\'utiliser. Communiquez vos plans à quelqu\'un et ayez un moyen de le contacter en cas d\'urgence.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Nutrition and Hydration',
                    'fr' => 'Nutrition et hydratation',
                ],
                'description' => [
                    'en' => 'Maintain a healthy diet and stay well-hydrated.  Pack enough food and water for the duration of your expedition, plus some extra for emergencies.',
                    'fr' => 'Maintenez une alimentation saine et restez bien hydraté. Emportez suffisamment de nourriture et d\'eau pour la durée de votre expédition, ainsi qu\'un peu plus pour les urgences.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Leave No Trace Principles',
                    'fr' => 'Principes du sans trace',
                ],
                'description' => [
                    'en' => 'Minimize your impact on the environment.  Pack out all trash, stay on designated trails, and respect wildlife and natural resources.',
                    'fr' => 'Minimisez votre impact sur l\'environnement. Emportez tous vos déchets, restez sur les sentiers désignés et respectez la faune et les ressources naturelles.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Respect Local Culture and Customs',
                    'fr' => 'Respectez la culture et les coutumes locales',
                ],
                'description' => [
                    'en' => 'Be mindful of local customs and traditions.  Dress appropriately, ask permission before taking photos, and interact respectfully with local communities.',
                    'fr' => 'Soyez attentif aux coutumes et traditions locales. Habillez-vous de manière appropriée, demandez la permission avant de prendre des photos et interagissez respectueusement avec les communautés locales.',
                ],
            ],
        ];
        $vip_tips = [
            [
                'title' => [
                    'en' => 'Book Well in Advance',
                    'fr' => 'Réservez Bien à l\'Avance',
                ],
                'description' => [
                    'en' => 'For the best accommodations, guides, and availability, especially during peak season, it\'s crucial to book your VIP experience well in advance.',
                    'fr' => 'Pour les meilleurs hébergements, guides et disponibilités, surtout en haute saison, il est crucial de réserver votre expérience VIP bien à l\'avance.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Communicate Your Preferences',
                    'fr' => 'Communiquez Vos Préférences',
                ],
                'description' => [
                    'en' => 'Share your interests, desired level of activity, dietary restrictions, and any other specific needs with your travel planner.  The more information you provide, the more personalized and perfect your trip will be.',
                    'fr' => 'Partagez vos intérêts, le niveau d\'activité souhaité, vos restrictions alimentaires et tout autre besoin spécifique avec votre planificateur de voyage. Plus vous fournirez d\'informations, plus votre voyage sera personnalisé et parfait.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Consider Travel Insurance',
                    'fr' => 'Envisagez une Assurance Voyage',
                ],
                'description' => [
                    'en' => 'Comprehensive travel insurance is essential for any trip, but especially for VIP experiences that may involve higher costs or more complex logistics. Ensure your policy covers trip cancellations, medical emergencies, and other unforeseen circumstances.',
                    'fr' => 'Une assurance voyage complète est essentielle pour tout voyage, mais surtout pour les expériences VIP qui peuvent impliquer des coûts plus élevés ou une logistique plus complexe. Assurez-vous que votre police couvre les annulations de voyage, les urgences médicales et d\'autres circonstances imprévues.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Pack Appropriately but Lightly',
                    'fr' => 'Préparez-vous de Manière Appropriée mais Légère',
                ],
                'description' => [
                    'en' => 'While luxury accommodations will likely provide many amenities, pack essential items for your activities (trekking gear, appropriate clothing, etc.).  However, consider packing lightly to make transfers and porter services easier.',
                    'fr' => 'Bien que les hébergements de luxe fournissent probablement de nombreux équipements, emballez les articles essentiels pour vos activités (équipement de trekking, vêtements appropriés, etc.). Cependant, pensez à voyager léger pour faciliter les transferts et les services de porteurs.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Respect Local Customs and Traditions',
                    'fr' => 'Respectez les Coutumes et Traditions Locales',
                ],
                'description' => [
                    'en' => 'Even on VIP tours, it\'s important to be respectful of local customs and traditions. Dress modestly when visiting religious sites, ask permission before taking photos of people, and be mindful of local etiquette.',
                    'fr' => 'Même lors de visites VIP, il est important de respecter les coutumes et traditions locales. Habillez-vous modestement lorsque vous visitez des sites religieux, demandez la permission avant de prendre des photos de personnes et soyez attentif à l\'étiquette locale.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Confirm All Details',
                    'fr' => 'Confirmez Tous les Détails',
                ],
                'description' => [
                    'en' => 'Before your trip, double-check all bookings, itineraries, and arrangements with your travel planner. Confirm flight times, accommodation details, and any special requests to avoid any last-minute surprises.',
                    'fr' => 'Avant votre voyage, vérifiez toutes les réservations, les itinéraires et les arrangements avec votre planificateur de voyage. Confirmez les heures de vol, les détails de l\'hébergement et toute demande spéciale pour éviter toute surprise de dernière minute.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Stay Connected (When Possible)',
                    'fr' => 'Restez Connecté (Lorsque Possible)',
                ],
                'description' => [
                    'en' => 'Depending on your itinerary, connectivity might be limited in certain areas.  If possible, consider a local SIM card or satellite communication device for emergencies or to stay in touch with your travel planner.',
                    'fr' => 'Selon votre itinéraire, la connectivité peut être limitée dans certaines zones. Si possible, envisagez une carte SIM locale ou un appareil de communication par satellite en cas d\'urgence ou pour rester en contact avec votre planificateur de voyage.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Be Prepared for Altitude (If Applicable)',
                    'fr' => 'Soyez Préparé à l\'Altitude (Si Applicable)',
                ],
                'description' => [
                    'en' => 'Even on luxury treks or climbs, altitude can be a factor. Discuss acclimatization plans with your guide and be aware of the signs of altitude sickness.',
                    'fr' => 'Même lors de treks ou d\'ascensions de luxe, l\'altitude peut être un facteur. Discutez des plans d\'acclimatation avec votre guide et soyez conscient des signes du mal d\'altitude.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Relax and Enjoy!',
                    'fr' => 'Détendez-vous et Profitez!',
                ],
                'description' => [
                    'en' => 'Most importantly, relax and enjoy the incredible experience! You\'re on a VIP trip, so let the expert team take care of the details and savor every moment of your journey.',
                    'fr' => 'Plus important encore, détendez-vous et profitez de cette incroyable expérience ! Vous êtes en voyage VIP, alors laissez l\'équipe d\'experts s\'occuper des détails et savourez chaque instant de votre voyage.',
                ],
            ],
        ];

        $service = [
            [
                'title' => [
                    'en' => 'Learn Basic Nepali Phrases',
                    'fr' => 'Apprenez quelques phrases de base en népalais',
                ],
                'description' => [
                    'en' => 'A simple "Namaste" or "Dhanyabad" (thank you) goes a long way in connecting with locals.',
                    'fr' => 'Un simple "Namaste" ou "Dhanyabad" (merci) contribue grandement à établir un lien avec les habitants.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Be Mindful of Street Scams',
                    'fr' => 'Soyez attentif aux arnaques de rue',
                ],
                'description' => [
                    'en' => 'Avoid overly pushy vendors and fake tour guides—stick to well-reviewed experiences and licensed guides.',
                    'fr' => 'Évitez les vendeurs trop insistants et les faux guides touristiques - optez pour des expériences bien évaluées et des guides agréés.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Respect the Local Pace of Life',
                    'fr' => 'Respectez le rythme de vie local',
                ],
                'description' => [
                    'en' => 'Kathmandu is chaotic yet spiritual—embrace the honking, street cows, and bustling markets as part of the experience.',
                    'fr' => 'Katmandou est chaotique mais spirituelle - acceptez les klaxons, les vaches dans les rues et les marchés animés comme faisant partie de l\'expérience.',
                ],
            ],
        ];
        $ultimate_photography = [
            [
                'title' => [
                    'en' => 'Pack Extra Batteries',
                    'fr' => 'Apportez des batteries supplémentaires',
                ],
                'description' => [
                    'en' => 'Cold altitudes drain batteries fast—bring spares for uninterrupted shooting.',
                    'fr' => 'Les hautes altitudes froides épuisent rapidement les batteries—apportez des rechanges pour des prises de vue continues.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Use a Wide-Angle Lens',
                    'fr' => 'Utilisez un objectif grand-angle',
                ],
                'description' => [
                    'en' => 'Capture Nepal’s vast landscapes, from mountains to terraced fields.',
                    'fr' => 'Saisissez les vastes paysages du Népal, des montagnes aux champs en terrasses.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Shoot During Golden Hours',
                    'fr' => 'Photographiez pendant les heures dorées',
                ],
                'description' => [
                    'en' => 'Sunrise and sunset offer the best light for dramatic photos.',
                    'fr' => 'Le lever et le coucher du soleil offrent la meilleure lumière pour des photos dramatiques.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Ask Permission for Portraits',
                    'fr' => 'Demandez la permission pour les portraits',
                ],
                'description' => [
                    'en' => 'Respect locals, especially in religious sites, by asking before photographing.',
                    'fr' => 'Respectez les habitants, surtout dans les lieux religieux, en demandant avant de photographier.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Bring a Telephoto Lens',
                    'fr' => 'Apportez un téléobjectif',
                ],
                'description' => [
                    'en' => 'Essential for wildlife shots like tigers and distant peaks.',
                    'fr' => 'Essentiel pour les photos d’animaux sauvages comme les tigres et les sommets éloignés.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Be Patient with Wildlife',
                    'fr' => 'Soyez patient avec la faune',
                ],
                'description' => [
                    'en' => 'Wait quietly for the perfect moment—animals like tigers are elusive.',
                    'fr' => 'Attendez calmement le moment parfait—les animaux comme les tigres sont insaisissables.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Protect Gear from Weather',
                    'fr' => 'Protégez votre matériel du climat',
                ],
                'description' => [
                    'en' => 'Use rain covers and silica gel for rain, dust, and humidity.',
                    'fr' => 'Utilisez des housses imperméables et du gel de silice pour la pluie, la poussière et l’humidité.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Learn Basic Nepali',
                    'fr' => 'Apprenez le népalais de base',
                ],
                'description' => [
                    'en' => '“Namaste” helps connect with locals for better portraits.',
                    'fr' => '“Namaste” aide à établir un lien avec les habitants pour de meilleurs portraits.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Plan for Festivals',
                    'fr' => 'Planifiez pour les festivals',
                ],
                'description' => [
                    'en' => 'Time your trip for Dashain or Holi for vibrant cultural shots.',
                    'fr' => 'Planifiez votre voyage pour Dashain ou Holi pour des photos culturelles vibrantes.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Respect Nature and Culture',
                    'fr' => 'Respectez la nature et la culture',
                ],
                'description' => [
                    'en' => 'Stay on trails and avoid disturbing wildlife or sacred sites.',
                    'fr' => 'Restez sur les sentiers et évitez de perturber la faune ou les sites sacrés.',
                ],
            ],
        ];


        $this->createEssentialTips(
            Trek::first(),
            $everest_base_camp_trek_tips
        );
        $this->createEssentialTips(
            Trek::find(2),
            $annapurna_base_camp_trek_tips
        );
        $this->createEssentialTips(
            Trek::find(3),
            $manaslu_circuit_trek_tips
        );
        $this->createEssentialTips(
            Trek::find(4),
            $langtang_tips
        );
        $this->createEssentialTips(
            Trek::find(5),
            $everest_base_camp_trek_tips
        );
        $this->createEssentialTips(
            Trek::find(6),
            $everest_base_camp_trek_tips
        );
        $this->createEssentialTips(
            Trek::find(7),
            $everest_base_camp_trek_tips
        );
        $this->createEssentialTips(
            Trek::find(8),
            $everest_base_camp_trek_tips
        );
        $this->createEssentialTips(
            Trek::find(9),
            $annapurna_base_camp_trek_tips
        );
        $this->createEssentialTips(
            Trek::find(10),
            $annapurna_base_camp_trek_tips
        );
        $this->createEssentialTips(
            Trek::find(11),
            $manaslu_circuit_trek_tips
        );
        $this->createEssentialTips(
            Trek::find(12),
            $langtang_tips
        );
        $this->createEssentialTips(
            Trek::find(13),
            $langtang_tips
        );
        $this->createEssentialTips(
            Trek::find(14),
            $langtang_tips
        );
        $this->createEssentialTips(
            Trek::find(15),
            $annapurna_base_camp_trek_tips
        );
        $this->createEssentialTips(
            Trek::find(16),
            $annapurna_base_camp_trek_tips
        );
        $this->createEssentialTips(
            Trek::find(17),
            $manaslu_circuit_trek_tips
        );
        $this->createEssentialTips(
            Trek::find(18),
            $langtang_tips
        );
        $this->createEssentialTips(
            Trek::find(19),
            $langtang_tips
        );
        $this->createEssentialTips(
            Trek::find(20),
            $langtang_tips
        );
        $this->createEssentialTips(
            Trek::find(21),
            $langtang_tips
        );
        $this->createEssentialTips(
            Trek::find(22),
            $langtang_tips
        );
        $this->createEssentialTips(
            Trek::find(23),
            $langtang_tips
        );


        $this->createEssentialTips(
            Expedition::first(),
            $everest_expedition_tips
        );
        $this->createEssentialTips(
            Expedition::find(2),
            $everest_expedition_tips
        );
        $this->createEssentialTips(
            Expedition::find(3),
            $eight_thousanders_expedition_tips
        );
        $this->createEssentialTips(
            Expedition::find(4),
            $kanchanjunga_exped_essential_tips
        );
        $this->createEssentialTips(
            Expedition::find(5),
            $eight_thousanders_expedition_tips
        );
        $this->createEssentialTips(
            Expedition::find(6),
            $eight_thousanders_expedition_tips
        );
        $this->createEssentialTips(
            Expedition::find(7),
            $eight_thousanders_expedition_tips
        );
        $this->createEssentialTips(
            Expedition::find(8),
            $eight_thousanders_expedition_tips
        );
        $this->createEssentialTips(
            Expedition::find(9),
            $eight_thousanders_expedition_tips
        );
        $this->createEssentialTips(
            Expedition::find(10),
            $eight_thousanders_expedition_tips
        );
        $this->createEssentialTips(
            Expedition::find(11),
            $eight_thousanders_expedition_tips
        );
        $this->createEssentialTips(
            Expedition::find(12),
            $eight_thousanders_expedition_tips
        );
        $this->createEssentialTips(
            Expedition::find(13),
            $eight_thousanders_expedition_tips
        );
        $this->createEssentialTips(
            Expedition::find(14),
            $eight_thousanders_expedition_tips
        );
        $this->createEssentialTips(
            Expedition::find(15),
            $eight_thousanders_expedition_tips
        );
        $this->createEssentialTips(
            Expedition::find(16),
            $seven_thousanders_expedition_tips
        );
        $this->createEssentialTips(
            Expedition::find(17),
            $seven_thousanders_expedition_tips
        );
        $this->createEssentialTips(
            Expedition::find(18),
            $seven_thousanders_expedition_tips
        );
        $this->createEssentialTips(
            Expedition::find(19),
            $seven_thousanders_expedition_tips
        );
        $this->createEssentialTips(
            Expedition::find(20),
            $seven_thousanders_expedition_tips
        );
        $this->createEssentialTips(
            Expedition::find(21),
            $seven_thousanders_expedition_tips
        );
        $this->createEssentialTips(
            Expedition::find(22),
            $seven_thousanders_expedition_tips
        );
        $this->createEssentialTips(
            Expedition::find(23),
            $general_expedition_tips
        );


        $this->createEssentialTips(
            Expedition::find(24),
            $vip_tips
        );
        $this->createEssentialTips(
            Expedition::find(25),
            $vip_tips
        );

        $this->createEssentialTips(
            Expedition::find(26),
            $lobuche_peak_climbing_tips
        );
        $this->createEssentialTips(
            Expedition::find(27),
            $six_thousanders_expedition_tips
        );
        $this->createEssentialTips(
            Expedition::find(28),
            $six_thousanders_expedition_tips
        );
        $this->createEssentialTips(
            Expedition::find(29),
            $six_thousanders_expedition_tips
        );
        $this->createEssentialTips(
            Expedition::find(30),
            $six_thousanders_expedition_tips
        );
        $this->createEssentialTips(
            Expedition::find(31),
            $six_thousanders_expedition_tips
        );
        $this->createEssentialTips(
            Expedition::find(32),
            $six_thousanders_expedition_tips
        );
        $this->createEssentialTips(
            Expedition::find(33),
            $six_thousanders_expedition_tips
        );
        $this->createEssentialTips(
            Expedition::find(34),
            $six_thousanders_expedition_tips
        );
        $this->createEssentialTips(
            Expedition::find(35),
            $six_thousanders_expedition_tips
        );

        $this->createEssentialTips(
            Tour::first(),
            $kathmandu_cultural_tour_tips
        );
        $this->createEssentialTips(
            Tour::find(2),
            $kathmandu_cultural_tour_tips
        );
        $this->createEssentialTips(
            Tour::find(3),
            $kathmandu_cultural_tour_tips
        );
        $this->createEssentialTips(
            Tour::find(4),
            $ultimate_photography
        );
        $this->createEssentialTips(
            Tour::find(5),
            $kathmandu_cultural_tour_tips
        );
        $this->createEssentialTips(
            Tour::find(6),
            $kathmandu_cultural_tour_tips
        );
        $this->createEssentialTips(
            Tour::find(7),
            $service
        );
    }
    protected function createEssentialTips(Model $model, array $tips): void
    {
        foreach ($tips as $tip) {
            if (isset($tip) && is_array($tip)) {
                $model->essentialTips()->create($tip);
            }
        }
    }
}
