<?php

namespace App\Filament\Resources\FaqResource\Pages;

use App\Filament\Resources\FaqResource;
use App\Traits\Filament\TranslatableCreateRecord;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFaq extends CreateRecord
{
    use TranslatableCreateRecord;

    protected static string $resource = FaqResource::class;
}
