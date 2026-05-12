<?php

namespace App\Filament\Resources\ExpeditionResource\Pages;

use App\Filament\Resources\ExpeditionResource;
use App\Traits\Filament\TranslatableEditRecord;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditExpedition extends EditRecord
{

    use TranslatableEditRecord;

    protected static string $resource = ExpeditionResource::class;

    protected function getAdditionalHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
