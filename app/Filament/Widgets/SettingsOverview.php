<?php

namespace App\Filament\Widgets;

use App\Filament\Pages\Settings\ManageAboutUs;
use App\Filament\Pages\Settings\ManageCache;
use App\Filament\Pages\Settings\ManageCompany;
use App\Filament\Pages\Settings\ManageContactUs;
use App\Filament\Pages\Settings\ManageLandingPage;
use App\Filament\Pages\Settings\ManageLegal;
use App\Filament\Pages\Settings\ManagePage;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class SettingsOverview extends BaseWidget
{
    protected static ?int $sort = 2;

    protected function getStats(): array
    {
        return [
            Stat::make('Manage', 'Home Page')
                ->url(ManageLandingPage::getUrl()),
            Stat::make('Manage', 'List Pages')
                ->url(ManagePage::getUrl()),
            Stat::make('Manage', 'Company Info')
                ->url(ManageCompany::getUrl()),
            Stat::make('Manage', 'Legal Details')
                ->url(ManageLegal::getUrl()),
            Stat::make('Manage', 'About Us')
                ->url(ManageAboutUs::getUrl()),
            Stat::make('Manage', 'Contact Us')
                ->url(ManageContactUs::getUrl()),
            Stat::make('Manage', 'Cache')
                ->url(ManageCache::getUrl()),
        ];
    }
}
