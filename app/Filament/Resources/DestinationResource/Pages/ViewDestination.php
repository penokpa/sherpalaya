<?php

namespace App\Filament\Resources\DestinationResource\Pages;

use App\Filament\Resources\DestinationResource;
use App\Filament\Resources\DestinationResource\Widgets\DestinationMultiWidget;
use App\Filament\Resources\DestinationResource\Widgets\DestinationToursTable;
use App\Traits\Filament\TranslatableViewRecord;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewDestination extends ViewRecord
{
    use TranslatableViewRecord;

    protected static string $resource = DestinationResource::class;

    protected function getAdditionalHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
    protected function getFooterWidgets(): array
    {
        return [
            DestinationMultiWidget::class,
        ];
    }
}
