<?php

namespace App\Filament\Resources\TourResource\Pages;

use App\Filament\Resources\TourResource;
use App\Traits\Filament\TranslatableViewRecord;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewTour extends ViewRecord
{
    use TranslatableViewRecord;

    protected static string $resource = TourResource::class;

    public function getTitle(): string
    {
        return $this->getRecord()->title; // Assuming the Region model has a "name" field
    }
    protected function getAdditionalHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
