<?php

namespace Database\Seeders;

use App\Models\Itinerary;
use App\Models\Trek;
use Illuminate\Database\Seeder;

/**
 * Fills the Dolpo to Rara Trek with full EN + FR content: title, description,
 * best-time, costs include/exclude (as repeater rows), 25-day itinerary,
 * and basic scalar fields (duration, altitudes, grade).
 *
 * Matches the trek by its English title — portable across environments.
 * Idempotent: only writes empty/missing fields; wipes & re-seeds itineraries.
 */
class DolpoToRaraTrekContentSeeder extends Seeder
{
    public function run(): void
    {
        $trek = Trek::query()
            ->where('title', 'like', '%Dolpo to Rara Trek%')
            ->get()
            ->first(fn ($t) => $t->getTranslation('title', 'en', false) === 'Dolpo to Rara Trek');

        if (! $trek) {
            $this->command?->warn('Trek "Dolpo to Rara Trek" not found — skipping.');
            return;
        }

        // Title — FR
        if (blank($trek->getTranslation('title', 'fr', false))) {
            $trek->setTranslation('title', 'fr', 'Trek du Dolpo au lac de Rara');
        }

        // Description — EN + FR (preserve any existing values)
        if (blank($trek->getTranslation('description', 'en', false))) {
            $trek->setTranslation('description', 'en', $this->descriptionEn());
        }
        if (blank($trek->getTranslation('description', 'fr', false))) {
            $trek->setTranslation('description', 'fr', $this->descriptionFr());
        }

        // Best time
        if (blank($trek->getTranslation('best_time_for_trek', 'en', false))) {
            $trek->setTranslation('best_time_for_trek', 'en', 'May–October (Dolpo lies in the rain-shadow; July–August are also viable, unlike most Nepal treks)');
        }
        if (blank($trek->getTranslation('best_time_for_trek', 'fr', false))) {
            $trek->setTranslation('best_time_for_trek', 'fr', 'Mai–octobre (le Dolpo est dans l\'ombre pluviométrique ; juillet–août sont aussi possibles, contrairement à la plupart des treks au Népal)');
        }

        // Scalar fields — only fill if empty
        if (! $trek->grade)               $trek->grade = '7';
        if (! $trek->starting_point)      $trek->starting_point = 'Kathmandu';
        if (! $trek->ending_point)        $trek->ending_point = 'Kathmandu';
        if (! $trek->starting_altitude)   $trek->starting_altitude = 1400;
        if (! $trek->highest_altitude)    $trek->highest_altitude = 5115;
        if (! $trek->duration)            $trek->duration = '25 days';

        // Costs — only fill if empty (the costs columns are array casts so
        // we check whether the EN slot has any populated rows)
        if (empty($trek->getTranslation('costs_include', 'en', false))) {
            $trek->setTranslation('costs_include', 'en', $this->costsInclude('en'));
            $trek->setTranslation('costs_include', 'fr', $this->costsInclude('fr'));
        }
        if (empty($trek->getTranslation('costs_exclude', 'en', false))) {
            $trek->setTranslation('costs_exclude', 'en', $this->costsExclude('en'));
            $trek->setTranslation('costs_exclude', 'fr', $this->costsExclude('fr'));
        }

        $trek->save();

        // Itinerary — wipe and reseed only if empty
        if ($trek->itineraries()->count() === 0) {
            foreach ($this->itinerary() as $day) {
                $it = new Itinerary;
                $it->itinerable_id = $trek->id;
                $it->itinerable_type = Trek::class;
                $it->setTranslation('title', 'en', $day['en']);
                $it->setTranslation('title', 'fr', $day['fr']);
                $it->save();
            }
        }

        $this->command?->info("DolpoToRaraTrekContentSeeder: trek #{$trek->id} ({$trek->title}) — itineraries: ".$trek->itineraries()->count());
    }

