<?php

namespace App\Enums;

use App\Models\Destination;
use App\Models\Expedition;
use App\Models\Region;
use App\Models\Service;
use App\Models\Tour;
use App\Models\Trek;
use Filament\Support\Contracts\HasLabel;

enum SearchType: string implements HasLabel
{
    // case DESTINATION = 'destination';
    case EXPEDITION = 'expedition';
    // case REGION = 'region';
    case SERVICE = 'service';
    case TOUR = 'tour';
    case TREK = 'trek';

    public function search(string $query)
    {
        return match ($this) {
            // self::DESTINATION => Destination::search($query),
            self::EXPEDITION => Expedition::search($query),
            // self::REGION => Region::search($query),
            self::SERVICE => Service::search($query),
            self::TOUR => Tour::search($query),
            self::TREK => Trek::search($query),
        };
    }

    public function getLabel(): ?string
    {
        return match ($this) {
            // self::DESTINATION => "Destination",
            self::EXPEDITION => "Expedition",
            // self::REGION => "Region",
            self::SERVICE => "Service",
            self::TOUR => "Tour",
            self::TREK => "Trek",
        };
    }
}
