<?php

namespace App\Filament\Resources\DestinationResource\Pages;

use App\Filament\Resources\DestinationResource;
use App\Traits\Filament\TranslatableCreateRecord;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDestination extends CreateRecord
{
    use TranslatableCreateRecord;

    protected static string $resource = DestinationResource::class;
}
