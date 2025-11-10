<?php

namespace App\Filament\Pages\Settings;

use App\Filament\Fields\CuratorPicker;
use App\Settings\PageSetting;
use App\Traits\HasSettingsSidebar;
use Filament\Forms;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class ManagePage extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string $settings = PageSetting::class;

    use HasSettingsSidebar;

    // Hide page from main navigation
    protected static bool $shouldRegisterNavigation = false;


    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make()
                    ->columnSpanFull()
                    ->schema([
                        Tabs\Tab::make('Expedition')
                            ->schema([
                                CuratorPicker::make('expedition_page_cover_image_id')
                                    ->required(),
                                Textarea::make('expedition_page_content')
                                    ->required()
                            ]),
                        Tabs\Tab::make('Trek')
                            ->schema([
                                CuratorPicker::make('trek_page_cover_image_id')
                                    ->required(),
                                Textarea::make('trek_page_content')
                                    ->required()
                            ]),
                        Tabs\Tab::make('Tour')
                            ->schema([
                                CuratorPicker::make('tour_page_cover_image_id')
                                    ->required(),
                                Textarea::make('tour_page_content')
                                    ->required()
                            ]),
                        Tabs\Tab::make('Service')
                            ->schema([
                                CuratorPicker::make('service_page_cover_image_id')
                                    ->required(),
                                Textarea::make('service_page_content')
                                    ->required()
                            ]),
                    ])
            ]);
    }
}
