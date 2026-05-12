<?php

namespace App\Filament\Resources\TourResource\Pages;

use App\Filament\Resources\TourResource;
use App\Traits\Filament\TranslatableEditRecord;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTour extends EditRecord
{
    use TranslatableEditRecord;

    protected static string $resource = TourResource::class;

    protected function getAdditionalHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
