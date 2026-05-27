<?php

namespace Database\Seeders;

use App\Models\Expedition;
use Illuminate\Database\Seeder;

/**
 * Append a "Service Tiers" section to the Mt. Everest Expedition - South body.
 *
 * Renders four tier cards (Classic / Premium / VIP / VVIP) describing what's
 * included at each level. No prices are listed — pricing varies considerably
 * year-to-year and per group, so the page directs prospects to inquire.
 *
 * Idempotent: uses an HTML comment marker. Re-running replaces the section
 * cleanly without duplicating it.
 */
class ExpeditionTierContentSeeder extends Seeder
{
    private const MARKER_OPEN = '<!-- service-tiers:start -->';
    private const MARKER_CLOSE = '<!-- service-tiers:end -->';

    public function run(): void
    {
        // Everest South: append the 4-tier service section.
        $this->appendTierSection('Mt. Everest Expedition - South', $this->everestTierSection());

        // Manaslu: same multi-tier pattern.
        $this->appendTierSection('Mt. Manaslu Expedition', $this->manasluTierSection());

        // The standalone "VIP" / "VVIP" records are now redundant — their info
        // lives as a tier on the main expedition pages. Move to draft.
        $this->draft('VIP Everest Expedition');
        $this->draft('VVIP Manaslu Expedition');
    }

    private function appendTierSection(string $title, string $tierSection): void
    {
        $exp = $this->findExpeditionByTitle($title);
        if (! $exp) {
            $this->command->warn("{$title} not found.");
            return;
        }

        $existing = (string) $exp->getTranslation('description', 'en', false);
        $cleaned = preg_replace(
            '#' . preg_quote(self::MARKER_OPEN, '#') . '.*?' . preg_quote(self::MARKER_CLOSE, '#') . '#s',
            '',
            $existing
        );
        $cleaned = rtrim((string) $cleaned);

        $exp->setTranslation('description', 'en', $cleaned . "\n\n" . $tierSection);
        $exp->save();

        $this->command->info("Tiers added/refreshed on: {$title}");
    }

    private function draft(string $title): void
    {
        $exp = $this->findExpeditionByTitle($title);
        if (! $exp) {
            return;
        }
        if ($exp->published_at !== null) {
            $exp->published_at = null;
            $exp->save();
            $this->command->info("Drafted: {$title}");
        }
    }

    private function findExpeditionByTitle(string $title): ?Expedition
    {
        foreach (Expedition::query()->get() as $e) {
            if (trim((string) $e->getTranslation('title', 'en', false)) === $title) {
                return $e;
            }
        }
        return null;
    }

