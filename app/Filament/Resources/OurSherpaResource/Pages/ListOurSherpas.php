<?php

namespace App\Filament\Resources\OurSherpaResource\Pages;

use App\Filament\Resources\OurSherpaResource;
use App\Traits\Filament\TranslatableListRecords;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOurSherpas extends ListRecords
{
    use TranslatableListRecords;

    protected static string $resource = OurSherpaResource::class;

    protected function getAdditionalHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
