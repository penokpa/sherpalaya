<?php

namespace Database\Seeders;

use App\Models\Trek;
use Illuminate\Database\Seeder;

/**
 * Write original descriptions for the 35 HWW-mirrored treks and publish them.
 *
 * Voice: Sherpa-owned, four generations, honest, slightly contrarian (matches
 * the existing journal posts). Each description is original — not copied from
 * HWW — so Google indexes it as fresh content for Sherpalaya.
 *
 * Idempotent: safe to re-run. Updates the description (English locale only,
 * French preserved), refreshes best_time_for_trek, and publishes the trek
 * if it was a draft.
 */
class TrekContentSeeder extends Seeder
{
    public function run(): void
    {
        $updated = 0;
        $publishedNow = 0;
        $missing = [];

        foreach ($this->content() as $title => $data) {
            $trek = $this->findTrekByTitle($title);
            if (! $trek) {
                $missing[] = $title;
                continue;
            }

            $trek->setTranslation('description', 'en', $data['description']);
            if (isset($data['season'])) {
                $trek->setTranslation('best_time_for_trek', 'en', $data['season']);
            }
            if ($trek->published_at === null) {
                $trek->published_at = now();
                $publishedNow++;
            }
            $trek->save();
            $updated++;
        }

        $this->command->info("Trek content: {$updated} updated, {$publishedNow} newly published");
        if ($missing) {
            $this->command->warn('  not found: ' . implode(', ', $missing));
        }
    }

    private function findTrekByTitle(string $title): ?Trek
    {
        $needle = mb_strtolower(trim($title));
        foreach (Trek::query()->get() as $trek) {
            $candidate = mb_strtolower(trim((string) $trek->getTranslation('title', 'en', false)));
            if ($candidate === $needle) {
                return $trek;
            }
        }
        return null;
    }

    /**
     * Title => ['description' => HTML, 'season' => short string]
     */
    private function content(): array
    {
        return array_merge(
            $this->everestContent(),
            $this->annapurnaContent(),
            $this->langtangContent(),
            $this->dolpoContent(),
            $this->mustangContent(),
            $this->kanchenjungaContent(),
            $this->makaluContent(),
            $this->rolwalingContent(),
            $this->dhaulagiriContent(),
            $this->farWestContent(),
        );
    }

    // ═══════════════════════════════════════════════════════════════════════
    // EVEREST
    // ═══════════════════════════════════════════════════════════════════════

    private function everestContent(): array
    {
        return [
            'Pikey Peak Trek' => [
                'season'      => 'October–December · March–May',
                'description' => <<<'HTML'
<p>Pikey Peak is the trek Edmund Hillary called the best viewpoint in the Khumbu, and nobody believed him until they walked up there themselves. Lower than the famous Everest Base Camp route, quieter than Gokyo, and a thousand metres of altitude friendlier — Pikey is what we send first-time Himalaya trekkers on when they want the Everest view without the suffering.</p>

<h2>Why this trek</h2>
<ul>
<li>Eight 8,000m peaks visible from the summit — Everest, Lhotse, Makalu, Cho Oyu, Kanchenjunga, Dhaulagiri, Annapurna, Manaslu — on a clear morning.</li>
<li>Max altitude 4,065 m. No serious altitude risk, suitable for any reasonably fit adult.</li>
<li>Solu region villages — Sherpa culture without the Khumbu's commercial bustle.</li>
<li>No flight to Lukla required. Drive in from Kathmandu, walk a low-altitude loop, drive out.</li>
</ul>

<p>The route climbs from terraced farmland through rhododendron forest to alpine pasture, with the summit pre-dawn push on day five. Most groups are back in Kathmandu by day nine. We run this trek with a single guide and one porter per two trekkers — small group, real Sherpa pace.</p>
HTML,
            ],

            'Salleri to Everest Base Camp Trek' => [
                'season'      => 'October–November · March–May',
                'description' => <<<'HTML'
<p>The Lukla flight is the most expensive single component of an Everest Base Camp trek, and it gets cancelled. The Salleri route skips it. Drive 8–10 hours from Kathmandu to Salleri (2,400 m), then walk the lower Solu corridor up to Lukla and join the classic Khumbu trail to Base Camp. It adds three days to the standard EBC itinerary but saves the airfare and the weather lottery.</p>

<h2>Why this trek</h2>
<ul>
<li>Reliable transport — jeep in, walk out, no flight cancellations during shoulder seasons.</li>
<li>Lower altitudes on days 1–3 mean better acclimatization than the standard Lukla start.</li>
<li>Walks through villages most EBC trekkers never see — Junbesi, Ringmo, Taksindu.</li>
<li>Same Base Camp views as the classic route, at a lower total cost.</li>
</ul>

<p>This is our recommended itinerary for trekkers visiting in October–November when Lukla weather is unstable, or for anyone who finds small-plane flights stressful. The drive in is long but the lower-altitude opening days build leg fitness before the climb to Namche.</p>
HTML,
            ],

            'Ama Dablam Base Camp Trek' => [
                'season'      => 'October–November · March–May',
                'description' => <<<'HTML'
<p>Ama Dablam is the most photogenic mountain in the Khumbu — the one people point at thinking it's Everest. This trek climbs through the same Sherpa villages as the standard Everest Base Camp itinerary, then diverts off the main trail at Pangboche and up the lateral moraine to Ama Dablam Base Camp at 4,570 m.</p>

<h2>Why this trek</h2>
<ul>
<li>Shorter and friendlier than full EBC — nine days instead of fourteen.</li>
<li>Max altitude 4,570 m, well below the altitude-sickness threshold.</li>
<li>Direct views of Ama Dablam's south face from base camp, often used by expedition crews staging summit attempts in October.</li>
<li>Tengboche Monastery and Khumjung village included — full Sherpa cultural experience.</li>
</ul>

<p>Good fit for trekkers who want the Khumbu experience without committing to the full EBC time and altitude. We schedule this trek when clients want big mountain views and Sherpa culture in nine days or less.</p>
HTML,
            ],

            'Everest Base Camp Trek with Island Peak Climbing' => [
                'season'      => 'October–November · April–May',
                'description' => <<<'HTML'
<p>For trekkers ready to step into mountaineering. This itinerary follows the standard Everest Base Camp route, then continues to Chhukung and a guided summit attempt on Island Peak (Imja Tse, 6,189 m) — Nepal's most accessible 6,000-metre peak.</p>

<h2>Why this trek</h2>
<ul>
<li>EBC trek + a real Himalayan summit in 16 days.</li>
<li>Island Peak requires basic crampon and rope skills — we run a fixed-rope training day at Base Camp before the summit push.</li>
<li>Acclimatization is automatic: by the time you turn toward Island Peak you've already spent two weeks above 4,000 m.</li>
<li>Climbing permit, NMA peak fee, and technical guide included.</li>
</ul>

<h2>Requirements</h2>
<p>Strong fitness and prior multi-day trekking experience. No previous climbing required, but you'll be using an ice axe and front-point crampons for the summit ridge. We provide all technical gear.</p>
HTML,
            ],
        ];
    }

