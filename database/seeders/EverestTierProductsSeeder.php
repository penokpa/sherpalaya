<?php

namespace Database\Seeders;

use App\Enums\CategoryType;
use App\Enums\TrekDifficulty;
use App\Models\Category;
use App\Models\Expedition;
use App\Models\Region;
use Illuminate\Database\Seeder;

/**
 * Break Mt. Everest into three separate service-tier products (Standard /
 * Premium / Luxury) — matching 8K Expeditions' pattern. Each tier is its
 * own expedition record with its own URL, description, and inquiry CTA.
 *
 * This supersedes the in-page tier cards approach for Everest. The
 * cards-on-detail-page system stays in place for Manaslu (and is still
 * available for any other expedition we want to apply it to).
 *
 * Idempotent.
 */
class EverestTierProductsSeeder extends Seeder
{
    public function run(): void
    {
        $everestCat = Category::query()
            ->where('type', CategoryType::EXPEDITION)
            ->where('slug', 'everest-expeditions')
            ->first();

        if (! $everestCat) {
            $this->command->warn('Everest Expeditions category not found.');
            return;
        }

        $everestRegion = Region::query()->where('name', 'Everest')->first();

        // 1. Rename existing "Mt. Everest Expedition - South" → "Standard"
        $standard = $this->findByTitle('Mt. Everest Expedition - South')
            ?? $this->findByTitle('Mt. Everest Expedition — Standard');

        if ($standard) {
            $standard->setTranslation('title', 'en', 'Mt. Everest Expedition — Standard');
            // Strip any previous service-tier markers from the body — tiers are
            // separate products now.
            $body = (string) $standard->getTranslation('description', 'en', false);
            $body = preg_replace('#<!-- service-tiers:start -->.*?<!-- service-tiers:end -->#s', '', $body);
            $standard->setTranslation('description', 'en', trim($body) . "\n\n" . $this->standardServiceBlock());
            $standard->category_id = $everestCat->id;
            if ($everestRegion) {
                $standard->region_id = $everestRegion->id;
            }
            $standard->save();
            $this->command->info('Renamed: Mt. Everest South → Mt. Everest Expedition — Standard');
        }

        // 2. Create "Premium"
        $this->ensureTier(
            'Mt. Everest Expedition — Premium',
            $everestCat->id,
            $everestRegion?->id,
            $this->premiumDescription(),
        );

        // 3. Create "Luxury"
        $this->ensureTier(
            'Mt. Everest Expedition — Luxury',
            $everestCat->id,
            $everestRegion?->id,
            $this->luxuryDescription(),
        );

        $this->command->info('');
        $this->command->info('Everest Expeditions category now contains:');
        foreach (Expedition::where('category_id', $everestCat->id)->whereNotNull('published_at')->get() as $e) {
            $this->command->info('  - ' . trim($e->getTranslation('title', 'en', false)));
        }
    }

    private function findByTitle(string $title): ?Expedition
    {
        $needle = mb_strtolower(trim($title));
        foreach (Expedition::query()->get() as $e) {
            if (mb_strtolower(trim((string) $e->getTranslation('title', 'en', false))) === $needle) {
                return $e;
            }
        }
        return null;
    }

    private function ensureTier(string $title, int $categoryId, ?int $regionId, string $description): void
    {
        $exp = $this->findByTitle($title);
        if (! $exp) {
            $exp = new Expedition();
            $this->command->info("Created: {$title}");
        } else {
            $this->command->info("Updated: {$title}");
        }

        $exp->fill([
            'duration'                  => '65 days',
            'category_id'               => $categoryId,
            'region_id'                 => $regionId,
            'is_featured'               => false,
            'starting_point'            => 'Kathmandu',
            'ending_point'              => 'Kathmandu',
            'starting_altitude'         => 1400,
            'highest_altitude'          => 8849,
            'expedition_difficulty'     => TrekDifficulty::CHALLENGING->value,
            'costs_include'             => ['en' => [], 'fr' => []],
            'costs_exclude'             => ['en' => [], 'fr' => []],
            'published_at'              => now(),
        ]);
        $exp->setTranslation('title', 'en', $title);
        $exp->setTranslation('description', 'en', $description);
        $exp->setTranslation('best_time_for_expedition', 'en', 'Spring expedition season (April–May)');
        $exp->save();
    }

    // ─── Content ────────────────────────────────────────────────────────────

