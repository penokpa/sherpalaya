<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class BlogPostsSeeder extends Seeder
{
    public function run(): void
    {
        foreach ($this->posts() as $data) {
            if (Post::where('slug', $data['slug'])->exists()) {
                continue;
            }

            Post::create([
                'slug'         => $data['slug'],
                'title'        => $data['title'],
                'excerpt'      => $data['excerpt'],
                'body'         => $data['body'],
                'is_featured'  => false,
                'published_at' => now(),
            ]);
        }
    }

    private function posts(): array
    {
        return [
            [
                'slug'    => 'annapurna-circuit-vs-everest-base-camp',
                'title'   => 'Annapurna Circuit vs Everest Base Camp: Which Trek Should You Choose?',
                'excerpt' => 'Annapurna or Everest? We compare difficulty, scenery, cost, and crowds so you can pick the right Nepal trek for your first Himalayan adventure.',
                'body'    => $this->bodyAnnapurnaVsEbc(),
            ],
            [
                'slug'    => 'how-to-train-for-everest-base-camp-12-week-plan',
                'title'   => 'How to Train for Everest Base Camp: A 12-Week Plan from a Sherpa Guide',
                'excerpt' => 'You do not need to be a runner to reach Everest Base Camp — you need to be a walker. Here is the 12-week plan we share with our own clients before they fly to Kathmandu.',
                'body'    => $this->bodyTrainingPlan(),
            ],
            [
                'slug'    => 'manaslu-circuit-trek-nepals-best-kept-secret',
                'title'   => 'Manaslu Circuit Trek: Nepal\'s Best-Kept Secret',
                'excerpt' => 'Quieter trails, raw mountain culture, and one of the highest passes in the Himalaya. Here is why we send experienced trekkers to Manaslu instead of Annapurna.',
                'body'    => $this->bodyManaslu(),
            ],
        ];
    }

    private function bodyAnnapurnaVsEbc(): string
    {
        return <<<'HTML'
<p>If you are planning your first big trek in Nepal, you are almost certainly choosing between two icons: the <strong>Annapurna Circuit</strong> and <strong>Everest Base Camp</strong>. Both are world-class. Neither is "better." But they are built for different kinds of trekkers, and picking the right one is the difference between the trek of your life and a trip that doesn't quite fit.</p>

<h2>The Quick Verdict</h2>
<ul>
<li><strong>Choose Everest Base Camp</strong> if you want the iconic peak, deep Sherpa culture, and once-in-a-lifetime views of the world's highest mountain.</li>
<li><strong>Choose the Annapurna Circuit</strong> if you want landscape variety, less altitude stress, and a more layered cultural journey.</li>
</ul>

<h2>Scenery and Variety</h2>
<p>The Annapurna Circuit wins on variety. You walk through subtropical jungle, terraced rice paddies, pine forest, alpine desert, and finally a high pass at Thorong La (5,416m) — all in a single trek. Few treks anywhere in the world cover so many ecosystems in two weeks.</p>
<p>Everest Base Camp is more monotonal but more <em>dramatic</em>. The entire trek is built around the approach to one mountain, and the views of Everest, Lhotse, Ama Dablam, and Nuptse are unmatched anywhere else on earth.</p>

<h2>Difficulty</h2>
<p>Both are strenuous but neither requires climbing skills. The key differences:</p>
<ul>
<li><strong>EBC</strong> has a higher maximum sleeping altitude (Gorak Shep, 5,164m) and more sustained time above 4,000m. Altitude is the main challenge.</li>
<li><strong>Annapurna Circuit</strong> has one big push — Thorong La pass — but you sleep lower on most nights, giving better acclimatization.</li>
</ul>
<p>In our experience, cases of acute mountain sickness are slightly higher on EBC, simply because trekkers spend more days at altitude.</p>

<h2>Cost</h2>
<p>Everest is more expensive. The round-trip flight to Lukla alone adds roughly USD 350–400 per person. The Annapurna Circuit is reachable by jeep or bus from Pokhara, which keeps the entry cost lower. Once you are on the trail, daily costs for food and lodging are broadly similar.</p>

<h2>Crowds</h2>
<p>Both are popular, but Everest Base Camp has felt more crowded in recent years. The Annapurna Circuit has become partially drivable on the lower sections, which has actually <em>reduced</em> foot traffic on the early days — meaning the high section past Manang feels quieter than it used to.</p>

<h2>Cultural Experience</h2>
<p>EBC immerses you in Sherpa Buddhist culture — Tengboche Monastery, prayer wheels, mani walls, and the rhythm of a community that has lived in the shadow of Everest for centuries.</p>
<p>Annapurna covers Hindu lowlands, Gurung and Magar hill villages, and Tibetan-influenced Buddhist culture as you climb toward Manang. More variety; less depth in any single tradition.</p>

<h2>Duration</h2>
<ul>
<li><strong>EBC:</strong> 12–14 days on trail</li>
<li><strong>Annapurna Circuit:</strong> 12–18 days depending on side trips to Tilicho Lake or Poon Hill</li>
</ul>

<h2>Our Honest Recommendation</h2>
<p>If you have the budget and only one trek in you, Everest Base Camp is the once-in-a-lifetime trip. If you want a richer, more varied trek that is gentler on the body — and you may come back to Nepal more than once — start with the Annapurna Circuit. There is no wrong answer.</p>
<p>We run both treks year-round. If you tell us your fitness level, budget, and how much time you have, we can match you to the right itinerary before you even book.</p>
HTML;
    }

    private function bodyTrainingPlan(): string
    {
        return <<<'HTML'
<p>The number one question we get from clients is not about gear, weather, or altitude pills. It is: <em>"Am I fit enough?"</em></p>
<p>Here is the honest answer. You do not need to be a runner. You do not need to be young. You need to be able to walk 6–7 hours a day, day after day, with a 6kg daypack, at altitudes where the air has 50% of the oxygen it does at sea level. That is a trainable goal for almost any healthy adult — if you give yourself enough time.</p>
<p>This is the 12-week plan we share with our own clients before they fly to Kathmandu.</p>

<h2>The Goal</h2>
<p>By week 12, you should be able to do a <strong>5-hour hike on uneven terrain with a 6kg pack, and feel fine the next day to do it again.</strong> That is the trek pace. Anything beyond that is bonus fitness.</p>

<h2>Weeks 1–4: Build the Base</h2>
<p>If you are starting from couch fitness, do not skip this phase. The point is to teach your body to walk for hours without injury.</p>
<ul>
<li><strong>3x per week:</strong> 45–60 min brisk walking on flat ground. No pack.</li>
<li><strong>2x per week:</strong> 20 min strength work — squats, lunges, step-ups, planks. Bodyweight is fine.</li>
<li><strong>1x per week:</strong> A longer walk, 90 min, on any terrain you can find.</li>
</ul>
<p>Track how your feet, ankles, and knees feel. If anything hurts beyond mild soreness, see a physio before you escalate.</p>

<h2>Weeks 5–8: Add Load and Hills</h2>
<p>This is where you start training the legs that will carry you up to Tengboche.</p>
<ul>
<li><strong>3x per week:</strong> 60 min walking with a 4–6kg daypack. Add hills if you can find them.</li>
<li><strong>2x per week:</strong> 30 min strength — now with weighted lunges and split squats. Focus on quads and glutes; they do all the work on descents.</li>
<li><strong>1x per week:</strong> A 2–3 hour hike with full daypack. Stairs work if you live in a city — 30 min of stair climbing has more carryover to trekking than any treadmill workout.</li>
</ul>

<h2>Weeks 9–12: Specificity</h2>
<p>The final block is about mimicking the trek itself.</p>
<ul>
<li><strong>2x per week:</strong> 60–90 min walks with daypack. Keep the engine running.</li>
<li><strong>1x per week:</strong> Strength session — maintain what you have built.</li>
<li><strong>1x per week:</strong> A long hike — 4–5 hours with full daypack, ideally on consecutive weekends to simulate the back-to-back nature of trek days.</li>
</ul>
<p>By week 11, do a <strong>two-day back-to-back hike</strong> if you can. Camp out, walk 5 hours one day, 5 hours the next. If you finish day two feeling capable, you are ready for the Khumbu.</p>

<h2>What to Skip</h2>
<ul>
<li><strong>Running.</strong> It does not translate well. Walking with load does.</li>
<li><strong>Heavy gym lifting.</strong> Strength is helpful; bulk is not. You will carry your own bulk uphill.</li>
<li><strong>Altitude masks.</strong> They do nothing useful. Save the money.</li>
</ul>

<h2>What About Altitude?</h2>
<p>You cannot meaningfully prepare for altitude at sea level. What you <em>can</em> do is build cardiovascular efficiency, so when oxygen drops, your body has more to work with. Aerobic base — built from months of walking — is your altitude insurance.</p>
<p>Once you arrive in Nepal, our itineraries are designed with acclimatization days built in. Trust the schedule. Do not try to "push through" if you feel symptoms.</p>

<h2>The Hidden Variable: Recovery</h2>
<p>Trekking is not a one-day effort. It is 12–14 consecutive days of moderate exertion. The trekkers who struggle are usually not the unfit ones — they are the ones who cannot recover overnight. Sleep, hydration, and protein matter as much as the training.</p>

<p>If you have less than 12 weeks before your trek, do what you can. Twelve weeks is the comfort number — eight weeks of focused training will still get most healthy adults to Base Camp. Six weeks is tight. Less than that, and we will have an honest conversation with you about whether to push the trip.</p>
HTML;
    }

    private function bodyManaslu(): string
    {
        return <<<'HTML'
<p>If you have done Annapurna or Everest and you are looking for something <em>quieter</em>, this is the trek we send our repeat clients on.</p>
<p>The Manaslu Circuit Trek skirts the eighth-highest mountain in the world. It crosses the Larkya La pass at 5,106m. It runs through Tibetan Buddhist villages that look unchanged in three centuries. And it does all of this with a fraction of the foot traffic of the more famous circuits.</p>

<h2>Why Manaslu Is Different</h2>
<p>Three reasons most trekkers have never heard of it, and why that is changing:</p>
<ol>
<li><strong>Restricted area permit.</strong> Manaslu requires a special permit and a registered guide — solo trekking is not allowed. This single rule has kept the trail uncommercialized.</li>
<li><strong>Newer infrastructure.</strong> Teahouses on Manaslu have improved dramatically since 2018. The trail is now comfortable, even if it is not yet luxurious.</li>
<li><strong>It feels like the Annapurna Circuit looked 25 years ago.</strong> Before the road came in. That is the highest compliment we can give a Nepal trek.</li>
</ol>

<h2>The Route</h2>
<p>The classic itinerary is 14–16 days. You start at Soti Khola, follow the Budhi Gandaki river upstream through subtropical lowlands, climb through pine and rhododendron forest, and emerge above the treeline in an alpine landscape dominated by Manaslu (8,163m), Himlung, and Cheo Himal.</p>
<p>The crux is the Larkya La pass — a long, cold morning push from Dharamsala over the saddle and down into the Annapurna region. Most groups leave the teahouse at 3am to cross before afternoon weather closes in.</p>

<h2>Cultural Highlights</h2>
<ul>
<li><strong>Lho and Sama Gaon:</strong> Tibetan-rooted Buddhist villages with active monasteries. We schedule a full rest day in Sama for acclimatization, and most trekkers use it to walk up to Pungyen Gompa or Manaslu Base Camp.</li>
<li><strong>Mu Gompa:</strong> Above Samdo, this 19th-century monastery sits at 3,700m. Side trip from Samdo.</li>
<li><strong>Mani walls and prayer wheels.</strong> Some of the longest mani walls in Nepal line the trail between Lho and Samdo.</li>
</ul>

<h2>Difficulty — Honest Numbers</h2>
<p>Manaslu is <strong>harder than the Annapurna Circuit</strong>. Two reasons:</p>
<ul>
<li>Longer days — several stages are 6–8 hours on the trail.</li>
<li>Less margin on the pass day. There are no easy escape options once you commit.</li>
</ul>
<p>It is comparable in difficulty to Everest Base Camp, with slightly less time above 4,500m but a more committing pass crossing. Do not make this your first Himalayan trek.</p>

<h2>When to Go</h2>
<ul>
<li><strong>Best:</strong> October–November (clear skies, stable weather, comfortable temperatures)</li>
<li><strong>Good:</strong> March–April (warmer but hazier)</li>
<li><strong>Avoid:</strong> June–August (monsoon, leeches, landslide risk on lower sections)</li>
<li><strong>Possible but cold:</strong> December–February (pass often blocked by snow)</li>
</ul>

<h2>Permits and Logistics</h2>
<p>You will need three permits for Manaslu:</p>
<ol>
<li>Restricted Area Permit (RAP) — cost varies by season, weekly basis</li>
<li>Manaslu Conservation Area Permit (MCAP)</li>
<li>Annapurna Conservation Area Permit (ACAP) for the descent</li>
</ol>
<p>We handle all paperwork for our clients. You also need a registered guide and a minimum of two trekkers on the permit — solo trekking is not permitted in this region.</p>

<h2>Who Should Trek Manaslu</h2>
<ul>
<li>Repeat Nepal trekkers who have done Annapurna or EBC.</li>
<li>Trekkers who prioritize solitude and cultural authenticity over creature comforts.</li>
<li>Anyone who wants to see what Nepal trekking looked like before mass tourism — but with safer infrastructure than 1990.</li>
</ul>

<p>Manaslu is the trek we recommend to people who want to fall in love with Nepal twice. If that sounds like you, get in touch — we run small-group departures every October and March, and we keep the groups small on purpose.</p>
HTML;
    }
}
