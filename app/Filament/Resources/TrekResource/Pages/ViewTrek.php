<?php

namespace App\Filament\Resources\TrekResource\Pages;

use App\Filament\Resources\TrekResource;
use App\Traits\Filament\TranslatableViewRecord;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewTrek extends ViewRecord
{
    use TranslatableViewRecord;

    protected static string $resource = TrekResource::class;

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
