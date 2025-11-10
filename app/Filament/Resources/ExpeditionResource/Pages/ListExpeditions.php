<?php

namespace App\Filament\Resources\ExpeditionResource\Pages;

use App\Filament\Resources\ExpeditionResource;
use App\Traits\Filament\TranslatableListRecords;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListExpeditions extends ListRecords
{
    use TranslatableListRecords;

    protected static string $resource = ExpeditionResource::class;

    protected function getAdditionalHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
