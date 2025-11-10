<?php

namespace App\Filament\Resources\RegionResource\Widgets;

use Filament\Widgets\Widget;
use Kenepa\MultiWidget\MultiWidget;

class RegionMultiWidget extends MultiWidget
{
    public array $widgets = [
        RegionExpeditionTable::class,
        RegionTrekTable::class,
        RegionTourTable::class,
    ];
}
