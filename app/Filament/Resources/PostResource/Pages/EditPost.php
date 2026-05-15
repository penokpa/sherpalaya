<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use App\Traits\Filament\TranslatableEditRecord;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPost extends EditRecord
{
    use TranslatableEditRecord;

    protected static string $resource = PostResource::class;

    protected function getAdditionalHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
