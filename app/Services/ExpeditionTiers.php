<?php

namespace App\Services;

use App\Models\Expedition;

/**
 * Hard-coded service-tier definitions for marquee expeditions.
 *
 * Each tier returns: name, summary, image (relative to /photos), and an
 * `includes` array of 4-5 key inclusions. Pricing is intentionally absent
 * — Tashi quotes each tier on inquiry.
 *
 * Move this to a DB column when tiers need admin editing.
 */
class ExpeditionTiers
{
    public static function forExpedition(Expedition $expedition): ?array
    {
        $title = trim((string) $expedition->getTranslation('title', 'en', false));

        return match ($title) {
            'Mt. Everest Expedition - South' => self::everestTiers(),
            'Mt. Manaslu Expedition'         => self::manasluTiers(),
            default                          => null,
        };
    }

    private static function everestTiers(): array
    {
        return [
            [
                'name'    => 'Classic',
                'summary' => 'Standard Sherpa-supported expedition. The right tier for most experienced climbers.',
                'image'   => 'photos/basecamp.JPG',
                'includes' => [
                    '1 climbing Sherpa per 2 clients above Base Camp',
                    '5 oxygen bottles per client',
                    'Group dining tent at Base Camp',
                    'Walk-in approach via Lukla',
                ],
            ],
            [
                'name'    => 'Premium',
                'summary' => '1:1 Sherpa support and extra oxygen. Recommended for first-time 8,000m climbers.',
                'image'   => 'photos/mountain2.jpg',
                'includes' => [
                    '1 climbing Sherpa per client',
                    '7 oxygen bottles per client',
                    'Personal climbing tent at Base Camp',
                    'Higher-grade down suit and boots',
                ],
            ],
            [
                'name'    => 'VIP',
                'summary' => 'Helicopter access, dedicated chef, heated dining tent. For climbers who value comfort and time.',
                'image'   => 'photos/servicehelicopter.jpg',
                'includes' => [
                    '1 Sherpa + 1 assistant Sherpa per client',
                    'Unlimited oxygen above South Col',
                    'Heated dining tent + personal chef',
                    'Helicopter transfers Kathmandu ↔ Base Camp',
                ],
            ],
            [
                'name'    => 'VVIP',
                'summary' => 'Full bespoke. The most comfortable Everest service we offer — nothing matters except the summit.',
                'image'   => 'photos/trekbanner.jpg',
                'includes' => [
                    '2 dedicated Sherpas (1:1) throughout',
                    'Unlimited oxygen from Camp 2 upward',
                    'Private heated luxury tents',
                    'IFMGA-certified mountain guide',
                    'Personal chef + butler service',
                ],
            ],
        ];
    }

    private static function manasluTiers(): array
    {
        return [
            [
                'name'    => 'Classic',
                'summary' => 'Standard Sherpa-supported. Right for climbers with prior 6,000m experience.',
                'image'   => 'photos/basecamp2.JPG',
                'includes' => [
                    '1 climbing Sherpa per 2 clients',
                    '3 oxygen bottles per client',
                    'Group dining tent at Base Camp',
                    'Walk-in approach via Soti Khola',
                ],
            ],
            [
                'name'    => 'Premium',
                'summary' => '1:1 Sherpa support and extra oxygen. The safe upgrade for first 8,000m attempts.',
                'image'   => 'photos/mountain2.jpg',
                'includes' => [
                    '1 climbing Sherpa per client',
                    '4–5 oxygen bottles per client',
                    'Personal tent at Base Camp',
                    'Optional helicopter return from Samagaon',
                ],
            ],
            [
                'name'    => 'VVIP',
                'summary' => 'Full bespoke. Summit without the three-week walk-in.',
                'image'   => 'photos/servicehelicopter.jpg',
                'includes' => [
                    '2 dedicated Sherpas (1:1) throughout',
                    'Unlimited oxygen above Camp 2',
                    'Helicopter to and from Base Camp',
                    'Private heated luxury tents',
                    'Personal chef + butler service',
                ],
            ],
        ];
    }
}
