<?php

namespace App\Filament\Resources\ExpeditionResource\Pages;

use App\Filament\Resources\ExpeditionResource;
use App\Traits\Filament\TranslatableViewRecord;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewExpedition extends ViewRecord
{
    use TranslatableViewRecord;

    protected static string $resource = ExpeditionResource::class;

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