    private function standardServiceBlock(): string
    {
        return <<<'HTML'
<h2>Standard Service</h2>

<p>Our most common Everest programme. Designed for experienced climbers who already have prior 6,000m or 7,000m expedition experience and want a properly supported Everest summit attempt without unnecessary luxury overhead.</p>

<h3>What's included</h3>
<ul>
<li>1 climbing Sherpa per 2 clients above Base Camp</li>
<li>5 oxygen bottles per client</li>
<li>Group dining tent with full kitchen team at Base Camp</li>
<li>Standard fixed-line and ladder logistics via the Khumbu Icefall doctors</li>
<li>Walk-in approach via Lukla — full natural acclimatization</li>
<li>All permits, royalty, insurance, and rescue coordination</li>
<li>Pre- and post-expedition hotel in Kathmandu (4★)</li>
</ul>

<h3>Who this fits</h3>
<p>Experienced climbers with proven altitude tolerance who want the Everest summit without the helicopter-and-chef overhead. This is the package we recommend for most clients.</p>

<h3>Looking for more support?</h3>
<p>See our <a href="/en/expeditions/category/everest-expeditions">Premium and Luxury tiers</a> for 1:1 Sherpa support, helicopter access, and bespoke base camp comfort.</p>
HTML;
    }

    private function premiumDescription(): string
    {
        return <<<'HTML'
<p>Our enhanced Everest programme. 1:1 Sherpa support, extra oxygen, and personal-tent comfort at Base Camp. The right tier for first-time 8,000m climbers or any experienced climber who wants more margin on the mountain.</p>

<h2>What's included</h2>
<ul>
<li>1 dedicated climbing Sherpa per client above Base Camp</li>
<li>7 oxygen bottles per client (vs. 5 in Standard)</li>
<li>Personal climbing tent at Base Camp — no shared tents</li>
<li>Higher-grade down suit and 8,000m boot allocation</li>
<li>Heated mess tent at Base Camp with private dining option</li>
<li>Optional helicopter return from Pheriche or Lukla post-summit</li>
<li>All permits, royalty, insurance, and rescue coordination</li>
<li>Premium pre- and post-expedition hotel in Kathmandu (5★)</li>
</ul>

<h2>Who this fits</h2>
<p>First-time 8,000m climbers who want maximum margin without going full luxury. Also: experienced climbers who've previously summited at the Standard tier and want to upgrade their support for a faster, more comfortable expedition.</p>

<h2>How this differs from Standard</h2>
<p>The summit objective and route are identical. What changes is the level of personal support, oxygen allocation, and base camp comfort. With 1:1 Sherpa-to-client ratio and 40% more oxygen, the Premium tier gives you noticeably more margin both above the South Col and on summit day.</p>
HTML;
    }

    private function luxuryDescription(): string
    {
        return <<<'HTML'
<p>Our most comprehensive Everest service. Full bespoke, helicopter logistics, dedicated Sherpa team, IFMGA-certified mountain guide, and luxury base camp accommodation. For climbers who want the summit with no logistical compromise.</p>

<h2>What's included</h2>
<ul>
<li>2 dedicated climbing Sherpas per client (1:1 plus assistant)</li>
<li>Unlimited oxygen from Camp 2 upward</li>
<li>Private heated luxury tents at Base Camp — bedroom, lounge, attached bath</li>
<li>Personal chef and butler service throughout the expedition</li>
<li>Helicopter transfers Kathmandu ↔ Base Camp — no walk-in required</li>
<li>Helicopter-assisted acclimatization rotations to save time and reduce fatigue</li>
<li>IFMGA-certified mountain guide alongside the Sherpa team</li>
<li>Custom acclimatization schedule, fully bespoke</li>
<li>All permits, royalty, insurance, and rescue coordination</li>
<li>5★ pre- and post-expedition accommodation in Kathmandu with private transfers</li>
</ul>

<h2>Who this fits</h2>
<p>Climbers for whom time and comfort are bigger constraints than budget. Executives with limited annual leave who want the summit in 45 days instead of 65. Climbers who want the absolute best logistics money can buy.</p>

<h2>How this differs from Premium</h2>
<p>Premium gives you 1:1 Sherpa support and extra oxygen. Luxury adds the helicopter logistics, personal chef, IFMGA guide, and the ability to compress the expedition timeline through air-supported rotations. Premium is the right choice for most upgrade clients; Luxury is for those who want everything.</p>
HTML;
    }
}
