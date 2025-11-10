<?php

namespace App\Filament\Resources\TrekResource\Pages;

use App\Filament\Resources\TrekResource;
use App\Traits\Filament\TranslatableCreateRecord;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTrek extends CreateRecord
{
    use TranslatableCreateRecord;

    protected static string $resource = TrekResource::class;
}