    // ═══════════════════════════════════════════════════════════════════════
    // ANNAPURNA
    // ═══════════════════════════════════════════════════════════════════════

    private function annapurnaContent(): array
    {
        return [
            'Annapurna Circuit Trek via Tilicho Lake' => [
                'season'      => 'October–November · April–May',
                'description' => <<<'HTML'
<p>The Annapurna Circuit with a two-day side trip to Tilicho Lake — at 4,919 m, one of the highest large lakes in the world, sitting in a glacial cirque under the Annapurna massif's north face. The detour adds days to the standard circuit but gives you a view almost no other trek in Nepal offers.</p>

<h2>Why this trek</h2>
<ul>
<li>Combines the classic Thorong La pass (5,416 m) with the Tilicho Lake detour.</li>
<li>16-day itinerary — the long version of the Annapurna Circuit, with extra acclimatization built in.</li>
<li>Walk through every ecosystem Nepal has — subtropical forest, alpine desert, high-altitude lake basin, and the dry Tibetan-influenced villages of Manang.</li>
<li>Tilicho Base Camp is a working tea house — overnight there, day-trip to the lake, return.</li>
</ul>

<p>We recommend this version of the circuit for repeat trekkers who've already done shorter Annapurna routes. The extra days make a real difference in acclimatization for the pass.</p>
HTML,
            ],

            'Nar Phu Valley and Mesokanto Pass Trek' => [
                'season'      => 'October · April–May',
                'description' => <<<'HTML'
<p>Nar and Phu are restricted-permit valleys in the rain shadow north of the Annapurnas — Tibetan-rooted villages closed to outsiders until 2003. This 18-day route combines a visit to Phu and Nar with the Mesokanto La (5,099 m), an alternative pass to the Thorong La used by trekkers who want to avoid the Thorong crowds.</p>

<h2>Why this trek</h2>
<ul>
<li>Restricted-area permit means low foot traffic — fewer than 1,500 trekkers per year visit Nar and Phu combined.</li>
<li>Tibetan Buddhist culture intact — yak herds, mani walls, gompas centuries old.</li>
<li>Mesokanto La is technically harder than Thorong La but quieter and more dramatic.</li>
<li>Connects to the Annapurna Circuit's Manang village, so you can extend or shorten.</li>
</ul>

<p>This is a trek for experienced Himalaya walkers comfortable with restricted-area logistics and long high-altitude days. We require a minimum group size of two — solo trekking isn't permitted by Nepal's restricted-area rules.</p>
HTML,
            ],

            'Australian Camp and Dhampus Trek' => [
                'season'      => 'October–April (year-round friendly)',
                'description' => <<<'HTML'
<p>The shortest "real" trek in the Annapurna region. Two nights in traditional Gurung villages above Pokhara, with sunrise views of Machhapuchhre (Fishtail) and Annapurna South from your tea house terrace. Four days total including travel — works as a weekend trip or a warm-up for longer treks.</p>

<h2>Why this trek</h2>
<ul>
<li>Low altitude — max 2,060 m at Australian Camp. No altitude risk, year-round accessible.</li>
<li>Fits in a long weekend from Kathmandu (or two days from Pokhara).</li>
<li>Hot showers, good food, comfortable lodges. Family-friendly.</li>
<li>Best price point we offer — ideal first taste of Nepal trekking.</li>
</ul>

<p>We run this trek almost every week. Good fit for families with school-age children, older trekkers, or anyone with limited time who wants the Himalayan tea-house experience without the commitment of a longer route.</p>
HTML,
            ],
        ];
    }

