<?php

namespace App\Traits;

use App\Filament\Pages\Settings\ManageAboutUs;
use App\Filament\Pages\Settings\ManageCache;
use App\Filament\Pages\Settings\ManageCompany;
use App\Filament\Pages\Settings\ManageContactUs;
use App\Filament\Pages\Settings\ManageLandingPage;
use App\Filament\Pages\Settings\ManageLegal;
use App\Filament\Pages\Settings\ManagePage;
use AymanAlhattami\FilamentPageWithSidebar\FilamentPageSidebar;
use AymanAlhattami\FilamentPageWithSidebar\PageNavigationItem;
use AymanAlhattami\FilamentPageWithSidebar\Traits\HasPageSidebar;

trait HasSettingsSidebar
{
    use HasPageSidebar;

    public static function sidebar(): FilamentPageSidebar
    {
        return FilamentPageSidebar::make()
            ->setTitle('Settings')
            ->setNavigationItems([
                PageNavigationItem::make()
                    ->url(ManageLandingPage::getUrl())
                    ->label('Animation / Home')
                    ->icon('heroicon-o-computer-desktop')
                    ->isActiveWhen(function () {
                        return request()->routeIs(ManageLandingPage::getRouteName());
                    })
                    ->visible(true),
                PageNavigationItem::make('Pages')
                    ->url(ManagePage::getUrl())
                    ->icon('heroicon-o-clipboard')
                    ->isActiveWhen(function () {
                        return request()->routeIs(ManagePage::getRouteName());
                    })
                    ->visible(true),
                PageNavigationItem::make('Contact Us')
                    ->url(ManageContactUs::getUrl())
                    ->icon('heroicon-o-phone')
                    ->isActiveWhen(function () {
                        return request()->routeIs(ManageContactUs::getRouteName());
                    })
                    ->visible(true),
                PageNavigationItem::make('Company')
                    ->url(ManageCompany::getUrl())
                    ->icon('heroicon-o-building-office')
                    ->isActiveWhen(function () {
                        return request()->routeIs(ManageCompany::getRouteName());
                    })
                    ->visible(true),
                PageNavigationItem::make('Legal')
                    ->url(ManageLegal::getUrl())
                    ->icon('heroicon-o-bars-3')
                    ->isActiveWhen(function () {
                        return request()->routeIs(ManageLegal::getRouteName());
                    })
                    ->visible(true),
                PageNavigationItem::make('About Us')
                    ->url(ManageAboutUs::getUrl())
                    ->icon('heroicon-o-building-storefront')
                    ->isActiveWhen(function () {
                        return request()->routeIs(ManageAboutUs::getRouteName());
                    })
                    ->visible(true),
                PageNavigationItem::make('Cache')
                    ->url(ManageCache::getUrl())
                    ->icon('heroicon-o-archive-box')
                    ->isActiveWhen(function () {
                        return request()->routeIs(ManageCache::getRouteName());
                    })
                    ->visible(true),
            ]);
    }
}
