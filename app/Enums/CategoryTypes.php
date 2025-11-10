<?php

namespace App\Enums;

use App\Contracts\EnumHasTranslation;
use App\Traits\TranslatableEnum;
use Filament\Support\Contracts\HasLabel;


enum CategoryTypes: string implements EnumHasTranslation
{
    use TranslatableEnum;

    
    case EXPEDITION = 'expedition';
    case TREK = 'trek';
    case TOUR = 'tour';


    public static function getTranslationKey(): string {
        return 'enums.category-type';
    }
}
