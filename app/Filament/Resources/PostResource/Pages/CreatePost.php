<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use App\Traits\Filament\TranslatableCreateRecord;
use Filament\Resources\Pages\CreateRecord;

class CreatePost extends CreateRecord
{
    use TranslatableCreateRecord;

    protected static string $resource = PostResource::class;
}