    private function everestTierSection(): string
    {
        $open = self::MARKER_OPEN;
        $close = self::MARKER_CLOSE;

        return <<<HTML
{$open}
<h2>Service Tiers</h2>

<p>We run Everest South as four service tiers. The summit objective and base-camp logistics are the same — what changes is how much support, oxygen, and comfort you have. Pricing varies year-to-year and per group; we quote each tier on inquiry.</p>

<h3>Classic</h3>
<p><strong>Standard Sherpa-supported expedition.</strong> The most common service level — what most of our clients book.</p>
<ul>
<li>1 climbing Sherpa per 2 clients above Base Camp</li>
<li>Standard oxygen allocation: 5 bottles per client</li>
<li>Group dining tent and shared base camp accommodation</li>
<li>Standard fixed-line and ladder logistics with the Khumbu Icefall doctors</li>
<li>Walk-in approach via Lukla (no helicopter rotations)</li>
</ul>

<h3>Premium</h3>
<p><strong>1:1 Sherpa support and extra oxygen.</strong> Recommended for first-time 8000m climbers or anyone who wants more margin.</p>
<ul>
<li>1 climbing Sherpa per client above Base Camp</li>
<li>Enhanced oxygen: 7 bottles per client</li>
<li>Personal climbing tent at Base Camp</li>
<li>Higher-grade down suit and boot allocation</li>
<li>Optional helicopter return from Pheriche or Lukla</li>
</ul>

<h3>VIP</h3>
<p><strong>Logistical luxury with helicopter access.</strong> For climbers who value comfort and time.</p>
<ul>
<li>1 climbing Sherpa + 1 assistant Sherpa per client</li>
<li>Unlimited oxygen above South Col</li>
<li>Heated dining tent and personal chef at Base Camp</li>
<li>Helicopter transfers Kathmandu ↔ Base Camp</li>
<li>Helicopter-assisted acclimatization rotations</li>
<li>Private base camp suite (bedroom + lounge tent)</li>
</ul>

<h3>VVIP</h3>
<p><strong>Full bespoke — the most comfortable Everest service we offer.</strong> For climbers who want the summit with no logistical compromise.</p>
<ul>
<li>2 climbing Sherpas dedicated 1:1 throughout</li>
<li>Unlimited oxygen from Camp 2 upward</li>
<li>Private heated luxury tents at Base Camp with attached bath</li>
<li>Personal chef + butler service throughout</li>
<li>Helicopter to and from Base Camp + all rotation flights</li>
<li>IFMGA-certified mountain guide alongside Sherpa team</li>
<li>Custom acclimatization schedule, fully bespoke</li>
</ul>

<h3>Choosing a tier</h3>
<p>For most experienced climbers, Classic is the right call. Premium is the safe upgrade if it's your first 8000m peak. VIP suits climbers with limited time. VVIP is the answer when nothing matters except summit and comfort. We're happy to walk you through which tier fits — get in touch.</p>
{$close}
HTML;
    }

    private function manasluTierSection(): string
    {
        $open = self::MARKER_OPEN;
        $close = self::MARKER_CLOSE;

        return <<<HTML
{$open}
<h2>Service Tiers</h2>

<p>We offer Mt. Manaslu (8,163 m) as three service tiers. Manaslu is generally considered the friendliest 8000m peak — straightforward objective hazards, well-established route, no major technical climbing — so most clients book the Classic service. We quote each tier on inquiry.</p>

<h3>Classic</h3>
<p><strong>Standard Sherpa-supported expedition.</strong> The right tier for climbers with prior 6000m experience.</p>
<ul>
<li>1 climbing Sherpa per 2 clients above Base Camp</li>
<li>Standard oxygen allocation: 3 bottles per client</li>
<li>Group dining tent at Base Camp</li>
<li>Walk-in approach via Soti Khola — full acclimatization through the Manaslu Circuit</li>
<li>Standard fixed-line logistics</li>
</ul>

<h3>Premium</h3>
<p><strong>1:1 Sherpa support, extra oxygen.</strong> Recommended for first 8000m climbers or anyone wanting more margin.</p>
<ul>
<li>1 climbing Sherpa per client above Base Camp</li>
<li>Enhanced oxygen: 4–5 bottles per client</li>
<li>Personal tent at Base Camp</li>
<li>Optional helicopter return from Samagaon after summit</li>
</ul>

<h3>VVIP</h3>
<p><strong>Full bespoke service.</strong> The most comfortable Manaslu programme we offer.</p>
<ul>
<li>2 climbing Sherpas dedicated 1:1</li>
<li>Unlimited oxygen above Camp 2</li>
<li>Helicopter to and from Base Camp — no walk-in required</li>
<li>Private heated luxury tents at Base Camp</li>
<li>Personal chef + butler service</li>
<li>Custom acclimatization schedule</li>
</ul>

<h3>Choosing a tier</h3>
<p>Manaslu is the 8000m peak we recommend as a step before Everest. Classic is the standard call for experienced trekkers ready to climb. VVIP exists for clients who want the summit without the three-week walk-in. Get in touch and we'll match the tier to your timeline and experience.</p>
{$close}
HTML;
    }
}
