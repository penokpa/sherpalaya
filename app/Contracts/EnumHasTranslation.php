<?php

namespace App\Contracts;

use Filament\Support\Contracts\HasLabel;

interface EnumHasTranslation extends HasLabel
{

    public static function getTranslationKey(): string;

    public static function getAllTranslatedOptions($locale): array;
    public function getTranslatedOption($locale): string;
}