    // ═══════════════════════════════════════════════════════════════════════
    // LANGTANG, GOSAINKUNDA
    // ═══════════════════════════════════════════════════════════════════════

    private function langtangContent(): array
    {
        return [
            'Gosainkunda Trek' => [
                'season'      => 'March–May · September–November',
                'description' => <<<'HTML'
<p>Gosainkunda is a chain of high-altitude lakes at 4,380 m, sacred to both Hindus and Buddhists, set in a stark alpine bowl below Surya Peak. The trek up from Dhunche climbs through rhododendron forest into a landscape of moraine and prayer flags — the only major sacred Hindu site reachable on a multi-day Himalayan trek.</p>

<h2>Why this trek</h2>
<ul>
<li>Sacred lake site — pilgrims walk this route during the Janai Purnima festival in August.</li>
<li>Eight days, max altitude 4,380 m. Friendlier than Everest BC, more remote than Annapurna Sanctuary.</li>
<li>Direct trailhead from Kathmandu — no flights, jeep in to Dhunche, walk out via Sundarijal.</li>
<li>Can be combined with the Langtang Valley Trek for a 14-day Langtang-Gosainkunda loop.</li>
</ul>

<p>Our favourite trek for repeat clients who've done EBC or Annapurna and want something less commercialised. The Lauribina La pass adds a high point on the way out for trekkers wanting a circuit rather than out-and-back.</p>
HTML,
            ],

            'Helambu Cultural Trek' => [
                'season'      => 'October–May',
                'description' => <<<'HTML'
<p>Helambu is the trek for people who want Himalayan culture without the altitude. The route winds through Sherpa, Tamang, and Yolmo villages in the hills two hours north of Kathmandu — gompas, prayer wheels, and terraced villages, with the Langtang range as the backdrop instead of the destination.</p>

<h2>Why this trek</h2>
<ul>
<li>Max altitude 3,650 m — manageable for anyone in reasonable shape, no altitude pills needed.</li>
<li>Eight days, no flights, no jeep transfers — start and end at Sundarijal, an hour from Kathmandu.</li>
<li>Cultural depth: Yolmo Sherpa community, distinct from the Khumbu Sherpas, with their own dialect and traditions.</li>
<li>Year-round trekkable except July–August. Excellent winter option (December–February).</li>
</ul>

<p>This is the trek we send people on when they have a week and want the *feel* of Nepal trekking — tea houses, mountain villages, walking pace — without the altitude commitment of higher routes.</p>
HTML,
            ],
        ];
    }

    // ═══════════════════════════════════════════════════════════════════════
    // DOLPO
    // ═══════════════════════════════════════════════════════════════════════

