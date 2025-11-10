<?php

namespace App\Enums;
use App\Contracts\EnumHasTranslation;
use App\Traits\TranslatableEnum;



enum ItineraryTypes: string implements EnumHasTranslation
{
    use TranslatableEnum;
    case FLIGHT = 'flight';
    case DRIVE = 'drive';
    case TREK = 'trek';
    case TREK_HOURS = 'trek-hours';
    case REST = 'rest';
    case ACCOMODATION = 'accomodation';
    case HIMALAYA = 'himalaya';
    case ALTITUDE = 'altitude';
    case HELICOPTER = 'helicopter';
    case OTHERS = 'others';

    public static function getTranslationKey(): string {
        return 'enums.itinerary-types';
    }

}