    private function descriptionEn(): string
    {
        return <<<'HTML'
<p>The 25-day crossing from Dolpo's Phoksundo region to Rara Lake in the far west — through the Mugu and Jumla districts, over the Kagmara La (5,115 m), and into the largest lake in Nepal. This route is rarely trekked: maybe twenty foreigners attempt it in a year.</p>

<h2>Why this trek</h2>
<ul>
<li>Connects two of Nepal's most beautiful lake destinations on a single foot route.</li>
<li>Travels through districts that see almost zero tourism — Mugu has one of the lowest human development indices in Nepal.</li>
<li>Full camping logistic. No tea houses outside the main villages.</li>
<li>Kagmara La crossing is the high point, with views of the Kanjirowa Himal.</li>
</ul>

<p>Price for this route varies considerably with group size and logistics — get in touch and we'll build a detailed quote based on dates and group size.</p>
HTML;
    }

    private function descriptionFr(): string
    {
        return <<<'HTML'
<p>La traversée de 25 jours du Dolpo, depuis la région de Phoksundo jusqu'au lac de Rara, à l'extrême ouest du Népal — à travers les districts de Mugu et de Jumla, par le col du Kagmara La (5 115 m), pour atteindre le plus grand lac du pays. Cet itinéraire est rarement parcouru : à peine une vingtaine d'étrangers tentent l'aventure chaque année.</p>

<h2>Pourquoi ce trek</h2>
<ul>
<li>Relie à pied deux des plus beaux lacs du Népal en un seul itinéraire.</li>
<li>Traverse des districts qui ne voient presque aucun tourisme — Mugu affiche l'un des indices de développement humain les plus bas du Népal.</li>
<li>Logistique entièrement en camping. Aucune maison de thé en dehors des principaux villages.</li>
<li>Le franchissement du Kagmara La constitue le point culminant, avec vue sur le Kanjirowa Himal.</li>
</ul>

<p>Le tarif de cet itinéraire varie considérablement selon la taille du groupe et la logistique — contactez-nous et nous établirons un devis détaillé en fonction des dates et du nombre de participants.</p>
HTML;
    }