    private function dolpoContent(): array
    {
        return [
            'Phoksundo Tea House Trek' => [
                'season'      => 'May–October',
                'description' => <<<'HTML'
<p>Shey Phoksundo Lake — the deepest lake in Nepal at 145 metres, the colour of glacier melt, surrounded by Bon Buddhist villages that look unchanged since the 15th century. This is the most accessible Dolpo trek, a tea-house route that doesn't require camping.</p>

<h2>Why this trek</h2>
<ul>
<li>Lower Dolpo permit only — significantly cheaper than the Upper Dolpo restricted-area permit.</li>
<li>Tea-house accommodation throughout — no camping equipment required.</li>
<li>Max altitude 3,733 m. Reasonable for any healthy adult.</li>
<li>Visits Ringmo village (the setting of the film <em>Himalaya</em>) and the ancient Bon Buddhist gompa above the lake.</li>
</ul>

<p>Dolpo trekking sits in the rain shadow north of Dhaulagiri, so this is the right trek for the monsoon months when most of Nepal is wet. We run this route from May through October — peak season here is the opposite of the Khumbu.</p>
HTML,
            ],

            'Lower Dolpo Circuit Trek' => [
                'season'      => 'May–October',
                'description' => <<<'HTML'
<p>The longer, harder version of the Phoksundo route. After the lake, the trail crosses two high passes (Kang La at 5,360 m and Numa La at 5,190 m) into the Tarap Valley — one of the highest permanently inhabited valleys in the world. 18 days of remote, dramatic walking.</p>

<h2>Why this trek</h2>
<ul>
<li>Two high passes both above 5,000 m — sustained altitude challenge without summit attempts.</li>
<li>Tarap Valley villages — Dho Tarap is at 4,090 m and lived in year-round.</li>
<li>Walks the same landscape Peter Matthiessen wrote about in <em>The Snow Leopard</em>.</li>
<li>Camping-supported — we carry tents and a kitchen crew. Tea houses don't exist past Phoksundo.</li>
</ul>

<p>This is a committing trek. Long days, real altitude, and a camping logistic. We run it with a full crew (cook, kitchen assistant, porters) and IFMGA-trained Sherpa guides. Strong fitness required and previous high-altitude experience strongly preferred.</p>
HTML,
            ],

            'Upper Dolpo to Mustang Trek' => [
                'season'      => 'June–September',
                'description' => <<<'HTML'
<p>Twenty-five days of true Trans-Himalayan trekking. Start in Juphal, cross Phoksundo Lake into Upper Dolpo, traverse the high arid plateau through Shey Gompa and Saldang villages, then cross into Upper Mustang via the Jungben La pass and walk out to Jomsom. One of the great expedition treks of Nepal.</p>

<h2>Why this trek</h2>
<ul>
<li>Two restricted-area permits required (Upper Dolpo + Upper Mustang) — fewer than 200 trekkers do this route in a typical year.</li>
<li>Highest sleeping altitudes around 4,800 m, max pass 5,550 m.</li>
<li>Tibetan-rooted Buddhist culture preserved by isolation — Shey Gompa is one of the oldest monasteries in the Himalaya.</li>
<li>Full camping logistic — fly in to Juphal, fly out from Jomsom, 25 days self-contained between.</li>
</ul>

<p>The most demanding trek in our portfolio. We run it for experienced trekkers who've already done a major Himalayan circuit and want a real expedition without the climbing.</p>
HTML,
            ],

            'Dolpo to Rara Trek' => [
                'season'      => 'May–October',
                'description' => <<<'HTML'
<p>The 25-day crossing from Dolpo's Phoksundo region to Rara Lake in the far west — through the Mugu and Jumla districts, over the Kagmara La (5,115 m), and into the largest lake in Nepal. This route is rarely trekked: maybe twenty foreigners attempt it in a year.</p>

<h2>Why this trek</h2>
<ul>
<li>Connects two of Nepal's most beautiful lake destinations on a single foot route.</li>
<li>Travels through districts that see almost zero tourism — Mugu has one of the lowest human development indices in Nepal.</li>
<li>Full camping logistic. No tea houses outside the main villages.</li>
<li>Kagmara La crossing is the high point, with views of the Kanjirowa Himal.</li>
</ul>

<p>Price for this route varies considerably with group size and logistics — get in touch and we'll build a detailed quote based on dates and group size.</p>
HTML,
            ],
        ];
    }

    // ═══════════════════════════════════════════════════════════════════════
    // MUSTANG
    // ═══════════════════════════════════════════════════════════════════════

    private function mustangContent(): array
    {
        return [
            'Tiji Festival in Upper Mustang' => [
                'season'      => 'May (festival dates vary by year)',
                'description' => <<<'HTML'
<p>Tiji is the most important festival in Upper Mustang — three days of masked dances at the royal court of Lo Manthang, performed by monks of Chhoede monastery. The dances narrate the victory of Dorje Jono over a demon that brought drought to the kingdom. The festival has been performed annually for five centuries.</p>

<h2>Why this trek</h2>
<ul>
<li>Time-locked cultural event — the festival happens once a year and the dates are set by the Tibetan lunar calendar (usually mid-to-late May).</li>
<li>Restricted-area permit (USD 500 per 10 days) keeps numbers low — under 500 trekkers attend Tiji in a typical year.</li>
<li>Trekking route follows the classic Upper Mustang trail through Lo Manthang, with festival viewing scheduled into the itinerary.</li>
<li>Max altitude 3,800 m, gentle by Himalayan standards — the difficulty is the dry desert terrain, not the altitude.</li>
</ul>

<p>We run two Tiji departures each year. Book at least four months ahead — restricted-area permits are limited and festival weeks sell out.</p>
HTML,
            ],

            'Yartung Horse Riding Festival' => [
                'season'      => 'August (festival dates vary)',
                'description' => <<<'HTML'
<p>Yartung is Upper Mustang's late-summer festival — three days of horse races, dancing, and chang drinking on the dry plains outside Lo Manthang. Where Tiji is solemn and masked, Yartung is loud, social, and physical. The horse races are the centrepiece: Lopa horsemen race the open valleys north of the city, bareback, in costume.</p>

<h2>Why this trek</h2>
<ul>
<li>Only Himalayan festival built around horse racing.</li>
<li>Falls in late August — Mustang sits in the rain shadow, so monsoon trekking is possible here when the rest of Nepal is wet.</li>
<li>Same restricted-area permit and trekking route as the classic Upper Mustang itinerary.</li>
<li>Less commercial than Tiji — almost no foreign visitors at Yartung.</li>
</ul>

<p>We schedule one Yartung departure each year, dates set against the festival calendar. Get in touch in February for the current year's confirmed dates.</p>
HTML,
            ],
        ];
    }

