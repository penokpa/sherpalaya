<?php

namespace App\Filament\Resources\RegionResource\Pages;

use App\Filament\Resources\RegionResource;
use App\Filament\Resources\RegionResource\Widgets\RegionExpeditionTable;
use App\Filament\Resources\RegionResource\Widgets\RegionMultiWidget;
use App\Filament\Resources\RegionResource\Widgets\RegionStats;
use App\Filament\Resources\RegionResource\Widgets\RegionTrekTable;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewRegion extends ViewRecord
{
    protected static string $resource = RegionResource::class;

    public function getTitle(): string
    {
        return $this->getRecord()->name; // Assuming the Region model has a "name" field
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
    protected function getHeaderWidgets(): array
    {
        return [
            RegionStats::class,
            RegionMultiWidget::class,
        ];
    }
}
