<?php

namespace App\Filament\Resources\DestinationResource\Pages;

use App\Filament\Resources\DestinationResource;
use App\Traits\Filament\TranslatableEditRecord;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDestination extends EditRecord
{
    use TranslatableEditRecord;

    protected static string $resource = DestinationResource::class;

    protected function getAdditionalHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
