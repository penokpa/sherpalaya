<?php

namespace App\Filament\Resources\TourResource\Pages;

use App\Filament\Resources\TourResource;
use App\Traits\Filament\TranslatableCreateRecord;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTour extends CreateRecord
{
    use TranslatableCreateRecord;

    protected static string $resource = TourResource::class;
}
