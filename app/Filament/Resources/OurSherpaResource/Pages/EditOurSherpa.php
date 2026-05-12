<?php

namespace App\Filament\Resources\OurSherpaResource\Pages;

use App\Filament\Resources\OurSherpaResource;
use App\Traits\Filament\TranslatableEditRecord;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOurSherpa extends EditRecord
{
    use TranslatableEditRecord;

    protected static string $resource = OurSherpaResource::class;

    protected function getAdditionalHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