    // ═══════════════════════════════════════════════════════════════════════
    // KANCHENJUNGA
    // ═══════════════════════════════════════════════════════════════════════

    private function kanchenjungaContent(): array
    {
        return [
            'Kanchenjunga North Base Camp Trek' => [
                'season'      => 'October–November · April–May',
                'description' => <<<'HTML'
<p>Kanchenjunga is the third-highest mountain in the world and one of the most remote. The North Base Camp at Pangpema (5,143 m) sits directly below the mountain's north face — an amphitheatre of ice and rock that few foreigners ever see in person.</p>

<h2>Why this trek</h2>
<ul>
<li>Restricted-area permit required — solo trekking not permitted, minimum group of two.</li>
<li>16-day itinerary, fly in to Suketar, walk out via Taplejung.</li>
<li>Kanchenjunga Conservation Area — snow leopard habitat, untouched primary forest in the lower sections.</li>
<li>Max altitude 5,143 m at Pangpema viewpoint.</li>
</ul>

<p>This is an east Nepal expedition trek. The lower sections walk through some of the most biodiverse forest in the country, and the upper sections are as raw as any Himalayan trail. We run it twice a year, October and April.</p>
HTML,
            ],

            'Kanchenjunga South Base Camp Trek' => [
                'season'      => 'October–November · April–May',
                'description' => <<<'HTML'
<p>The South Base Camp route is the shorter, slightly easier sibling of the North BC trek — 13 days instead of 16, max altitude 4,730 m at the Oktang viewpoint. The views are different: south face of Kanchenjunga and the Yalung Glacier, with Jannu (Khumbhakarna, 7,710 m) dominating the southern horizon.</p>

<h2>Why this trek</h2>
<ul>
<li>Shorter and less expensive than the North BC route, with similar trail isolation.</li>
<li>Restricted-area permit + minimum group of two.</li>
<li>Yalung Glacier viewing from Oktang — Kanchenjunga's south face is rarely photographed but as dramatic as the north.</li>
<li>Same start and end points as the North BC route, making the two combinable into a 22-day Kanchenjunga Circuit.</li>
</ul>

<p>We recommend South BC over North BC for trekkers with less time, or those who want the Kanchenjunga experience without the longer commitment.</p>
HTML,
            ],

            'Olangchung Gola Trek' => [
                'season'      => 'October–November · April–May',
                'description' => <<<'HTML'
<p>Olangchung Gola is a Tibetan-rooted village in far-eastern Nepal, sitting at 3,200 m on an ancient salt-trade route between Tibet and Sikkim. The trek climbs from the lower Tamur Valley through Sherpa and Walung villages to the upper village and on toward the Lumba Sumba pass (5,160 m).</p>

<h2>Why this trek</h2>
<ul>
<li>Restricted-area permit — sees almost no foreign trekkers.</li>
<li>Walung culture — distinct from the Khumbu and Solukhumbu Sherpas, with their own language and customs.</li>
<li>17 days, max altitude 5,160 m at Lumba Sumba.</li>
<li>Connects to the Makalu region via the Lumba Sumba pass for trekkers wanting a multi-region traverse.</li>
</ul>

<p>Demanding, remote, culturally rich. We run it with a camping crew on a custom-quote basis — group size and dates dictate logistics.</p>
HTML,
            ],
        ];
    }

    // ═══════════════════════════════════════════════════════════════════════
    // MAKALU
    // ═══════════════════════════════════════════════════════════════════════

