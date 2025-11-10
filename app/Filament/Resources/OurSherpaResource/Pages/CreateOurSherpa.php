<?php

namespace App\Filament\Resources\OurSherpaResource\Pages;

use App\Filament\Resources\OurSherpaResource;
use App\Traits\Filament\TranslatableCreateRecord;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateOurSherpa extends CreateRecord
{
    use TranslatableCreateRecord;
    protected static string $resource = OurSherpaResource::class;
}