    private function costsInclude(string $locale): array
    {
        $rows = [
            ['en' => 'Arrival & departure: airport pick-up and drop-off in Kathmandu, private vehicle.', 'fr' => 'Arrivée et départ : transferts aéroport à Katmandou en véhicule privé.'],
            ['en' => 'Accommodation in Kathmandu: 3 nights in a 3-star hotel (twin sharing, bed & breakfast).', 'fr' => 'Hébergement à Katmandou : 3 nuits dans un hôtel 3 étoiles (chambre twin, petit-déjeuner inclus).'],
            ['en' => 'Welcome dinner in a tourist-standard Nepali restaurant in Kathmandu.', 'fr' => 'Dîner de bienvenue dans un restaurant népalais touristique à Katmandou.'],
            ['en' => 'Domestic flights: Kathmandu–Nepalganj–Juphal (outbound) and Talcha (Rara)–Nepalganj–Kathmandu (return), including domestic airport taxes.', 'fr' => 'Vols intérieurs : Katmandou–Nepalganj–Juphal (aller) et Talcha (Rara)–Nepalganj–Katmandou (retour), taxes d\'aéroport comprises.'],
            ['en' => 'Hotel in Nepalganj on inbound and outbound transit nights (standard category).', 'fr' => 'Hôtel à Nepalganj lors des nuits de transit aller et retour (catégorie standard).'],
            ['en' => 'Shey Phoksundo National Park entry permit.', 'fr' => 'Permis d\'entrée du parc national de Shey Phoksundo.'],
            ['en' => 'Lower Dolpo restricted area permit (covers the Phoksundo to Kagmara La section).', 'fr' => 'Permis de zone restreinte du Bas Dolpo (couvre la section Phoksundo à Kagmara La).'],
            ['en' => 'Mugu Karnali restricted area permit (covers the section through Mugu district).', 'fr' => 'Permis de zone restreinte de Mugu Karnali (couvre la section traversant le district de Mugu).'],
            ['en' => 'Rara National Park entry permit.', 'fr' => 'Permis d\'entrée du parc national de Rara.'],
            ['en' => 'TIMS (Trekkers\' Information Management System) card.', 'fr' => 'Carte TIMS (Système de Gestion de l\'Information des Trekkeurs).'],
            ['en' => 'Full camping logistics: 2-person tents, dining tent, kitchen tent, toilet tent, foam mattresses, table & stools (no tea houses exist on most of this route).', 'fr' => 'Logistique de camping complète : tentes 2 personnes, tente repas, tente cuisine, tente toilettes, matelas en mousse, table et tabourets (la plupart de cet itinéraire n\'a pas de lodges).'],
            ['en' => 'Three meals a day on the trek (breakfast, lunch, dinner) prepared by our camp kitchen, with tea/coffee and hot water.', 'fr' => 'Trois repas par jour pendant le trek (petit-déjeuner, déjeuner, dîner) préparés par notre cuisine de camp, avec thé/café et eau chaude.'],
            ['en' => 'Government-licensed English-speaking trek leader (Sherpa or local guide with restricted-area experience).', 'fr' => 'Chef de trek anglophone agréé par le gouvernement (Sherpa ou guide local avec expérience des zones restreintes).'],
            ['en' => 'One assistant guide for every four trekkers.', 'fr' => 'Un guide assistant pour chaque groupe de quatre trekkeurs.'],
            ['en' => 'Porters and/or pack animals (mules/yaks) to carry group equipment and personal duffels (15 kg per trekker).', 'fr' => 'Porteurs et/ou animaux de bât (mules/yaks) pour transporter l\'équipement du groupe et les sacs personnels (15 kg par trekkeur).'],
            ['en' => 'Cook and kitchen crew with all camp cooking equipment.', 'fr' => 'Cuisinier et équipe de cuisine avec tout l\'équipement de cuisine de camp.'],
            ['en' => 'Salary, food, lodging, insurance and equipment for guide, cook and porters.', 'fr' => 'Salaire, nourriture, hébergement, assurance et équipement pour le guide, le cuisinier et les porteurs.'],
            ['en' => 'Comprehensive first-aid kit, oximeter and emergency oxygen carried by the guide.', 'fr' => 'Trousse de premiers secours complète, oxymètre et oxygène d\'urgence portés par le guide.'],
            ['en' => 'Drinking water purification (boiled water and/or tablets).', 'fr' => 'Purification de l\'eau potable (eau bouillie et/ou pastilles).'],
            ['en' => 'Sherpalaya duffel bag, t-shirt and trek map (yours to keep).', 'fr' => 'Sac de voyage Sherpalaya, t-shirt et carte du trek (à conserver).'],
            ['en' => 'All government taxes, VAT and office service charges.', 'fr' => 'Toutes les taxes gouvernementales, TVA et frais de service de bureau.'],
        ];

        return array_map(fn ($r) => $r[$locale], $rows);
    }

    private function costsExclude(string $locale): array
    {
        $rows = [
            ['en' => 'International airfare to and from Kathmandu.', 'fr' => 'Vols internationaux vers et depuis Katmandou.'],
            ['en' => 'Nepal entry visa fee (available on arrival at Kathmandu airport — bring USD cash and passport photos).', 'fr' => 'Frais de visa d\'entrée au Népal (disponible à l\'arrivée à l\'aéroport de Katmandou — apporter des dollars US en espèces et des photos de passeport).'],
            ['en' => 'Personal travel and medical insurance, including emergency helicopter evacuation cover up to 5,500 m (mandatory).', 'fr' => 'Assurance voyage et médicale personnelle, incluant l\'évacuation d\'urgence par hélicoptère jusqu\'à 5 500 m (obligatoire).'],
            ['en' => 'Lunch and dinner in Kathmandu and Nepalganj (except the welcome dinner).', 'fr' => 'Déjeuner et dîner à Katmandou et à Nepalganj (sauf le dîner de bienvenue).'],
            ['en' => 'Personal trekking and camping gear (sleeping bag rated to -15 °C, down jacket, trekking boots, etc.). Rentals available in Kathmandu on request.', 'fr' => 'Équipement personnel de trek et de camping (sac de couchage -15 °C, doudoune, chaussures de trek, etc.). Location possible à Katmandou sur demande.'],
            ['en' => 'Bottled or canned drinks, alcohol, snacks and any food/drink outside the standard trek menu.', 'fr' => 'Boissons en bouteille ou en canette, alcool, snacks et toute nourriture/boisson en dehors du menu standard du trek.'],
            ['en' => 'Hot showers, battery charging and Wi-Fi where available (rare on this route).', 'fr' => 'Douches chaudes, recharge de batteries et Wi-Fi lorsque disponibles (rares sur cet itinéraire).'],
            ['en' => 'Tips for guide, cook and porters (customary; budget approximately USD 250–350 per trekker for the full trip).', 'fr' => 'Pourboires pour le guide, le cuisinier et les porteurs (d\'usage ; prévoir environ 250–350 USD par trekkeur pour l\'ensemble du voyage).'],
            ['en' => 'Excess baggage charges on domestic flights (15 kg + 5 kg hand luggage allowance per person).', 'fr' => 'Frais d\'excédent de bagages sur les vols intérieurs (15 kg + 5 kg de bagage à main par personne).'],
            ['en' => 'Extra hotel nights or flight changes caused by domestic flight delays (common in Juphal and Talcha due to weather).', 'fr' => 'Nuits d\'hôtel supplémentaires ou changements de vol causés par des retards de vols intérieurs (fréquents à Juphal et Talcha en raison de la météo).'],
            ['en' => 'Emergency rescue, evacuation, hospital and repatriation costs (covered by your insurance).', 'fr' => 'Frais de secours d\'urgence, d\'évacuation, d\'hospitalisation et de rapatriement (couverts par votre assurance).'],
            ['en' => 'Anything not specifically listed under "Costs include".', 'fr' => 'Tout ce qui n\'est pas explicitement listé dans « Coûts inclus ».'],
        ];

        return array_map(fn ($r) => $r[$locale], $rows);
    }