    private function makaluContent(): array
    {
        return [
            'Makalu Base Camp Trek' => [
                'season'      => 'October · April–May',
                'description' => <<<'HTML'
<p>Makalu is the fifth-highest mountain in the world, and its base camp at 4,870 m sits in one of the wildest cirques in the Himalaya. The approach walks through the Barun Valley — a roadless, helicopter-only zone protected as part of the Makalu-Barun National Park.</p>

<h2>Why this trek</h2>
<ul>
<li>Direct views of Makalu's east face from base camp, plus Chamlang and Baruntse.</li>
<li>14 days, fly in to Tumlingtar, walk to base camp and back.</li>
<li>Barun Valley is biodiverse — primary forest, red pandas, snow leopard habitat.</li>
<li>Max altitude 4,870 m, no high-pass crossing required.</li>
</ul>

<p>Makalu BC is hard because of the remoteness and the long days, not because of altitude. Trail conditions vary year-to-year — landslides are common in the lower sections. We send Sherpa guides who know the current route status.</p>
HTML,
            ],

            'Sherpani Col Pass Trek' => [
                'season'      => 'October · April–May',
                'description' => <<<'HTML'
<p>The Sherpani Col (6,135 m) crosses from the Makalu region into the Hinku Valley and Mera Peak base camp area — a high, technical pass requiring rope work and fixed lines. 23 days, two glacier crossings, three high camps above 5,500 m.</p>

<h2>Why this trek</h2>
<ul>
<li>Technical: requires basic crampon and rope skills. We run a training day before the pass.</li>
<li>Crosses the Barun Glacier — one of the longest glaciers in Nepal outside the Khumbu.</li>
<li>Connects Makalu BC to Mera Peak base camp on foot — a route most trekkers fly between.</li>
<li>Full camping support with climbing-trained guides.</li>
</ul>

<h2>Requirements</h2>
<p>Prior high-altitude experience and good fitness. Not a first Himalayan trek. We require recent altitude experience above 5,000 m for clients on this route.</p>
HTML,
            ],

            'Arun Valley Trek' => [
                'season'      => 'October–November · March–April',
                'description' => <<<'HTML'
<p>The Arun Valley is the deepest valley in Nepal — the Arun River drops from Tibet through the Makalu range, creating a 4,000-metre gradient between river and ridge in places. This trek walks the lower Arun corridor and approaches the Makalu region from the south, through Rai and Limbu villages.</p>

<h2>Why this trek</h2>
<ul>
<li>16 days, max altitude 4,250 m — moderate by Himalaya standards.</li>
<li>Walks through districts that see almost no foreign trekkers — Sankhuwasabha is east Nepal's hidden corner.</li>
<li>Rai and Limbu hill culture — distinct from the Sherpa and Tamang communities further west.</li>
<li>Can be combined with a Makalu Base Camp extension for trekkers wanting a longer route.</li>
</ul>

<p>Our most underrated east Nepal trek. We send people here when they want remoteness, biodiversity, and cultural variety without the altitude commitment of the full Makalu route.</p>
HTML,
            ],
        ];
    }

    // ═══════════════════════════════════════════════════════════════════════
    // ROLWALING
    // ═══════════════════════════════════════════════════════════════════════

    private function rolwalingContent(): array
    {
        return [
            'Rolwaling Tashi Lapcha Trek' => [
                'season'      => 'October–November · April–May',
                'description' => <<<'HTML'
<p>Tashi Lapcha (5,755 m) is a glaciated pass connecting the Rolwaling Valley to the Khumbu — one of the most committing trekking passes in Nepal. The 19-day route walks east from Charikot through Rolwaling villages, crosses the pass under Tengi Ragi Tau, and descends into the Khumbu at Thame.</p>

<h2>Why this trek</h2>
<ul>
<li>One of the few foot routes connecting two of Nepal's main trekking regions.</li>
<li>Technical pass — requires basic crampon and rope skills, with two glaciers to cross.</li>
<li>Rolwaling Valley is restricted-area — small numbers of trekkers, intact Sherpa culture.</li>
<li>Tsho Rolpa Glacier Lake — one of the largest glacier lakes in Nepal, scientifically monitored for outburst risk.</li>
</ul>

<p>Demanding and committing. We run this trek with climbing-trained Sherpa guides and a full camping crew. Prior altitude experience required.</p>
HTML,
            ],

            'Lapchi Hermitage Trek' => [
                'season'      => 'October–November · April–May',
                'description' => <<<'HTML'
<p>Lapchi is a Buddhist hermitage at 3,600 m, sacred to followers of Milarepa — the 11th-century Tibetan yogi who meditated in caves throughout this valley. The trek climbs from Bigu Gompa into the upper Lapchi Valley, visiting active hermitages and meditation caves still in use.</p>

<h2>Why this trek</h2>
<ul>
<li>Eight days, max altitude 3,600 m. Friendlier than most Rolwaling-region treks.</li>
<li>Cultural and spiritual depth — Lapchi is a working pilgrimage site, not a museum.</li>
<li>Bigu Gompa, a nunnery founded in 1928, is the starting point.</li>
<li>Sees almost no foreign trekkers — fewer than fifty per year on this route.</li>
</ul>

<p>For trekkers interested in living Buddhist culture more than peak views. We can arrange teachings with hermits-in-residence on request.</p>
HTML,
            ],
        ];
    }

