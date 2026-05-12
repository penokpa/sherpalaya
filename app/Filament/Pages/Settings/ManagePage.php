<?php

namespace App\Filament\Pages\Settings;

use App\Filament\Fields\CuratorPicker;
use App\Settings\PageSetting;
use App\Traits\HasSettingsSidebar;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class ManagePage extends SettingsPage
{
    use HasPageShield;

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
                            ->columns(2)
                            ->schema([
                                CuratorPicker::make('expedition_page_cover_image_id')
                                    ->label('Exped Page Image')
                                    ->columnSpanFull()
                                    ->required(),

                                Section::make('English')
                                    ->columns(10)
                                    ->columnSpan(1)
                                    ->schema([
                                        Textarea::make('expedition_page_title_up_en')
                                            ->autosize()
                                            ->label('Exped Page Title (up)')
                                            ->columnSpan(6),
                                        Textarea::make('expedition_page_main_title_en')
                                            ->autosize()
                                            ->label('Exped Page Title (main)')
                                            ->columnSpanFull(),
                                        Textarea::make('expedition_page_title_down_en')
                                            ->autosize()
                                            ->columnSpan(8)
                                            ->label('Exped Page Title (down)'),
                                        Textarea::make('expedition_page_content_en')
                                            ->label('Exped Page Content')
                                            ->columnSpanFull()
                                            ->autosize()
                                            ->required(),
                                    ]),
                                Section::make('French')
                                    ->columns(10)
                                    ->columnSpan(1)
                                    ->schema([
                                        Textarea::make('expedition_page_title_up_fr')
                                            ->autosize()
                                            ->label('Exped Page Title (up)')
                                            ->columnSpan(6),
                                        Textarea::make('expedition_page_main_title_fr')
                                            ->autosize()
                                            ->label('Exped Page Title (main)')
                                            ->columnSpanFull(),
                                        Textarea::make('expedition_page_title_down_fr')
                                            ->autosize()
                                            ->columnSpan(8)
                                            ->label('Exped Page Title (down)'),
                                        Textarea::make('expedition_page_content_fr')
                                            ->label('Exped Page Content')
                                            ->columnSpanFull()
                                            ->autosize()
                                            ->required(),
                                    ]),
                            ]),
                        Tabs\Tab::make('Trek')
                            ->columns(2)
                            ->schema([
                                CuratorPicker::make('trek_page_cover_image_id')
                                    ->label('Trek Page Image')
                                    ->columnSpanFull()
                                    ->required(),

                                Section::make('English')
                                    ->columns(10)
                                    ->columnSpan(1)
                                    ->schema([
                                        Textarea::make('trek_page_title_up_en')
                                            ->autosize()
                                            ->label('Trek Page Title (up)')
                                            ->columnSpan(6),
                                        Textarea::make('trek_page_main_title_en')
                                            ->autosize()
                                            ->label('Trek Page Title (main)')
                                            ->columnSpanFull(),
                                        Textarea::make('trek_page_title_down_en')
                                            ->autosize()
                                            ->columnSpan(8)
                                            ->label('Trek Page Title (down)'),
                                        Textarea::make('trek_page_content_en')
                                            ->label('Trek Page Content')
                                            ->columnSpanFull()
                                            ->autosize()
                                            ->required(),
                                    ]),
                                Section::make('French')
                                    ->columns(10)
                                    ->columnSpan(1)
                                    ->schema([
                                        Textarea::make('trek_page_title_up_fr')
                                            ->autosize()
                                            ->label('Trek Page Title (up)')
                                            ->columnSpan(6),
                                        Textarea::make('trek_page_main_title_fr')
                                            ->autosize()
                                            ->label('Trek Page Title (main)')
                                            ->columnSpanFull(),
                                        Textarea::make('trek_page_title_down_fr')
                                            ->autosize()
                                            ->columnSpan(8)
                                            ->label('Trek Page Title (down)'),
                                        Textarea::make('trek_page_content_fr')
                                            ->label('Trek Page Content')
                                            ->columnSpanFull()
                                            ->autosize()
                                            ->required(),
                                    ]),
                            ]),
                        Tabs\Tab::make('Activity')
                            ->columns(2)
                            ->schema([
                                CuratorPicker::make('tour_page_cover_image_id')
                                    ->label('Activity Page Image')
                                    ->columnSpanFull()
                                    ->required(),
                                Section::make('English')
                                    ->columns(10)
                                    ->columnSpan(1)
                                    ->schema([
                                        Textarea::make('tour_page_title_up_en')
                                            ->autosize()
                                            ->label('Activity Page Title (up)')
                                            ->columnSpan(6),
                                        Textarea::make('tour_page_main_title_en')
                                            ->autosize()
                                            ->label('Activity Page Title (main)')
                                            ->columnSpanFull(),
                                        Textarea::make('tour_page_title_down_en')
                                            ->autosize()
                                            ->columnSpan(8)
                                            ->label('Activity Page Title (down)'),
                                        Textarea::make('tour_page_content_en')
                                            ->label('Activity Page Content')
                                            ->columnSpanFull()
                                            ->autosize()
                                            ->required(),
                                    ]),
                                Section::make('French')
                                    ->columns(10)
                                    ->columnSpan(1)
                                    ->schema([
                                        Textarea::make('tour_page_title_up_fr')
                                            ->autosize()
                                            ->label('Activity Page Title (up)')
                                            ->columnSpan(6),
                                        Textarea::make('tour_page_main_title_fr')
                                            ->autosize()
                                            ->label('Activity Page Title (main)')
                                            ->columnSpanFull(),
                                        Textarea::make('tour_page_title_down_fr')
                                            ->autosize()
                                            ->columnSpan(8)
                                            ->label('Activity Page Title (down)'),
                                        Textarea::make('tour_page_content_fr')
                                            ->label('Activity Page Content')
                                            ->columnSpanFull()
                                            ->autosize()
                                            ->required(),
                                    ]),
                            ]),
                        Tabs\Tab::make('Our Team')
                        ->columns(2)
                            ->schema([
                                CuratorPicker::make('team_page_cover_image_id')
                                    ->label('Team Page Image')
                                    ->columnSpanFull()
                                    ->required(),
                                Section::make('English')
                                    ->columns(10)
                                    ->columnSpan(1)
                                    ->schema([
                                        Textarea::make('team_page_title_up_en')
                                            ->autosize()
                                            ->label('Team Page Title (up)')
                                            ->columnSpan(6),
                                        Textarea::make('team_page_main_title_en')
                                            ->autosize()
                                            ->label('Team Page Title (main)')
                                            ->columnSpanFull(),
                                        Textarea::make('team_page_title_down_en')
                                            ->autosize()
                                            ->columnSpan(8)
                                            ->label('Team Page Title (down)'),
                                        Textarea::make('team_page_content_title_en')
                                            ->autosize()
                                            ->label('Team Page Content Title')
                                            ->columnSpanFull(),
                                        Textarea::make('team_page_content_en')
                                            ->label('Team Page Content')
                                            ->columnSpanFull()
                                            ->autosize()
                                            ->required(),
                                    ]),
                                Section::make('French')
                                    ->columns(10)
                                    ->columnSpan(1)
                                    ->schema([
                                        Textarea::make('team_page_title_up_fr')
                                            ->autosize()
                                            ->label('Team Page Title (up)')
                                            ->columnSpan(6),
                                        Textarea::make('team_page_main_title_fr')
                                            ->autosize()
                                            ->label('Team Page Title (main)')
                                            ->columnSpanFull(),
                                        Textarea::make('team_page_title_down_fr')
                                            ->autosize()
                                            ->columnSpan(8)
                                            ->label('Team Page Title (down)'),

                                        Textarea::make('team_page_content_title_fr')
                                            ->autosize()
                                            ->label('Team Page Content Title')
                                            ->columnSpanFull(),
                                        Textarea::make('team_page_content_fr')
                                            ->label('Team Page Content')
                                            ->columnSpanFull()
                                            ->autosize()
                                            ->required(),
                                    ]),
                            ]),
                    ])
            ]);
    }
}
