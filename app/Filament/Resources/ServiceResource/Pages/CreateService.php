<?php

namespace App\Filament\Resources\ServiceResource\Pages;

use App\Filament\Resources\ServiceResource;
use App\Traits\Filament\TranslatableCreateRecord;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateService extends CreateRecord
{
    use TranslatableCreateRecord;

    protected static string $resource = ServiceResource::class;
}
