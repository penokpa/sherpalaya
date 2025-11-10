<?php

namespace App\Filament\Resources\OurSherpaResource\Pages;

use App\Filament\Resources\OurSherpaResource;
use App\Filament\Resources\OurSherpaResource\Widgets\SherpaExpeditionsTableWidget;
use App\Filament\Resources\OurSherpaResource\Widgets\SherpaMultiWidget;
use App\Traits\Filament\TranslatableViewRecord;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewOurSherpa extends ViewRecord
{
    use TranslatableViewRecord;

    protected static string $resource = OurSherpaResource::class;

    protected function getAdditionalHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
    protected function getFooterWidgets(): array
    {
        return [
            SherpaMultiWidget::class,

        ];
    }
}
