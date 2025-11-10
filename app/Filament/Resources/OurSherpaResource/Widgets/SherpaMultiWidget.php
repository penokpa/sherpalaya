<?php

namespace App\Filament\Resources\OurSherpaResource\Widgets;

use Filament\Widgets\Widget;
use Kenepa\MultiWidget\MultiWidget;

class SherpaMultiWidget extends MultiWidget
{
    public array $widgets = [
        SherpaExpeditionsTableWidget::class,
        SherpaTreksTableWidget::class,
        SherpaToursTableWidget::class,
    ];
}
