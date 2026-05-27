<?php

namespace Database\Seeders;

use App\Models\Expedition;
use App\Models\Tour;
use App\Models\Trek;
use Illuminate\Database\Seeder;

/**
 * Price match seeder.
 *
 * Maps each Sherpalaya trek / expedition / tour title (English) to a starting
 * price in USD, benchmarked against HWW (hwwtreks.com). Where HWW lists the
 * same trek, the price matches HWW. Where HWW doesn't list a close equivalent,
 * the price is set to the prevailing Nepali-outfitter market rate.
 *
 * Idempotent: only overwrites the price_from column, leaves everything else
 * alone. Safe to re-run.
 */
class PriceMatchSeeder extends Seeder
{
    public function run(): void
    {
        $this->applyPrices(Trek::class, $this->trekPrices(), 'trek');
        $this->applyPrices(Expedition::class, $this->expeditionPrices(), 'expedition');
        $this->applyPrices(Tour::class, $this->tourPrices(), 'tour');

        // Clear prices on 8000m expeditions — no Nepali outfitter publishes these
        // publicly, and a fixed price boxes us in during negotiation.
        // The public templates show "Price on request" when price_from is null.
        $this->clearPrices(Expedition::class, $this->inquireOnlyExpeditions(), 'expedition');
    }

    private function clearPrices(string $modelClass, array $titles, string $label): void
    {
        $records = $modelClass::query()->get();
        $byNormalized = [];
        foreach ($records as $record) {
            $key = mb_strtolower(trim((string) $record->getTranslation('title', 'en', false)));
            $byNormalized[$key] = $record;
        }

        $cleared = 0;
        foreach ($titles as $title) {
            $key = mb_strtolower(trim($title));
            if (! isset($byNormalized[$key])) {
                continue;
            }
            $record = $byNormalized[$key];
            $record->price_from = null;
            $record->save();
            $cleared++;
        }

        $this->command->info("  {$label}: {$cleared} cleared (inquire-only)");
    }

    /**
     * Match by trimmed English title (loose) so trailing whitespace / case
     * drift doesn't break matching. Logs unmatched titles to the console so
     * we can fix them by hand.
     */
    private function applyPrices(string $modelClass, array $prices, string $label): void
    {
        $records = $modelClass::query()->get(['id', 'title', 'price_from']);
        $byNormalized = [];
        foreach ($records as $record) {
            $title = $record->getTranslation('title', 'en', false);
            $normalized = mb_strtolower(trim((string) $title));
            $byNormalized[$normalized] = $record;
        }

        $applied = 0;
        $missing = [];
        foreach ($prices as $title => $price) {
            $key = mb_strtolower(trim($title));
            if (! isset($byNormalized[$key])) {
                $missing[] = $title;
                continue;
            }
            $record = $byNormalized[$key];
            $record->price_from = $price;
            $record->save();
            $applied++;
        }

        $this->command->info("  {$label}: {$applied} priced" . (count($missing) ? ", " . count($missing) . " not found: " . implode(' | ', $missing) : ''));
    }

    /**
     * Trek prices benchmarked to HWW. Order matches the production trek list.
     */
    private function trekPrices(): array
    {
        // All titles match HWW exactly (post-restructure). Re-running after the
        // restructure seeder picks up the new names automatically.
        return [
            'Everest Base Camp Trek'                            => 1400,
            'Annapurna Base Camp Trek'                          => 650,
            'Manaslu Circuit Trek'                              => 1250,
            'Langtang Gosainkunda Trek'                         => 750,
            'Everest View Panorama Trek'                        => 1050,
            'Gokyo Lake Trek'                                   => 1550,
            'Everest Three Passes Trek'                         => 1850,
            'Renjo La Pass Trek'                                => 1650,
            'Annapurna Dhaulagiri Trek'                         => 1500,
            'Mardi Himal Trek'                                  => 700,
            'Annapurna Circuit Trek'                            => 1250,
            'Langtang Valley Trek'                              => 700,
            'Kanchenjunga Circuit Trek'                         => 2190,
            'Upper Mustang Classic Trek'                        => 2200,
            'Nar Phu Valley Trek with Annapurna Circuit'        => 1650,
            'Tsum Valley Trek'                                  => 1500,
            'Tamang Heritage Trek'                              => 690,
            'Everest Base Camp via Cho La Pass and Gokyo Lakes' => 1700,
            'Luxury Everest Base Camp Trek'                     => 2500,
            'Annapurna Excursion'                               => 600,
            'Annapurna Sanctuary Trek'                          => 1150,
            'Dhampus / Sarangkot / Chitwan Pack'                => 450,
            'Poon Hill Ghorepani Trek'                          => 550,
        ];
    }

    /**
     * Expedition prices — only trekking / sub-8000m peaks. The 8000m peaks are
     * deliberately omitted (see inquireOnlyExpeditions) because no major Nepali
     * outfitter publishes those prices publicly.
     */
    private function expeditionPrices(): array
    {
        return [
            'Lobuche Peak'                      => 2400,
            'Mt. Ama Dablam Expedition'         => 5500,
            'Mera Peak Expedition'              => 2300,
            'Island Peak Expedition (Imja Tse)' => 2100,
            'Mt. Pumori Expedition'             => 9000,
            'Mt. Baruntse Expedition'           => 11000,
        ];
    }

    /**
     * 8000m and prestige expeditions — render as "Price on request" on the
     * public site. Tashi prefers to quote these per-client during the inquiry
     * conversation.
     */
    private function inquireOnlyExpeditions(): array
    {
        return [
            'Mt. Everest Expedition - South',
            'Mt. Everest Expedition - North',
            'Mt. K2 Expedition',
            'Mt. Kanchenjunga Expedition',
            'Mt. Lhotse Expedition',
            'Mt. Makalu Expedition',
            'Mt. Cho-Oyu Expedition',
            'Mt. Dhaulagiri Expedition',
            'Mt. Manaslu Expedition',
            'Mt. Annapurna I Expedition',
            'VIP Everest Expedition',
            'VVIP Manaslu Expedition',
        ];
    }

    /**
     * Tours / Activities — short trips, day tours, helicopter packages.
     */
    private function tourPrices(): array
    {
        return [
            'Kathmandu Valley Sightseeing Tour'   => 80,
            'Mountain Biking in Kathmandu Valley' => 110,
            'Kathmandu City Running Tour'         => 60,
            'Ultimate Photography Tour of Nepal'  => 1800,
            'Cultural Tour of Bhaktapur'          => 50,
            'Helicopter Tour to Everest Base Camp' => 1300,  // HWW Everest Heli Tour
            'Helicopter Rescue Service'           => 5000,
        ];
    }
}
