<?php

namespace App\Enums;

use App\Contracts\EnumHasTranslation;
use App\Traits\TranslatableEnum;


enum TrekDifficulty: string implements EnumHasTranslation
{
    use TranslatableEnum;

    case EASY = 'easy';
    case MODERATE = 'moderate';
    case HARD = 'hard';
    case CHALLENGING = 'challenging';


    public static function getTranslationKey(): string {
        return 'enums.trek-difficulty';
    }
}
