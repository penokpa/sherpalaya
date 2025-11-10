<?php

namespace App\Enums;
use Filament\Support\Contracts\HasLabel;

enum DestinationType: string implements  HasLabel
{
    case MOUNTAIN = 'mountain';
    case ROUTE = 'route';
    case RIVER = 'river';
    case MONASTERY = 'monastery';
    case TEMPLE = 'temple';
    case JUNGLE = 'jungle';
    case VILLAGE = 'village';
    case TEASHOP = 'tea-shop';

    public function getLabel(): string
    {
        return match ($this){
            self::MOUNTAIN => 'Mountain',
            self::ROUTE => 'Route',
            self::RIVER => 'River',
            self::MONASTERY => 'Monastery',
            self::TEMPLE => 'Temple',
            self::JUNGLE => 'Jungle',
            self::VILLAGE => 'Village',
            self::TEASHOP => 'Tea Shop',
        };
    }
}