    // ═══════════════════════════════════════════════════════════════════════
    // DHAULAGIRI
    // ═══════════════════════════════════════════════════════════════════════

    private function dhaulagiriContent(): array
    {
        return [
            'Dhaulagiri Circuit Trek' => [
                'season'      => 'October–November · April–May',
                'description' => <<<'HTML'
<p>Dhaulagiri is the seventh-highest mountain in the world, and its circuit is one of the great expedition treks of Nepal. 18 days from Beni to Marpha, crossing the French Col (5,360 m) and Dhampus Pass (5,244 m), with a high camp at Hidden Valley below the north face. Camping throughout — no tea houses on this route.</p>

<h2>Why this trek</h2>
<ul>
<li>Two passes above 5,000 m, with Hidden Valley camp at 5,140 m.</li>
<li>Direct views of Dhaulagiri I from base camp at the foot of its east face.</li>
<li>Connects naturally to the Annapurna Circuit at Marpha — extendable into a 25-day Dhaulagiri-Annapurna traverse.</li>
<li>Full camping logistic. We provide tents, kitchen crew, and porters.</li>
</ul>

<p>Demanding and remote. Requires good prior altitude experience and strong fitness. We run two departures a year and recommend booking at least four months ahead for the gear and crew logistics.</p>
HTML,
            ],

            'Gurja Khani Dhorpatan Circuit Trek' => [
                'season'      => 'October–November · April–May',
                'description' => <<<'HTML'
<p>Gurja Khani and Dhorpatan sit in the foothills west of Dhaulagiri — Magar, Chhantyal, and Gurung villages set against the Dhaulagiri massif's south face. 14 days of moderate trekking through Nepal's only hunting reserve, with views of Gurja Himal and Dhaulagiri I.</p>

<h2>Why this trek</h2>
<ul>
<li>Max altitude 4,100 m — friendlier than full Dhaulagiri Circuit, accessible to less experienced trekkers.</li>
<li>Dhorpatan Hunting Reserve — Nepal's only legal hunting area, but mostly used for trekking.</li>
<li>Chhantyal cultural pocket — small ethnic community with their own language, found nowhere else.</li>
<li>Tea house accommodation for most of the route.</li>
</ul>

<p>Our preferred Dhaulagiri-region trek for clients without high-altitude experience. The terrain is dramatic but the altitude profile is forgiving.</p>
HTML,
            ],

            'Gurja Khani Trek' => [
                'season'      => 'October–November · March–May',
                'description' => <<<'HTML'
<p>The short version of the Dhorpatan Circuit. 12 days, focused on the Gurja Himal viewing valleys and the Chhantyal villages on the south flank of Dhaulagiri. Drives in from Beni, walks a loop through Gurja Khani and back. Max altitude 3,700 m.</p>

<h2>Why this trek</h2>
<ul>
<li>Twelve days — works as a two-week trip including travel.</li>
<li>Friendly altitude profile, low altitude risk.</li>
<li>Chhantyal cultural exposure — one of Nepal's smallest ethnic communities.</li>
<li>Direct views of Gurja Himal (7,193 m) and Dhaulagiri I from village viewpoints.</li>
</ul>

<p>Good fit for trekkers who want the Dhaulagiri-region experience without the camping commitment of the full circuit.</p>
HTML,
            ],

            'Trekking in Dhorpatan' => [
                'season'      => 'October–November · April–May',
                'description' => <<<'HTML'
<p>Dhorpatan is a high pastoral basin used for centuries as summer yak pasture, with Tibetan refugee settlements established in the 1960s adding a distinct cultural layer. This 15-day trek walks the Dhorpatan basin and its peripheral valleys, with optional side trips to viewpoints overlooking the Dhaulagiri range.</p>

<h2>Why this trek</h2>
<ul>
<li>15 days, max altitude 4,500 m. Moderate difficulty with a forgiving acclimatization profile.</li>
<li>Tibetan refugee settlements at Dhorpatan — established under His Holiness the Dalai Lama's resettlement programme.</li>
<li>Yak grazing pastures and traditional <em>kharka</em> (high pasture huts) still in use.</li>
<li>Combinable with Gurja Khani for trekkers wanting a longer route through the region.</li>
</ul>

<p>One of the quietest treks in Nepal — Dhorpatan sees a few dozen foreign trekkers a year.</p>
HTML,
            ],
        ];
    }

    // ═══════════════════════════════════════════════════════════════════════
    // FAR WEST NEPAL
    // ═══════════════════════════════════════════════════════════════════════

