<?php
namespace App\Traits\Filament;

use Filament\Resources\Concerns\Translatable;

trait TranslatableResource
{
    use Translatable;

    public static function getTranslatableLocales(): array
    {
        return ['en', 'fr'];
    }
}
