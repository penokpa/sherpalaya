<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\DestinationResource;
use App\Filament\Resources\RegionResource;
use App\Filament\Resources\ServiceResource;
use App\Models\Destination;
use App\Models\Region;
use App\Models\Service;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatWidget extends BaseWidget
{
    protected static ?int $sort = 2;
    // protected ?string $heading = '';


    protected function getStats(): array
    {
        return [
            // Stat::make('Regions', Region::count())
            //     ->description('')
            //     ->icon('heroicon-m-map')
            //     ->url(RegionResource::getUrl()),
            // Stat::make('Destinations', Destination::count())
            //     ->description('In all regions')
            //     ->icon('heroicon-m-map-pin')
            //     ->url(DestinationResource::getUrl()),
            // Stat::make('Services', Service::count())
            //     ->description('Offered')
            //     ->icon('heroicon-m-rectangle-stack')
            //     ->url(ServiceResource::getUrl()),
        ];
    }
}