    private function farWestContent(): array
    {
        return [
            'Limi Valley Trek' => [
                'season'      => 'June–September',
                'description' => <<<'HTML'
<p>The Limi Valley sits in Humla district, in the extreme north-west corner of Nepal touching the Tibet border. Three villages — Til, Halji, and Jang — preserve Tibetan Buddhist culture untouched by the changes that have transformed eastern Nepal. 22 days of remote, high-altitude walking through one of the least-visited corners of the Himalaya.</p>

<h2>Why this trek</h2>
<ul>
<li>Restricted-area permit (USD 50 per week) keeps numbers extremely low — under 200 trekkers per year on this route.</li>
<li>Halji's Rinchenling Gompa is over 1,000 years old and one of the most important Buddhist sites in Nepal.</li>
<li>Trans-Himalayan terrain — rain shadow, so trekking is possible during the summer monsoon when the rest of Nepal is wet.</li>
<li>Max altitude 4,960 m at the Nyalu La pass.</li>
</ul>

<p>This is a major expedition trek. Fly in to Simikot (via Nepalgunj), camp throughout, walk a 22-day loop. We run it with a full crew and Tibetan-Nepali guides familiar with the Limi communities.</p>
HTML,
            ],

            'Jumla to Rara Lake Trek' => [
                'season'      => 'September–November · April–May',
                'description' => <<<'HTML'
<p>Rara Lake is the largest lake in Nepal — 10 km² of clear water at 2,990 m, surrounded by pine forest and snow-capped peaks in Mugu district. The classic approach is on foot from Jumla over the Khali Lagna pass, 12 days of walking through farmland, pine forest, and high pastures.</p>

<h2>Why this trek</h2>
<ul>
<li>Lake-focused trek — three nights camping at the lake's edge with Rara National Park as the surrounding wilderness.</li>
<li>Max altitude 3,700 m. Moderate altitude profile.</li>
<li>Walks through Khas-Magar villages — far-western hill culture distinct from anywhere else in Nepal.</li>
<li>Fly in via Nepalgunj-Jumla, fly out via Talcha-Nepalgunj. No long road drives.</li>
</ul>

<p>One of our favourite far-west treks. The lake itself is the destination — three full days there, walking the perimeter and birdwatching.</p>
HTML,
            ],

            'Simikot Raling Monastery Cultural Trek' => [
                'season'      => 'May–October',
                'description' => <<<'HTML'
<p>Raling Gompa sits at 4,100 m above Simikot, the district headquarters of Humla. The monastery has been an important centre of Tibetan Buddhism for over five centuries, and the trek up combines moderate walking with deep cultural exposure to the Humli Lama community.</p>

<h2>Why this trek</h2>
<ul>
<li>Eleven days, max altitude 4,100 m. Manageable for trekkers without serious altitude experience.</li>
<li>Raling Gompa is active — meditation retreats, daily pujas, and a community of monks in residence.</li>
<li>Falls in the rain shadow — June–September trekking is possible while monsoon shuts down the rest of Nepal.</li>
<li>Fly in to Simikot via Nepalgunj, walk the loop and back to Simikot.</li>
</ul>

<p>For trekkers interested in Tibetan Buddhist culture more than peak views. We can arrange short teachings and meditation sessions with the resident monks on request.</p>
HTML,
            ],

            'Rara Lake Circuit Trek' => [
                'season'      => 'September–November · April–May',
                'description' => <<<'HTML'
<p>The full circuit of Rara Lake and the surrounding Rara National Park. 15 days walking from Jumla, around the lake, through the Sinja Valley (capital of the medieval Khasa kingdom), and out via the Khali Lagna pass. Three nights at the lake, full national park immersion.</p>

<h2>Why this trek</h2>
<ul>
<li>Combines Rara Lake with the historical Sinja Valley — Khasa kingdom ruins, royal palace foundations, ancient temples.</li>
<li>15 days gives time for a proper lake stay and the cultural side-trips, where the 12-day Jumla-Rara version is more direct.</li>
<li>Max altitude 3,700 m. Moderate altitude profile.</li>
<li>National park accommodation: a mix of camping and basic tea houses.</li>
</ul>

<p>The complete far-west experience for trekkers with time. Rara is the highlight; Sinja is the bonus.</p>
HTML,
            ],

            'Short Trek to Rara Lake' => [
                'season'      => 'September–November · April–May',
                'description' => <<<'HTML'
<p>The shortest way to reach Rara Lake. Fly to Talcha airstrip, walk one and a half days to the lake, spend two nights there, walk back. Seven days door-to-door from Kathmandu, max altitude 3,000 m. The friendliest far-west trek we offer.</p>

<h2>Why this trek</h2>
<ul>
<li>Seven days — fits in a 10-day Nepal trip including travel.</li>
<li>Lowest altitude of any Rara route — suitable for families and older trekkers.</li>
<li>Lake side camping with national park guides.</li>
<li>Talcha airstrip is small — flights weather-dependent, so we recommend buffer days.</li>
</ul>

<p>For trekkers who want Rara without committing to two or three weeks. We run this route on a custom-departure basis — get in touch for dates.</p>
HTML,
            ],
        ];
    }
}
