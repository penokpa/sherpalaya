<?php

namespace App\Filament\Resources\ExpeditionResource\Pages;

use App\Filament\Resources\ExpeditionResource;
use App\Traits\Filament\TranslatableCreateRecord;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateExpedition extends CreateRecord
{
    use TranslatableCreateRecord;
    protected static string $resource = ExpeditionResource::class;
}
