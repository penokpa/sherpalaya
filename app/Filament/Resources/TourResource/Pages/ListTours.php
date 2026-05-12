<?php

namespace App\Filament\Resources\TourResource\Pages;

use App\Enums\TourType;
use App\Filament\Resources\TourResource;
use App\Traits\Filament\TranslatableListRecords;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListTours extends ListRecords
{
    use TranslatableListRecords;

    protected static string $resource = TourResource::class;

    protected function getAdditionalHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
