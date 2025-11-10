<?php

namespace App\Filament\Resources\DestinationResource\Widgets;

use Filament\Widgets\Widget;
use Kenepa\MultiWidget\MultiWidget;

class DestinationMultiWidget extends MultiWidget
{
    public array $widgets = [
        DestinationServiceTable::class,
        DestinationToursTable::class,
        DestinationExpeditionTable::class,
        DestinationTrekTable::class,
    ];
}
