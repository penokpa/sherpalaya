<?php

namespace App\Filament\Resources\TrekResource\Pages;

use App\Filament\Resources\TrekResource;
use App\Traits\Filament\TranslatableListRecords;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTreks extends ListRecords
{
    use TranslatableListRecords;

    protected static string $resource = TrekResource::class;

    protected function getAdditionalHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
