<?php

namespace App\Providers\Filament;

use App\Filament\Pages\SettingPage;
use App\Filament\Pages\Settings\ManageLandingPage;
use App\Filament\Resources\DestinationResource;
use App\Filament\Resources\ExpeditionResource;
use App\Filament\Resources\OurSherpaResource;
use App\Filament\Resources\RegionResource;
use App\Filament\Resources\TrekResource;
use App\Filament\Resources\TourResource;
use App\Filament\Resources\CategoryResource;
use App\Filament\Resources\UserResource;
use Awcodes\Curator\Resources\MediaResource;
use Awcodes\Overlook\OverlookPlugin;
use Awcodes\Overlook\Widgets\OverlookWidget;
use Filament\Http\Middleware\Authenticate;
use BezhanSalleh\FilamentShield\FilamentShieldPlugin;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\MenuItem;
use Filament\Navigation\NavigationItem;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\SpatieLaravelTranslatablePlugin;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Outerweb\FilamentTranslatableFields\Filament\Plugins\FilamentTranslatableFieldsPlugin;
use Swis\Filament\Backgrounds\FilamentBackgroundsPlugin;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->font('Quicksand')
            // ->topbar(false)
            // ->topNavigation()
            // ->sidebarCollapsibleOnDesktop()
            // ->collapsedSidebarWidth('9rem')
            ->viteTheme('resources/css/filament/admin/theme.css')
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                // Widgets\AccountWidget::class,
                // Widgets\FilamentInfoWidget::class,
                OverlookWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->plugins([
                SpatieLaravelTranslatablePlugin::make()
                    ->defaultLocales(['en', 'fr']),

                FilamentTranslatableFieldsPlugin::make()
                    ->supportedLocales([
                        'en' => 'English',
                        'fr' => 'French',
                    ]),
                OverlookPlugin::make()
                    ->columns(4)
                    ->includes([
                        ExpeditionResource::class,
                        TrekResource::class,
                        TourResource::class,
                        OurSherpaResource::class,
                        MediaResource::class,
                        CategoryResource::class,
                        RegionResource::class,
                        DestinationResource::class,
                    ]),
                FilamentShieldPlugin::make(),
                FilamentBackgroundsPlugin::make()
                    ->showAttribution(false),
                \Awcodes\Curator\CuratorPlugin::make()
                    ->label('Media')
                    ->pluralLabel('Media')
                    ->navigationIcon('heroicon-o-photo')
                    ->navigationGroup('Content')
                    ->navigationSort(5)
                    // ->navigationCountBadge()
                    ->registerNavigation(true)
            ])
            ->navigationItems([
                NavigationItem::make('Sherpalaya Home')
                    ->url('/en/home', shouldOpenInNewTab: true)
                    ->icon('heroicon-o-chevron-double-up'),
            ])
            ->navigationGroups([
                'Content',
                'Info',
                'Site',
                'Control',
            ])
            ->userMenuItems([
                MenuItem::make()
                    ->label('Users')
                    ->url(fn(): string => UserResource::getUrl())
                    ->icon('heroicon-o-users'),
                MenuItem::make()
                    ->label('Roles')
                    ->url('/admin/shield/roles')
                    ->icon('heroicon-o-tag'),
                MenuItem::make()
                    ->label('Settings')
                    ->url(fn(): string => SettingPage::getUrl())
                    ->icon('heroicon-o-cog'),
            ]);
    }
}
