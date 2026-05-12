<?php

namespace App\Enums;

use App\Contracts\EnumHasTranslation;
use App\Traits\TranslatableEnum;

enum InquiryType: string implements EnumHasTranslation
{
    use TranslatableEnum;

    case BOOKING = 'booking';
    case INQUIRY = 'inquiry';

    public static function getTranslationKey(): string {
        return 'enums.inquiry-types';
    }
}