    private function itinerary(): array
    {
        return [
            ['en' => 'Day 1: Arrive in Kathmandu (1,400 m) and transfer to your hotel', 'fr' => 'Jour 1 : Arrivée à Katmandou (1 400 m) et transfert à l\'hôtel'],
            ['en' => 'Day 2: Kathmandu — permit processing, trek briefing and free time in Thamel', 'fr' => 'Jour 2 : Katmandou — obtention des permis, briefing de trek et temps libre à Thamel'],
            ['en' => 'Day 3: Fly Kathmandu to Nepalganj (1.5 hrs), overnight at hotel (150 m)', 'fr' => 'Jour 3 : Vol Katmandou – Nepalganj (1h30), nuit à l\'hôtel (150 m)'],
            ['en' => 'Day 4: Fly Nepalganj to Juphal (35 min), trek to Dunai (2,140 m, 2–3 hrs)', 'fr' => 'Jour 4 : Vol Nepalganj – Juphal (35 min), trek jusqu\'à Dunai (2 140 m, 2 à 3 h)'],
            ['en' => 'Day 5: Trek Dunai to Chhepka (2,720 m, 6 hrs) along the Suli Gad river', 'fr' => 'Jour 5 : Trek Dunai – Chhepka (2 720 m, 6 h) le long de la rivière Suli Gad'],
            ['en' => 'Day 6: Trek Chhepka to Jharana Hotel (3,110 m, 6 hrs)', 'fr' => 'Jour 6 : Trek Chhepka – Jharana Hotel (3 110 m, 6 h)'],
            ['en' => 'Day 7: Trek Jharana Hotel to Ringmo / Phoksundo Lake (3,612 m, 5 hrs) via the Phoksundo waterfall', 'fr' => 'Jour 7 : Trek Jharana Hotel – Ringmo / lac Phoksundo (3 612 m, 5 h) via la cascade de Phoksundo'],
            ['en' => 'Day 8: Acclimatisation day at Phoksundo Lake — visit Tshowa Gompa and Ringmo village', 'fr' => 'Jour 8 : Journée d\'acclimatation au lac Phoksundo — visite du monastère de Tshowa et du village de Ringmo'],
            ['en' => 'Day 9: Trek Ringmo to Pungmo (3,170 m, 4–5 hrs) following the Pungmo Khola', 'fr' => 'Jour 9 : Trek Ringmo – Pungmo (3 170 m, 4 à 5 h) en suivant la Pungmo Khola'],
            ['en' => 'Day 10: Trek Pungmo to Kagmara Phedi (4,000 m, 5–6 hrs)', 'fr' => 'Jour 10 : Trek Pungmo – Kagmara Phedi (4 000 m, 5 à 6 h)'],
            ['en' => 'Day 11: Trek Kagmara Phedi to Kagmara Base Camp (4,500 m, 4 hrs)', 'fr' => 'Jour 11 : Trek Kagmara Phedi – camp de base de Kagmara (4 500 m, 4 h)'],
            ['en' => 'Day 12: Cross the Kagmara La (5,115 m), descend to Toijem (4,000 m, 8 hrs) — Kanjirowa Himal views', 'fr' => 'Jour 12 : Franchissement du Kagmara La (5 115 m), descente à Toijem (4 000 m, 8 h) — vues sur le Kanjirowa Himal'],
            ['en' => 'Day 13: Trek Toijem to Hurikot (3,000 m, 5–6 hrs)', 'fr' => 'Jour 13 : Trek Toijem – Hurikot (3 000 m, 5 à 6 h)'],
            ['en' => 'Day 14: Trek Hurikot to Kaigaon (2,610 m, 5 hrs), entering the Tibetan-Buddhist villages of upper Jumla', 'fr' => 'Jour 14 : Trek Hurikot – Kaigaon (2 610 m, 5 h), entrée dans les villages bouddhistes tibétains du haut Jumla'],
            ['en' => 'Day 15: Trek Kaigaon to Chautha (2,770 m, 5 hrs)', 'fr' => 'Jour 15 : Trek Kaigaon – Chautha (2 770 m, 5 h)'],
            ['en' => 'Day 16: Trek Chautha to Chyakhure Lagna (3,500 m, 6 hrs) via the Mauri La pass (3,820 m)', 'fr' => 'Jour 16 : Trek Chautha – Chyakhure Lagna (3 500 m, 6 h) via le col de Mauri La (3 820 m)'],
            ['en' => 'Day 17: Trek Chyakhure Lagna to Jumla (2,540 m, 5 hrs)', 'fr' => 'Jour 17 : Trek Chyakhure Lagna – Jumla (2 540 m, 5 h)'],
            ['en' => 'Day 18: Rest day in Jumla — explore the bazaar and the old Chandannath temple complex', 'fr' => 'Jour 18 : Journée de repos à Jumla — visite du bazar et de l\'ancien complexe du temple de Chandannath'],
            ['en' => 'Day 19: Trek Jumla to Padmara (3,300 m, 6 hrs)', 'fr' => 'Jour 19 : Trek Jumla – Padmara (3 300 m, 6 h)'],
            ['en' => 'Day 20: Trek Padmara to Pina (2,440 m, 6 hrs) via the Khali Lagna pass (3,500 m)', 'fr' => 'Jour 20 : Trek Padmara – Pina (2 440 m, 6 h) via le col de Khali Lagna (3 500 m)'],
            ['en' => 'Day 21: Trek Pina to Bumra (2,850 m, 5 hrs)', 'fr' => 'Jour 21 : Trek Pina – Bumra (2 850 m, 5 h)'],
            ['en' => 'Day 22: Trek Bumra to Rara Lake (2,990 m, 4–5 hrs) — arrive at Nepal\'s largest lake', 'fr' => 'Jour 22 : Trek Bumra – lac de Rara (2 990 m, 4 à 5 h) — arrivée au plus grand lac du Népal'],
            ['en' => 'Day 23: Rest day at Rara Lake — circumambulate the lake (4 hrs) and visit the Rara National Park visitor centre', 'fr' => 'Jour 23 : Journée de repos au lac de Rara — tour du lac (4 h) et visite du centre d\'accueil du parc national de Rara'],
            ['en' => 'Day 24: Trek Rara to Talcha airstrip (3 hrs), fly Talcha – Nepalganj – Kathmandu', 'fr' => 'Jour 24 : Trek Rara – piste d\'atterrissage de Talcha (3 h), vol Talcha – Nepalganj – Katmandou'],
            ['en' => 'Day 25: Free day in Kathmandu / final departure transfer to the airport', 'fr' => 'Jour 25 : Journée libre à Katmandou / transfert final à l\'aéroport pour le départ'],
        ];
    }
}
