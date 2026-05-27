<?php

namespace Database\Seeders;

use App\Enums\TrekDifficulty;
use App\Models\EssentialTip;
use App\Models\Expedition;
use App\Models\Itinerary;
use App\Models\KeyHighlight;
use Illuminate\Database\Seeder;

/**
 * Fills the Premium and Luxury Everest expedition tiers with full content:
 * EN + FR title/description/best-time, costs include/exclude (Filament
 * repeater format), itineraries, destinations, key highlights, essential
 * tips, and scalar fields.
 *
 * Matches expeditions by English title; idempotent for textual fields
 * (only fills empty values), wipes-and-reseeds for itinerary/highlights/
 * tips so the seeder reflects the latest curated copy.
 *
 * Run AFTER EverestTierProductsSeeder which creates the tier expedition
 * records themselves.
 */
class EverestTiersFullContentSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedPremium();
        $this->seedLuxury();
    }

    private function findByEnTitle(string $title): ?Expedition
    {
        // Filter in PHP for portability across SQLite and MySQL — the JSON
        // function names + return-quoting behaviour differ between drivers.
        return Expedition::query()
            ->where('title', 'like', '%'.str_replace("'", "''", $title).'%')
            ->get()
            ->first(fn ($e) => $e->getTranslation('title', 'en', false) === $title);
    }

    private function destinationIds(array $englishNames): array
    {
        return \App\Models\Destination::query()
            ->whereIn('name', $englishNames)
            ->pluck('id')
            ->all();
    }

    /* ------------------------------------------------------------------ *
     *  PREMIUM TIER
     * ------------------------------------------------------------------ */

    private function seedPremium(): void
    {
        $exp = $this->findByEnTitle('Mt. Everest Expedition — Premium');
        if (! $exp) {
            $this->command?->warn('Premium Everest expedition not found — skipping.');
            return;
        }

        if (blank($exp->getTranslation('title', 'fr', false))) {
            $exp->setTranslation('title', 'fr', 'Expédition au Mont Everest — Premium');
        }

        if (blank($exp->getTranslation('description', 'fr', false))) {
            $exp->setTranslation('description', 'fr', $this->premiumDescriptionFr());
        }

        if (blank($exp->getTranslation('best_time_for_expedition', 'fr', false))) {
            $exp->setTranslation('best_time_for_expedition', 'fr', 'Saison de printemps (avril–mai)');
        }

        if (! $exp->grade)              $exp->grade = '9';
        if (! $exp->starting_point)     $exp->starting_point = 'Kathmandu';
        if (! $exp->ending_point)       $exp->ending_point = 'Kathmandu';
        if (! $exp->starting_altitude)  $exp->starting_altitude = 1400;
        if (! $exp->highest_altitude)   $exp->highest_altitude = 8849;
        if (! $exp->duration)           $exp->duration = 65;
        if (! $exp->expedition_difficulty) $exp->expedition_difficulty = TrekDifficulty::CHALLENGING;

        if (empty($exp->getTranslation('costs_include', 'en', false))) {
            $exp->setTranslation('costs_include', 'en', $this->premiumCostsInclude());
        }
        if (empty($exp->getTranslation('costs_exclude', 'en', false))) {
            $exp->setTranslation('costs_exclude', 'en', $this->premiumCostsExclude());
        }

        $exp->save();

        // Destinations along the South Col route
        $exp->destinations()->syncWithoutDetaching(
            $this->destinationIds(['Everest Base Camp', 'Namche Bazaar', 'Tengboche Monastery', 'Dingboche', 'Pheriche'])
        );

        if ($exp->keyHighlights()->count() === 0) {
            foreach ($this->premiumKeyHighlights() as $row) {
                $kh = new KeyHighlight;
                $kh->highlightable_id = $exp->id;
                $kh->highlightable_type = Expedition::class;
                $kh->setTranslation('title', 'en', $row['title_en']);
                $kh->setTranslation('title', 'fr', $row['title_fr']);
                $kh->setTranslation('description', 'en', $row['desc_en']);
                $kh->setTranslation('description', 'fr', $row['desc_fr']);
                $kh->save();
            }
        }

        if ($exp->essentialTips()->count() === 0) {
            foreach ($this->premiumEssentialTips() as $row) {
                $et = new EssentialTip;
                $et->tippable_id = $exp->id;
                $et->tippable_type = Expedition::class;
                $et->setTranslation('title', 'en', $row['title_en']);
                $et->setTranslation('title', 'fr', $row['title_fr']);
                $et->setTranslation('description', 'en', $row['desc_en']);
                $et->setTranslation('description', 'fr', $row['desc_fr']);
                $et->save();
            }
        }

        if ($exp->itineraries()->count() === 0) {
            foreach ($this->premiumItinerary() as $day) {
                $it = new Itinerary;
                $it->itinerable_id = $exp->id;
                $it->itinerable_type = Expedition::class;
                $it->setTranslation('title', 'en', $day['en']);
                $it->setTranslation('title', 'fr', $day['fr']);
                $it->save();
            }
        }

        $this->command?->info("Premium Everest filled: dest=".$exp->destinations()->count()." kh=".$exp->keyHighlights()->count()." et=".$exp->essentialTips()->count()." itin=".$exp->itineraries()->count());
    }

    private function premiumDescriptionFr(): string
    {
        return <<<'HTML'
<p>Notre programme Everest renforcé. Soutien sherpa en 1:1, oxygène supplémentaire et confort en tente individuelle au camp de base. Le niveau adapté pour une première tentative à 8 000 m, ou pour tout alpiniste expérimenté souhaitant davantage de marge sur la montagne.</p>

<h2>Ce qui est inclus</h2>
<ul>
<li>1 sherpa d'altitude dédié par client au-dessus du camp de base</li>
<li>7 bouteilles d'oxygène par client (contre 5 en formule Standard)</li>
<li>Tente d'altitude individuelle au camp de base — aucune tente partagée</li>
<li>Combinaison duvet et chaussures 8 000 m de gamme supérieure</li>
<li>Tente mess chauffée au camp de base avec option salle à manger privée</li>
<li>Retour optionnel en hélicoptère depuis Pheriche ou Lukla après le sommet</li>
<li>Tous les permis, redevances, assurances et coordination des secours</li>
<li>Hôtel 5 étoiles à Katmandou avant et après l'expédition</li>
</ul>

<h2>À qui s'adresse cette formule</h2>
<p>Aux alpinistes tentant leur premier 8 000 m qui souhaitent un maximum de marge sans basculer en formule luxe. Mais aussi aux alpinistes expérimentés ayant déjà sommité en Standard et désirant un niveau de soutien supérieur pour une expédition plus rapide et plus confortable.</p>

<h2>Différences avec la formule Standard</h2>
<p>L'objectif du sommet et la voie d'ascension sont identiques. Ce qui change : le niveau de soutien personnel, l'allocation d'oxygène et le confort au camp de base. Avec un ratio sherpa/client de 1:1 et 40 % d'oxygène supplémentaire, la formule Premium offre une marge sensiblement plus grande au-dessus du col Sud comme le jour du sommet.</p>
HTML;
    }

    private function premiumCostsInclude(): array
    {
        return [
            ['en' => 'Arrival & departure: airport pick-up and drop-off in Kathmandu, private vehicle.', 'fr' => 'Arrivée et départ : transferts aéroport à Katmandou en véhicule privé.'],
            ['en' => 'Accommodation: 5 nights in a 5-star hotel in Kathmandu (single room, bed & breakfast) pre- and post-expedition.', 'fr' => 'Hébergement : 5 nuits dans un hôtel 5 étoiles à Katmandou (chambre individuelle, petit-déjeuner) avant et après l\'expédition.'],
            ['en' => 'Welcome and farewell dinner in a tourist-standard restaurant in Kathmandu.', 'fr' => 'Dîner de bienvenue et dîner d\'adieu dans un restaurant touristique à Katmandou.'],
            ['en' => 'Permits: Mt. Everest climbing permit and royalty, Sagarmatha National Park entry permit, Pasang Lhamu Rural Municipality entry permit, and Khumbu Icefall (SPCC) fee.', 'fr' => 'Permis : permis d\'ascension et redevance du Mt. Everest, permis d\'entrée du parc national de Sagarmatha, permis d\'entrée de la municipalité rurale de Pasang Lhamu et redevance de la cascade de glace du Khumbu (SPCC).'],
            ['en' => 'Domestic flights: Kathmandu–Lukla–Kathmandu, including domestic airport taxes.', 'fr' => 'Vols intérieurs : Katmandou–Lukla–Katmandou, taxes d\'aéroport comprises.'],
            ['en' => 'All ground transportation in Nepal by private vehicle as per itinerary.', 'fr' => 'Tout le transport terrestre au Népal en véhicule privé selon l\'itinéraire.'],
            ['en' => 'Three meals a day (breakfast, lunch and dinner) during the trek and at Base Camp, prepared by our expedition kitchen.', 'fr' => 'Trois repas par jour (petit-déjeuner, déjeuner et dîner) pendant le trek et au camp de base, préparés par notre cuisine d\'expédition.'],
            ['en' => 'Lodge accommodation (sharing) during the trek to and from Base Camp.', 'fr' => 'Hébergement en lodge (chambre partagée) pendant le trek aller et retour au camp de base.'],
            ['en' => 'Personal climbing tent at Base Camp — no shared sleeping tents.', 'fr' => 'Tente d\'altitude individuelle au camp de base — aucune tente de couchage partagée.'],
            ['en' => 'Heated dining tent at Base Camp with private dining option available.', 'fr' => 'Tente mess chauffée au camp de base avec option salle à manger privée.'],
            ['en' => 'Shared expedition tents (2-person) at Camps 1, 2, 3 and 4.', 'fr' => 'Tentes d\'expédition partagées (2 personnes) aux camps 1, 2, 3 et 4.'],
            ['en' => 'Dedicated 1:1 climbing Sherpa per client above Base Camp (significantly higher ratio than Standard).', 'fr' => 'Sherpa d\'altitude dédié en 1:1 par client au-dessus du camp de base (ratio nettement plus élevé qu\'en Standard).'],
            ['en' => '7 bottles of supplementary oxygen per client (vs. 5 in Standard) — 4 L masks + regulators.', 'fr' => '7 bouteilles d\'oxygène supplémentaire par client (contre 5 en Standard) — masques 4 L et régulateurs.'],
            ['en' => 'Additional oxygen reserve for emergencies and contingency.', 'fr' => 'Réserve d\'oxygène supplémentaire pour les urgences et les imprévus.'],
            ['en' => 'Higher-grade 8 000 m down suit and 8 000 m boot allocation for the expedition (to keep).', 'fr' => 'Combinaison duvet 8 000 m et chaussures 8 000 m de gamme supérieure attribuées pour l\'expédition (à conserver).'],
            ['en' => 'High-altitude tents, ropes, ice screws, snow bars, deadman anchors and all fixed-line equipment.', 'fr' => 'Tentes d\'altitude, cordes, broches à glace, ancres à neige et tout l\'équipement de cordes fixes.'],
            ['en' => 'Mountain gas, kerosene and cooking fuel at all camps.', 'fr' => 'Gaz de montagne, kérosène et combustible de cuisine à tous les camps.'],
            ['en' => 'Solar power and battery charging facility at Base Camp.', 'fr' => 'Énergie solaire et installation de recharge des batteries au camp de base.'],
            ['en' => 'Satellite phone for emergencies (paid calls available).', 'fr' => 'Téléphone satellite pour les urgences (appels payants disponibles).'],
            ['en' => 'Internet access at Base Camp (limited bandwidth).', 'fr' => 'Accès Internet au camp de base (débit limité).'],
            ['en' => 'Government-licensed UIAGM/IFMGA expedition leader.', 'fr' => 'Chef d\'expédition agréé UIAGM/IFMGA par le gouvernement.'],
            ['en' => 'Base Camp manager, cook, kitchen crew and high-altitude porters.', 'fr' => 'Gérant du camp de base, cuisinier, équipe de cuisine et porteurs d\'altitude.'],
            ['en' => 'Salary, food, lodging, insurance, equipment and bonuses for all Sherpas and expedition staff.', 'fr' => 'Salaire, nourriture, hébergement, assurance, équipement et primes pour tous les sherpas et le personnel d\'expédition.'],
            ['en' => 'Government Liaison Officer with full equipment, salary and insurance.', 'fr' => 'Agent de liaison gouvernemental avec équipement complet, salaire et assurance.'],
            ['en' => 'Comprehensive medical kit at Base Camp; doctor on call.', 'fr' => 'Trousse médicale complète au camp de base ; médecin sur appel.'],
            ['en' => 'Hyperbaric chamber (Gamow bag) at Base Camp for altitude emergencies.', 'fr' => 'Caisson hyperbare (sac Gamow) au camp de base pour les urgences liées à l\'altitude.'],
            ['en' => 'Pulse oximeter and oxygen cylinders available throughout the trek and expedition.', 'fr' => 'Oxymètre de pouls et bouteilles d\'oxygène disponibles pendant tout le trek et l\'expédition.'],
            ['en' => 'Rescue and evacuation coordination (helicopter rescue costs covered by your insurance).', 'fr' => 'Coordination des secours et de l\'évacuation (frais d\'évacuation par hélicoptère couverts par votre assurance).'],
            ['en' => 'Optional helicopter return from Pheriche or Lukla to Kathmandu after summit (subject to weather and availability).', 'fr' => 'Retour optionnel en hélicoptère de Pheriche ou Lukla à Katmandou après le sommet (selon les conditions météorologiques et la disponibilité).'],
            ['en' => 'Garbage deposit fee and full Leave-No-Trace expedition cleanup.', 'fr' => 'Caution sur les déchets et nettoyage complet de l\'expédition selon les principes "Ne laisser aucune trace".'],
            ['en' => 'Sherpalaya duffel bag, expedition t-shirt and summit certificate.', 'fr' => 'Sac de voyage Sherpalaya, t-shirt d\'expédition et certificat de sommet.'],
            ['en' => 'All government taxes, VAT and office service charges.', 'fr' => 'Toutes les taxes gouvernementales, TVA et frais de service de bureau.'],
        ];
    }

    private function premiumCostsExclude(): array
    {
        return [
            ['en' => 'International airfare to and from Kathmandu.', 'fr' => 'Vols internationaux vers et depuis Katmandou.'],
            ['en' => 'Nepal entry visa fee (available on arrival at Kathmandu airport).', 'fr' => 'Frais de visa d\'entrée au Népal (disponible à l\'arrivée à l\'aéroport de Katmandou).'],
            ['en' => 'Personal travel and medical insurance with emergency helicopter evacuation cover up to 8 850 m (mandatory).', 'fr' => 'Assurance voyage et médicale personnelle avec couverture d\'évacuation d\'urgence par hélicoptère jusqu\'à 8 850 m (obligatoire).'],
            ['en' => 'Lunch and dinner in Kathmandu (except the welcome and farewell dinners).', 'fr' => 'Déjeuner et dîner à Katmandou (sauf les dîners de bienvenue et d\'adieu).'],
            ['en' => 'Personal climbing and trekking gear (sleeping bag -40 °C, harness, ice axe, crampons, climbing helmet etc.). Rentals available in Kathmandu on request.', 'fr' => 'Équipement personnel d\'alpinisme et de trek (sac de couchage -40 °C, harnais, piolet, crampons, casque d\'escalade, etc.). Location possible à Katmandou sur demande.'],
            ['en' => 'Bottled and canned drinks, alcohol, snacks and any food or drink outside the standard expedition menu.', 'fr' => 'Boissons en bouteille ou en canette, alcool, snacks et toute nourriture ou boisson hors du menu standard de l\'expédition.'],
            ['en' => 'Personal communications: satellite phone calls, additional internet bandwidth.', 'fr' => 'Communications personnelles : appels par téléphone satellite, débit Internet supplémentaire.'],
            ['en' => 'Summit bonus for Sherpas (customary: USD 1 500–2 000 if summit is reached).', 'fr' => 'Prime de sommet pour les sherpas (d\'usage : 1 500–2 000 USD en cas de réussite au sommet).'],
            ['en' => 'Tips for guide, cook, kitchen crew and porters (customary: USD 600–1 000 per climber for the full expedition).', 'fr' => 'Pourboires pour le guide, le cuisinier, l\'équipe de cuisine et les porteurs (d\'usage : 600–1 000 USD par alpiniste pour l\'ensemble de l\'expédition).'],
            ['en' => 'Excess baggage charges on domestic flights (15 kg + 5 kg hand luggage allowance per person).', 'fr' => 'Frais d\'excédent de bagages sur les vols intérieurs (15 kg + 5 kg de bagage à main par personne).'],
            ['en' => 'Extra hotel nights or flight changes caused by domestic flight delays (common in Lukla due to weather).', 'fr' => 'Nuits d\'hôtel supplémentaires ou changements de vol causés par des retards de vols intérieurs (fréquents à Lukla en raison de la météo).'],
            ['en' => 'Emergency rescue, hospital and repatriation costs (covered by your insurance).', 'fr' => 'Frais de secours d\'urgence, d\'hospitalisation et de rapatriement (couverts par votre assurance).'],
            ['en' => 'Optional Khumbu Cough medication and personal medical prescriptions.', 'fr' => 'Médicaments optionnels contre la toux du Khumbu et ordonnances médicales personnelles.'],
            ['en' => 'Anything not specifically listed under "Costs include".', 'fr' => 'Tout ce qui n\'est pas explicitement listé dans « Coûts inclus ».'],
        ];
    }

    private function premiumKeyHighlights(): array
    {
        return [
            ['title_en' => '1:1 Dedicated Sherpa Above Base Camp', 'title_fr' => 'Sherpa dédié en 1:1 au-dessus du camp de base',
             'desc_en' => 'A personal climbing Sherpa accompanies you through the Khumbu Icefall, on every rotation, and on summit day — giving you maximum margin for safety, pacing and rope-fixing assistance.',
             'desc_fr' => 'Un sherpa d\'altitude personnel vous accompagne dans la cascade de glace du Khumbu, à chaque rotation et le jour du sommet — pour une marge de sécurité maximale, un rythme adapté et une aide aux cordes fixes.'],
            ['title_en' => '40% More Oxygen Than Standard', 'title_fr' => '40 % d\'oxygène en plus qu\'en formule Standard',
             'desc_en' => '7 bottles of oxygen per climber (versus 5 in Standard) plus an emergency reserve. More oxygen means more margin above the South Col, a longer summit window, and an easier descent.',
             'desc_fr' => '7 bouteilles d\'oxygène par alpiniste (contre 5 en Standard) plus une réserve d\'urgence. Plus d\'oxygène signifie plus de marge au-dessus du col Sud, une fenêtre de sommet plus longue et une descente plus aisée.'],
            ['title_en' => 'Personal Tent & Heated Mess at Base Camp', 'title_fr' => 'Tente individuelle et tente mess chauffée au camp de base',
             'desc_en' => 'A private climbing tent — no shared sleeping during the long Base Camp rotations — plus a heated dining tent with an optional private dining area for genuine recovery between rotations.',
             'desc_fr' => 'Une tente d\'altitude individuelle — aucun partage de couchage durant les longues rotations au camp de base — et une tente mess chauffée avec espace repas privé optionnel pour une vraie récupération entre les rotations.'],
            ['title_en' => 'UIAGM/IFMGA Expedition Leadership', 'title_fr' => 'Encadrement d\'expédition UIAGM/IFMGA',
             'desc_en' => 'Your expedition is led by a fully-certified UIAGM/IFMGA mountain guide with multiple Everest summits — the highest international qualification in mountain guiding.',
             'desc_fr' => 'Votre expédition est dirigée par un guide de montagne pleinement certifié UIAGM/IFMGA, avec plusieurs ascensions de l\'Everest à son actif — la plus haute qualification internationale du métier.'],
            ['title_en' => 'Optional Helicopter Return After Summit', 'title_fr' => 'Retour optionnel en hélicoptère après le sommet',
             'desc_en' => 'Skip the multi-day return trek from Base Camp — fly directly from Pheriche or Lukla to Kathmandu and start recovery 48 hours after summit (weather permitting).',
             'desc_fr' => 'Évitez le trek de retour de plusieurs jours depuis le camp de base — vol direct de Pheriche ou Lukla à Katmandou pour entamer la récupération 48 heures après le sommet (selon la météo).'],
        ];
    }

    private function premiumEssentialTips(): array
    {
        return [
            ['title_en' => 'Pre-Acclimatise on a 6 000 m Peak First', 'title_fr' => 'Acclimatez-vous d\'abord sur un sommet de 6 000 m',
             'desc_en' => 'Summit at least one 6 000 m peak (Lobuche, Island Peak, Aconcagua) and ideally one 7 000 m peak in the year prior. Premium support is not a substitute for high-altitude experience.',
             'desc_fr' => 'Sommitez au moins un sommet de 6 000 m (Lobuche, Island Peak, Aconcagua) et idéalement un sommet de 7 000 m dans l\'année précédente. Le soutien Premium ne remplace pas l\'expérience à haute altitude.'],
            ['title_en' => 'Insurance Must Cover Helicopter Evacuation to 8 850 m', 'title_fr' => 'L\'assurance doit couvrir l\'évacuation par hélicoptère jusqu\'à 8 850 m',
             'desc_en' => 'Standard travel insurance won\'t cover Everest. Use a specialist policy (Global Rescue, Ripcord, IHI Bupa) with explicit cover for high-altitude helicopter evacuation, repatriation and trip cancellation.',
             'desc_fr' => 'Une assurance voyage standard ne couvrira pas l\'Everest. Souscrivez une police spécialisée (Global Rescue, Ripcord, IHI Bupa) couvrant explicitement l\'évacuation par hélicoptère à haute altitude, le rapatriement et l\'annulation.'],
            ['title_en' => 'Train Cardio + Load-Carrying for 9 Months', 'title_fr' => 'Entraînez-vous en cardio et port de charge pendant 9 mois',
             'desc_en' => 'Aim for 4–6 sessions a week: long uphill hikes carrying 15 kg, gym strength (legs, core, back), and zone-2 cardio. The mountain rewards slow, repeated, well-fuelled effort — not gym power.',
             'desc_fr' => 'Visez 4 à 6 séances par semaine : longues randonnées en montée avec 15 kg, renforcement en salle (jambes, gainage, dos) et cardio en zone 2. La montagne récompense l\'effort lent, répété et bien nourri — pas la puissance en salle.'],
            ['title_en' => 'Plan Around the Weather Window, Not the Calendar', 'title_fr' => 'Planifiez selon la fenêtre météo, pas selon le calendrier',
             'desc_en' => 'The summit window is usually 5–10 days in mid-to-late May. Build flexibility into your post-expedition flights — never book a tight return. Our leader makes the summit-day call with the meteo team.',
             'desc_fr' => 'La fenêtre de sommet dure généralement 5 à 10 jours de mi à fin mai. Prévoyez de la flexibilité dans vos vols de retour — jamais de réservation serrée. Notre chef d\'expédition décide du jour du sommet avec l\'équipe météo.'],
            ['title_en' => 'Bring Your Own Boots — Rent Everything Else', 'title_fr' => 'Apportez vos propres chaussures — louez le reste',
             'desc_en' => 'Your 8 000 m boots are the one item you must own and have broken in. Down suit, sleeping bag, harness and most hardware can be rented in Kathmandu at lower cost than buying new.',
             'desc_fr' => 'Vos chaussures 8 000 m sont le seul équipement à posséder et à avoir bien rodé. Combinaison duvet, sac de couchage, harnais et la plupart du matériel peuvent être loués à Katmandou à moindre coût.'],
        ];
    }

    private function premiumItinerary(): array
    {
        return [
            ['en' => 'Day 01: Arrival in Kathmandu (1 400 m) and transfer to 5★ hotel', 'fr' => 'Jour 01 : Arrivée à Katmandou (1 400 m) et transfert à l\'hôtel 5 étoiles'],
            ['en' => 'Day 02-03: Permit processing, expedition briefing and gear check in Kathmandu', 'fr' => 'Jour 02-03 : Obtention des permis, briefing d\'expédition et vérification du matériel à Katmandou'],
            ['en' => 'Day 04: Fly Kathmandu to Lukla (2 840 m), trek to Phakding (2 610 m)', 'fr' => 'Jour 04 : Vol Katmandou – Lukla (2 840 m), trek jusqu\'à Phakding (2 610 m)'],
            ['en' => 'Day 05: Trek Phakding to Namche Bazaar (3 440 m)', 'fr' => 'Jour 05 : Trek Phakding – Namche Bazaar (3 440 m)'],
            ['en' => 'Day 06: Acclimatisation day in Namche Bazaar — hike to Everest View Hotel', 'fr' => 'Jour 06 : Journée d\'acclimatation à Namche Bazaar — randonnée jusqu\'à l\'hôtel Everest View'],
            ['en' => 'Day 07: Trek Namche to Thyangboche (3 860 m) — visit Tengboche Monastery', 'fr' => 'Jour 07 : Trek Namche – Thyangboche (3 860 m) — visite du monastère de Tengboche'],
            ['en' => 'Day 08: Trek Thyangboche to Dingboche (4 410 m)', 'fr' => 'Jour 08 : Trek Thyangboche – Dingboche (4 410 m)'],
            ['en' => 'Day 09-11: Acclimatisation rotation at Dingboche — Nangkartshang Peak (5 083 m)', 'fr' => 'Jour 09-11 : Rotation d\'acclimatation à Dingboche — pic Nangkartshang (5 083 m)'],
            ['en' => 'Day 12: Trek Dingboche to Lobuche (4 940 m)', 'fr' => 'Jour 12 : Trek Dingboche – Lobuche (4 940 m)'],
            ['en' => 'Day 13: Trek Lobuche to Everest Base Camp (5 364 m) — arrival, personal tent assignment', 'fr' => 'Jour 13 : Trek Lobuche – camp de base de l\'Everest (5 364 m) — arrivée, attribution de la tente individuelle'],
            ['en' => 'Day 14-16: Rest, puja ceremony and final gear sorting at Base Camp', 'fr' => 'Jour 14-16 : Repos, cérémonie de la puja et derniers préparatifs du matériel au camp de base'],
            ['en' => 'Day 17-58: Acclimatisation rotations to Camps 1, 2 and 3, then summit push of Mt. Everest (8 849 m) via the South-East Ridge', 'fr' => 'Jour 17-58 : Rotations d\'acclimatation aux camps 1, 2 et 3, puis assaut final du Mont Everest (8 849 m) par l\'arête sud-est'],
            ['en' => 'Day 59: Withdraw to Base Camp — clean-up and pack-down', 'fr' => 'Jour 59 : Repli au camp de base — nettoyage et démontage'],
            ['en' => 'Day 60-62: Return trek to Namche Bazaar, or optional helicopter return from Pheriche', 'fr' => 'Jour 60-62 : Trek de retour à Namche Bazaar, ou retour optionnel en hélicoptère depuis Pheriche'],
            ['en' => 'Day 63: Trek/heli Namche or Lukla to Kathmandu — celebration dinner', 'fr' => 'Jour 63 : Trek/hélicoptère Namche ou Lukla – Katmandou — dîner de célébration'],
            ['en' => 'Day 64: Free day in Kathmandu — shopping, debrief and certificate ceremony', 'fr' => 'Jour 64 : Journée libre à Katmandou — shopping, débriefing et remise des certificats'],
            ['en' => 'Day 65: Departure transfer to Kathmandu international airport', 'fr' => 'Jour 65 : Transfert de départ à l\'aéroport international de Katmandou'],
        ];
    }

    /* ------------------------------------------------------------------ *
     *  LUXURY TIER
     * ------------------------------------------------------------------ */

    private function seedLuxury(): void
    {
        $exp = $this->findByEnTitle('Mt. Everest Expedition — Luxury');
        if (! $exp) {
            $this->command?->warn('Luxury Everest expedition not found — skipping.');
            return;
        }

        if (blank($exp->getTranslation('title', 'fr', false))) {
            $exp->setTranslation('title', 'fr', 'Expédition au Mont Everest — Luxe');
        }

        if (blank($exp->getTranslation('description', 'fr', false))) {
            $exp->setTranslation('description', 'fr', $this->luxuryDescriptionFr());
        }

        if (blank($exp->getTranslation('best_time_for_expedition', 'fr', false))) {
            $exp->setTranslation('best_time_for_expedition', 'fr', 'Saison de printemps (avril–mai)');
        }

        if (! $exp->grade)              $exp->grade = '9';
        if (! $exp->starting_point)     $exp->starting_point = 'Kathmandu';
        if (! $exp->ending_point)       $exp->ending_point = 'Kathmandu';
        if (! $exp->starting_altitude)  $exp->starting_altitude = 1400;
        if (! $exp->highest_altitude)   $exp->highest_altitude = 8849;
        if (! $exp->duration)           $exp->duration = 45;
        if (! $exp->expedition_difficulty) $exp->expedition_difficulty = TrekDifficulty::CHALLENGING;

        if (empty($exp->getTranslation('costs_include', 'en', false))) {
            $exp->setTranslation('costs_include', 'en', $this->luxuryCostsInclude());
        }
        if (empty($exp->getTranslation('costs_exclude', 'en', false))) {
            $exp->setTranslation('costs_exclude', 'en', $this->luxuryCostsExclude());
        }

        $exp->save();

        $exp->destinations()->syncWithoutDetaching(
            $this->destinationIds(['Everest Base Camp', 'Namche Bazaar', 'Tengboche Monastery', 'Dingboche', 'Pheriche'])
        );

        if ($exp->keyHighlights()->count() === 0) {
            foreach ($this->luxuryKeyHighlights() as $row) {
                $kh = new KeyHighlight;
                $kh->highlightable_id = $exp->id;
                $kh->highlightable_type = Expedition::class;
                $kh->setTranslation('title', 'en', $row['title_en']);
                $kh->setTranslation('title', 'fr', $row['title_fr']);
                $kh->setTranslation('description', 'en', $row['desc_en']);
                $kh->setTranslation('description', 'fr', $row['desc_fr']);
                $kh->save();
            }
        }

        if ($exp->essentialTips()->count() === 0) {
            foreach ($this->luxuryEssentialTips() as $row) {
                $et = new EssentialTip;
                $et->tippable_id = $exp->id;
                $et->tippable_type = Expedition::class;
                $et->setTranslation('title', 'en', $row['title_en']);
                $et->setTranslation('title', 'fr', $row['title_fr']);
                $et->setTranslation('description', 'en', $row['desc_en']);
                $et->setTranslation('description', 'fr', $row['desc_fr']);
                $et->save();
            }
        }

        if ($exp->itineraries()->count() === 0) {
            foreach ($this->luxuryItinerary() as $day) {
                $it = new Itinerary;
                $it->itinerable_id = $exp->id;
                $it->itinerable_type = Expedition::class;
                $it->setTranslation('title', 'en', $day['en']);
                $it->setTranslation('title', 'fr', $day['fr']);
                $it->save();
            }
        }

        $this->command?->info("Luxury Everest filled: dest=".$exp->destinations()->count()." kh=".$exp->keyHighlights()->count()." et=".$exp->essentialTips()->count()." itin=".$exp->itineraries()->count());
    }

    private function luxuryDescriptionFr(): string
    {
        return <<<'HTML'
<p>Notre formule Everest la plus complète. Service entièrement sur mesure, logistique héliportée, équipe sherpa dédiée, guide de montagne certifié IFMGA et hébergement de luxe au camp de base. Pour les alpinistes qui visent le sommet sans le moindre compromis logistique.</p>

<h2>Ce qui est inclus</h2>
<ul>
<li>2 sherpas d'altitude dédiés par client (1:1 plus un assistant)</li>
<li>Oxygène illimité à partir du camp 2</li>
<li>Tentes luxe chauffées privées au camp de base — chambre, salon, salle de bains attenante</li>
<li>Chef cuisinier personnel et service de majordome pendant toute l'expédition</li>
<li>Transferts hélicoptère Katmandou ↔ camp de base — aucune marche d'approche requise</li>
<li>Rotations d'acclimatation assistées par hélicoptère pour gagner du temps et réduire la fatigue</li>
<li>Guide de montagne certifié IFMGA aux côtés de l'équipe sherpa</li>
<li>Plan d'acclimatation personnalisé, entièrement sur mesure</li>
<li>Tous les permis, redevances, assurances et coordination des secours</li>
<li>Hébergement 5 étoiles à Katmandou avant et après l'expédition avec transferts privés</li>
</ul>

<h2>À qui s'adresse cette formule</h2>
<p>Aux alpinistes pour qui le temps et le confort comptent plus que le budget. Aux dirigeants disposant de peu de congés annuels qui visent le sommet en 45 jours plutôt qu'en 65. Aux alpinistes qui veulent la meilleure logistique possible.</p>

<h2>Différences avec la formule Premium</h2>
<p>La formule Premium offre un soutien sherpa en 1:1 et de l'oxygène supplémentaire. La formule Luxe ajoute la logistique hélicoptère, le chef cuisinier personnel, le guide IFMGA et la possibilité de raccourcir le calendrier de l'expédition grâce aux rotations héliportées. Premium reste le bon choix pour la plupart des clients souhaitant monter en gamme ; Luxe est destiné à ceux qui veulent absolument tout.</p>
HTML;
    }

    private function luxuryCostsInclude(): array
    {
        return [
            ['en' => 'Arrival & departure: VIP airport meet-and-greet and private vehicle transfers in Kathmandu.', 'fr' => 'Arrivée et départ : accueil VIP à l\'aéroport et transferts en véhicule privé à Katmandou.'],
            ['en' => 'Accommodation in Kathmandu: 6 nights in a 5-star luxury hotel (single suite, full board) pre- and post-expedition.', 'fr' => 'Hébergement à Katmandou : 6 nuits dans un hôtel 5 étoiles de luxe (suite individuelle, pension complète) avant et après l\'expédition.'],
            ['en' => 'Welcome and farewell dinners in fine-dining restaurants in Kathmandu.', 'fr' => 'Dîners de bienvenue et d\'adieu dans des restaurants gastronomiques à Katmandou.'],
            ['en' => 'Permits: Mt. Everest climbing permit and royalty, Sagarmatha National Park entry permit, Pasang Lhamu Rural Municipality entry permit, and Khumbu Icefall (SPCC) fee.', 'fr' => 'Permis : permis d\'ascension et redevance du Mt. Everest, permis d\'entrée du parc national de Sagarmatha, permis d\'entrée de la municipalité rurale de Pasang Lhamu et redevance de la cascade de glace du Khumbu (SPCC).'],
            ['en' => 'Helicopter transfers Kathmandu ↔ Lukla ↔ Base Camp — no walk-in required.', 'fr' => 'Transferts hélicoptère Katmandou ↔ Lukla ↔ camp de base — aucune marche d\'approche requise.'],
            ['en' => 'Helicopter-assisted acclimatization rotations between Base Camp and Pheriche/Dingboche.', 'fr' => 'Rotations d\'acclimatation assistées par hélicoptère entre le camp de base et Pheriche/Dingboche.'],
            ['en' => 'Private luxury heated tents at Base Camp — separate bedroom, lounge area, en-suite bathroom with hot shower.', 'fr' => 'Tentes de luxe chauffées privées au camp de base — chambre séparée, espace salon et salle de bains attenante avec douche chaude.'],
            ['en' => 'Personal chef and butler service throughout the expedition, with bespoke menu planning.', 'fr' => 'Chef cuisinier personnel et service de majordome pendant toute l\'expédition, avec menus sur mesure.'],
            ['en' => 'Espresso machine, fresh bakery, wine cellar and lounge tent with satellite TV at Base Camp.', 'fr' => 'Machine à expresso, boulangerie fraîche, cave à vin et tente salon avec télévision satellite au camp de base.'],
            ['en' => 'High-quality double-walled climbing tents at Camps 1, 2, 3 and 4 (single occupancy where possible).', 'fr' => 'Tentes d\'altitude double paroi haut de gamme aux camps 1, 2, 3 et 4 (occupation individuelle dans la mesure du possible).'],
            ['en' => '2 dedicated climbing Sherpas per client (1 lead Sherpa + 1 assistant Sherpa) for the entire expedition.', 'fr' => '2 sherpas d\'altitude dédiés par client (1 sherpa principal + 1 sherpa assistant) pour toute l\'expédition.'],
            ['en' => 'Unlimited supplementary oxygen from Camp 2 upward — 4 L masks, regulators, sleeping flow at all high camps.', 'fr' => 'Oxygène supplémentaire illimité à partir du camp 2 — masques 4 L, régulateurs, flux sommeil dans tous les camps d\'altitude.'],
            ['en' => 'UIAGM/IFMGA-certified Western mountain guide leading the expedition (single-client guide ratio available on request).', 'fr' => 'Guide de montagne occidental certifié UIAGM/IFMGA dirigeant l\'expédition (ratio guide-client individuel disponible sur demande).'],
            ['en' => 'Custom, bespoke acclimatization schedule planned around your fitness and weather windows.', 'fr' => 'Plan d\'acclimatation personnalisé et sur mesure, conçu en fonction de votre forme physique et des fenêtres météo.'],
            ['en' => 'Higher-grade 8 000 m down suit and 8 000 m boot allocation for the expedition (to keep).', 'fr' => 'Combinaison duvet 8 000 m et chaussures 8 000 m de gamme supérieure attribuées pour l\'expédition (à conserver).'],
            ['en' => 'Fixed lines, ice screws, snow bars, anchors and all technical climbing hardware at every camp.', 'fr' => 'Cordes fixes, broches à glace, ancres à neige et tout le matériel technique d\'escalade à chaque camp.'],
            ['en' => 'Mountain gas, kerosene and cooking fuel at all camps.', 'fr' => 'Gaz de montagne, kérosène et combustible de cuisine à tous les camps.'],
            ['en' => 'Solar power, generator backup and high-bandwidth Starlink internet at Base Camp.', 'fr' => 'Énergie solaire, générateur de secours et Internet Starlink à haut débit au camp de base.'],
            ['en' => 'Personal satellite phone and tracker for the duration of the expedition.', 'fr' => 'Téléphone satellite et balise de suivi personnels pour toute la durée de l\'expédition.'],
            ['en' => 'Base Camp manager, head cook, kitchen brigade, high-altitude porters and runners.', 'fr' => 'Gérant du camp de base, chef de cuisine, brigade de cuisine, porteurs d\'altitude et coursiers.'],
            ['en' => 'Salary, food, lodging, comprehensive insurance, premium equipment and summit bonuses for all Sherpas and staff.', 'fr' => 'Salaire, nourriture, hébergement, assurance complète, équipement haut de gamme et primes de sommet pour tous les sherpas et le personnel.'],
            ['en' => 'Government Liaison Officer with full equipment, salary and insurance.', 'fr' => 'Agent de liaison gouvernemental avec équipement complet, salaire et assurance.'],
            ['en' => 'Expedition doctor permanently at Base Camp throughout the climb.', 'fr' => 'Médecin d\'expédition présent en permanence au camp de base pendant toute l\'ascension.'],
            ['en' => 'Fully-equipped Base Camp medical facility, hyperbaric chamber (Gamow bag) and AED.', 'fr' => 'Infirmerie entièrement équipée au camp de base, caisson hyperbare (sac Gamow) et défibrillateur (AED).'],
            ['en' => 'Pulse oximeter, blood-oxygen monitoring and weather forecasting from a dedicated meteorologist.', 'fr' => 'Oxymètre de pouls, surveillance de l\'oxygène sanguin et prévisions météo par un météorologue dédié.'],
            ['en' => 'Priority emergency rescue and evacuation coordination (helicopter rescue costs covered by your insurance).', 'fr' => 'Coordination prioritaire des secours et de l\'évacuation d\'urgence (frais d\'évacuation par hélicoptère couverts par votre assurance).'],
            ['en' => 'Guaranteed helicopter return Base Camp → Kathmandu after summit, with weather priority slot.', 'fr' => 'Retour hélicoptère garanti camp de base → Katmandou après le sommet, avec créneau prioritaire météo.'],
            ['en' => 'Professional expedition photographer/videographer documenting your summit (raw footage delivered).', 'fr' => 'Photographe/vidéaste d\'expédition professionnel documentant votre sommet (rushes livrés).'],
            ['en' => 'Garbage deposit fee and full Leave-No-Trace expedition cleanup.', 'fr' => 'Caution sur les déchets et nettoyage complet de l\'expédition selon les principes "Ne laisser aucune trace".'],
            ['en' => 'Premium Sherpalaya kit: duffel bag, expedition jacket, summit print and framed summit certificate.', 'fr' => 'Trousseau Sherpalaya Premium : sac de voyage, veste d\'expédition, tirage du sommet et certificat de sommet encadré.'],
            ['en' => 'All government taxes, VAT and office service charges.', 'fr' => 'Toutes les taxes gouvernementales, TVA et frais de service de bureau.'],
        ];
    }

    private function luxuryCostsExclude(): array
    {
        return [
            ['en' => 'International airfare to and from Kathmandu (business-class upgrades available on request).', 'fr' => 'Vols internationaux vers et depuis Katmandou (surclassement en classe affaires disponible sur demande).'],
            ['en' => 'Nepal entry visa fee (available on arrival at Kathmandu airport).', 'fr' => 'Frais de visa d\'entrée au Népal (disponible à l\'arrivée à l\'aéroport de Katmandou).'],
            ['en' => 'Personal travel and medical insurance with emergency helicopter evacuation cover up to 8 850 m (mandatory).', 'fr' => 'Assurance voyage et médicale personnelle avec couverture d\'évacuation d\'urgence par hélicoptère jusqu\'à 8 850 m (obligatoire).'],
            ['en' => 'Personal climbing gear (8 000 m boots, harness, ice axe, crampons, climbing helmet). Premium rentals available in Kathmandu on request.', 'fr' => 'Équipement personnel d\'alpinisme (chaussures 8 000 m, harnais, piolet, crampons, casque). Location de matériel premium possible à Katmandou sur demande.'],
            ['en' => 'Alcoholic beverages outside the included wine cellar selection.', 'fr' => 'Boissons alcoolisées hors de la sélection incluse à la cave à vin.'],
            ['en' => 'Personal communications: international satellite calls beyond the included allowance.', 'fr' => 'Communications personnelles : appels satellite internationaux au-delà de l\'allocation incluse.'],
            ['en' => 'Summit bonus for Sherpas (customary: USD 2 000–2 500 if summit is reached).', 'fr' => 'Prime de sommet pour les sherpas (d\'usage : 2 000–2 500 USD en cas de réussite au sommet).'],
            ['en' => 'Tips for guide, chef and Base Camp staff (customary: USD 1 000–1 500 per climber for the full expedition).', 'fr' => 'Pourboires pour le guide, le chef cuisinier et le personnel du camp de base (d\'usage : 1 000–1 500 USD par alpiniste pour l\'ensemble de l\'expédition).'],
            ['en' => 'Single-client guide ratio upgrade (private IFMGA guide).', 'fr' => 'Surclassement en ratio guide individuel (guide IFMGA privé).'],
            ['en' => 'Additional helicopter charters beyond the included transfers and acclimatization rotations.', 'fr' => 'Vols hélicoptère supplémentaires au-delà des transferts et rotations d\'acclimatation inclus.'],
            ['en' => 'Emergency rescue, hospital and repatriation costs (covered by your insurance).', 'fr' => 'Frais de secours d\'urgence, d\'hospitalisation et de rapatriement (couverts par votre assurance).'],
            ['en' => 'Anything not specifically listed under "Costs include".', 'fr' => 'Tout ce qui n\'est pas explicitement listé dans « Coûts inclus ».'],
        ];
    }

    private function luxuryKeyHighlights(): array
    {
        return [
            ['title_en' => 'Helicopter Logistics — No Walk-In Required', 'title_fr' => 'Logistique hélicoptère — aucune marche d\'approche',
             'desc_en' => 'Skip the multi-day trek to Base Camp entirely. Fly Kathmandu → Lukla → Base Camp by private helicopter, with weather-window priority. The same applies to post-summit return, getting you home days earlier.',
             'desc_fr' => 'Évitez complètement le trek de plusieurs jours jusqu\'au camp de base. Vol Katmandou → Lukla → camp de base en hélicoptère privé, avec accès prioritaire aux fenêtres météo. Idem pour le retour après le sommet : rentrez plusieurs jours plus tôt.'],
            ['title_en' => '2:1 Sherpa Ratio + IFMGA Mountain Guide', 'title_fr' => 'Ratio sherpa 2:1 et guide de montagne IFMGA',
             'desc_en' => 'A dedicated lead Sherpa plus an assistant Sherpa for every client — twice the support of our Premium tier — alongside a UIAGM/IFMGA-certified mountain guide who oversees the entire expedition.',
             'desc_fr' => 'Un sherpa principal dédié plus un sherpa assistant pour chaque client — deux fois le soutien de notre formule Premium — aux côtés d\'un guide de montagne certifié UIAGM/IFMGA qui supervise l\'ensemble de l\'expédition.'],
            ['title_en' => 'Unlimited Oxygen from Camp 2', 'title_fr' => 'Oxygène illimité à partir du camp 2',
             'desc_en' => 'No bottle counting. Sleeping flow at every high camp, continuous flow on summit day, and emergency reserves stashed at every camp. This is the single biggest safety upgrade money can buy on Everest.',
             'desc_fr' => 'Aucun comptage de bouteilles. Flux sommeil à chaque camp d\'altitude, flux continu le jour du sommet, et réserves d\'urgence à chaque camp. C\'est la plus grande amélioration de sécurité qu\'on puisse s\'offrir sur l\'Everest.'],
            ['title_en' => 'Private Luxury Tents + Personal Chef at Base Camp', 'title_fr' => 'Tentes luxe privées et chef personnel au camp de base',
             'desc_en' => 'Your own heated tent with separate sleeping and lounge areas, hot shower, and a private toilet. A personal chef prepares fresh meals to your preferences — meaningful recovery during the 30+ days at altitude.',
             'desc_fr' => 'Votre propre tente chauffée avec espaces de couchage et salon séparés, douche chaude et toilettes privées. Un chef personnel prépare des repas frais selon vos préférences — une vraie récupération durant les 30+ jours passés en altitude.'],
            ['title_en' => 'Compressed 45-Day Schedule', 'title_fr' => 'Calendrier compressé de 45 jours',
             'desc_en' => 'Helicopter-assisted acclimatization rotations between Base Camp, Pheriche and Dingboche let you trim 20+ days off the standard 65-day expedition. Ideal for executives with limited annual leave.',
             'desc_fr' => 'Les rotations d\'acclimatation assistées par hélicoptère entre le camp de base, Pheriche et Dingboche permettent de retrancher 20+ jours par rapport à l\'expédition standard de 65 jours. Idéal pour les dirigeants disposant de peu de congés.'],
        ];
    }

    private function luxuryEssentialTips(): array
    {
        return [
            ['title_en' => 'Helicopter Acclimatization Still Requires Experience', 'title_fr' => 'L\'acclimatation héliportée exige malgré tout de l\'expérience',
             'desc_en' => 'Faster does not mean easier. Compressed schedules are demanding on the body. You should have summited at least one 6 000 m peak and ideally one 7 000 m peak in the 12 months prior.',
             'desc_fr' => 'Plus rapide ne signifie pas plus facile. Les calendriers compressés sont exigeants pour l\'organisme. Vous devez avoir sommité au moins un sommet de 6 000 m et idéalement un sommet de 7 000 m dans les 12 mois précédents.'],
            ['title_en' => 'Insurance Must Cover Helicopter Evacuation to 8 850 m', 'title_fr' => 'L\'assurance doit couvrir l\'évacuation par hélicoptère jusqu\'à 8 850 m',
             'desc_en' => 'Even with our included helicopter logistics, you need a specialist policy (Global Rescue, Ripcord, IHI Bupa) with explicit cover for high-altitude rescue, medical evacuation and trip interruption.',
             'desc_fr' => 'Même avec notre logistique hélicoptère incluse, vous devez souscrire une police spécialisée (Global Rescue, Ripcord, IHI Bupa) couvrant explicitement le secours à haute altitude, l\'évacuation médicale et l\'interruption de voyage.'],
            ['title_en' => 'Train for Power-Endurance, Not Just Cardio', 'title_fr' => 'Entraînez-vous en puissance-endurance, pas seulement en cardio',
             'desc_en' => 'The Luxury timeline compresses acclimatization, so your fitness baseline must be higher. Add weighted-vest stair climbing and 4–6 hour zone-2 sessions to your 6-month training plan.',
             'desc_fr' => 'Le calendrier Luxe compresse l\'acclimatation : votre niveau de forme de départ doit donc être plus élevé. Ajoutez de la montée d\'escaliers en gilet lesté et des séances zone 2 de 4 à 6 heures à votre plan d\'entraînement de 6 mois.'],
            ['title_en' => 'Communicate Dietary and Comfort Preferences in Advance', 'title_fr' => 'Communiquez vos préférences alimentaires et de confort à l\'avance',
             'desc_en' => 'Your personal chef and butler tailor everything to you — but only if we know. Share dietary restrictions, allergies, favourite recovery meals and pillow firmness preferences during booking.',
             'desc_fr' => 'Votre chef personnel et votre majordome adaptent tout à votre profil — mais uniquement si nous le savons. Communiquez vos restrictions alimentaires, allergies, repas de récupération préférés et fermeté d\'oreiller souhaitée lors de la réservation.'],
            ['title_en' => 'Plan Helicopter Days Around Weather, Not Schedule', 'title_fr' => 'Planifiez les jours d\'hélicoptère selon la météo, pas selon le calendrier',
             'desc_en' => 'Lukla and Base Camp flights are weather-dependent and can shift by 24–48 hours. Our team holds priority slots, but build flexibility into your post-expedition flights — never book a tight return.',
             'desc_fr' => 'Les vols vers Lukla et le camp de base dépendent de la météo et peuvent être décalés de 24 à 48 heures. Notre équipe réserve des créneaux prioritaires, mais prévoyez de la flexibilité dans vos vols de retour — jamais de réservation serrée.'],
        ];
    }

    private function luxuryItinerary(): array
    {
        return [
            ['en' => 'Day 01: Arrival in Kathmandu (1 400 m) — VIP airport meet, transfer to 5★ hotel suite', 'fr' => 'Jour 01 : Arrivée à Katmandou (1 400 m) — accueil VIP à l\'aéroport, transfert vers la suite de l\'hôtel 5 étoiles'],
            ['en' => 'Day 02-03: Kathmandu — permit processing, gear briefing and bespoke welcome programme', 'fr' => 'Jour 02-03 : Katmandou — obtention des permis, briefing matériel et programme de bienvenue sur mesure'],
            ['en' => 'Day 04: Private helicopter charter Kathmandu → Lukla → Everest Base Camp (5 364 m); luxury tent assignment', 'fr' => 'Jour 04 : Vol privé en hélicoptère Katmandou → Lukla → camp de base de l\'Everest (5 364 m) ; attribution de la tente de luxe'],
            ['en' => 'Day 05-07: Acclimatisation at Base Camp — short hikes, gear sorting, puja ceremony, recovery in heated lounge tent', 'fr' => 'Jour 05-07 : Acclimatation au camp de base — courtes randonnées, préparation du matériel, cérémonie de la puja, récupération dans la tente salon chauffée'],
            ['en' => 'Day 08: Helicopter rotation Base Camp → Pheriche (4 240 m) for sleep-low acclimatisation', 'fr' => 'Jour 08 : Rotation hélicoptère camp de base → Pheriche (4 240 m) pour acclimatation en dormant plus bas'],
            ['en' => 'Day 09-11: Acclimatisation at Pheriche/Dingboche — Nangkartshang Peak (5 083 m) day hike', 'fr' => 'Jour 09-11 : Acclimatation à Pheriche/Dingboche — randonnée à la journée au pic Nangkartshang (5 083 m)'],
            ['en' => 'Day 12: Helicopter rotation back to Base Camp', 'fr' => 'Jour 12 : Rotation hélicoptère retour au camp de base'],
            ['en' => 'Day 13-15: First rotation — climb to Camp 1 (6 065 m) and Camp 2 (6 400 m), return to BC', 'fr' => 'Jour 13-15 : Première rotation — ascension au camp 1 (6 065 m) et au camp 2 (6 400 m), retour au camp de base'],
            ['en' => 'Day 16-17: Rest, chef-prepared recovery meals and massage at Base Camp', 'fr' => 'Jour 16-17 : Repos, repas de récupération préparés par le chef et massage au camp de base'],
            ['en' => 'Day 18-21: Second rotation — climb to Camp 2, touch Camp 3 (7 200 m), return to BC', 'fr' => 'Jour 18-21 : Deuxième rotation — ascension au camp 2, passage au camp 3 (7 200 m), retour au camp de base'],
            ['en' => 'Day 22-24: Rest and weather-window briefings with the meteorologist at Base Camp', 'fr' => 'Jour 22-24 : Repos et briefings sur la fenêtre météo avec le météorologue au camp de base'],
            ['en' => 'Day 25-29: Summit push — Camp 2 → Camp 3 → Camp 4 (South Col, 7 950 m) → Summit (8 849 m) → descent to BC', 'fr' => 'Jour 25-29 : Assaut final — camp 2 → camp 3 → camp 4 (col Sud, 7 950 m) → sommet (8 849 m) → descente au camp de base'],
            ['en' => 'Day 30-32: Contingency / weather-window buffer at Base Camp', 'fr' => 'Jour 30-32 : Jours de réserve / fenêtre météo au camp de base'],
            ['en' => 'Day 33: Pack-down, Sherpa puja ceremony and farewell celebration at Base Camp', 'fr' => 'Jour 33 : Démontage, cérémonie de la puja avec les sherpas et célébration d\'adieu au camp de base'],
            ['en' => 'Day 34: Private helicopter return Base Camp → Lukla → Kathmandu — 5★ hotel suite check-in', 'fr' => 'Jour 34 : Retour en hélicoptère privé camp de base → Lukla → Katmandou — installation dans la suite de l\'hôtel 5 étoiles'],
            ['en' => 'Day 35-44: Buffer days for weather contingency, spa recovery and Kathmandu cultural programme', 'fr' => 'Jour 35-44 : Jours tampon pour aléas météo, récupération au spa et programme culturel à Katmandou'],
            ['en' => 'Day 45: Private transfer to Kathmandu international airport for departure', 'fr' => 'Jour 45 : Transfert privé à l\'aéroport international de Katmandou pour le départ'],
        ];
    }
}
