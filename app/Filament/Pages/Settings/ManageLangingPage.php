<?php

namespace App\Filament\Pages\Settings;

use Filament\Forms;
use Filament\Forms\Form;
use Illuminate\Support\Str;
use Filament\Pages\SettingsPage;
use App\Traits\HasSettingsSidebar;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Tabs;
use App\Settings\LandingPageSetting;
use Filament\Forms\Components\Hidden;
use App\Filament\Fields\CuratorPicker;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\HtmlString;

class ManageLangingPage extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string $settings = LandingPageSetting::class;

    use HasSettingsSidebar;

    // Hide page from main navigation
    protected static bool $shouldRegisterNavigation = false;


    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make()
                    ->columnSpanFull()
                    ->tabs([
                        Tabs\Tab::make('Animation')
                            ->schema([
                                // General animation settings

                                Placeholder::make('general_animation_settings_placeholder')
                                    ->dehydrated(false)
                                    ->hiddenLabel()
                                    ->content(
                                        new HtmlString('
                                            <h1 class="text-lg font-bold">
                                                <span class="no-underline">> </span>
                                                <span class="underline">General</span>
                                            </h1>
                                        ')
                                    ),
                                Grid::make(2)
                                    ->schema([
                                        CuratorPicker::make('ask_for_animation_image_id')
                                            ->required(),
                                        Grid::make(1)
                                            ->columnSpan(1)
                                            ->schema([
                                                TextInput::make('ask_for_animation_title')
                                                    ->required(),
                                                Textarea::make('ask_for_animation_content')
                                                    ->required(),
                                                Grid::make(3)
                                                    ->columnSpan(1)
                                                    ->schema([
                                                        TextInput::make('ask_for_animation_positive_response')
                                                            ->label('Start button text')
                                                            ->required(),
                                                        TextInput::make('ask_for_animation_negative_response')
                                                            ->label('Skip button text')
                                                            ->required(),
                                                        TextInput::make('animation_button_text')
                                                            ->label('Continue to site')
                                                            // ->hint('after animation ends')
                                                            ->required(),
                                                    ])
                                            ]),
                                    ]),

                                Grid::make(2)
                                    ->schema([
                                        CuratorPicker::make('animation_button_icon_id')
                                            ->required(),
                                        CuratorPicker::make('animation_sound_id')
                                            ->required(),
                                    ]),

                                // Animation sections

                                Placeholder::make('animation_sections_placeholder')
                                    ->dehydrated(false)
                                    ->hiddenLabel()
                                    ->content(
                                        new HtmlString('
                                            <h1 class="text-lg font-bold mt-6">
                                                <span class="no-underline">> </span>
                                                <span class="underline">Animation Sections</span>
                                            </h1>
                                        ')
                                    ),

                                Repeater::make('animation_sections')
                                    ->hiddenLabel()
                                    ->schema([
                                        Hidden::make('id')
                                            ->default(fake()->regexify('[A-Za-z]{10}')),
                                        Grid::make(2)
                                            ->schema([
                                                CuratorPicker::make('images')
                                                    ->required()
                                                    ->label('Images')
                                                    ->columnSpanFull()
                                                    ->multiple(),
                                            ]),
                                        Grid::make(6)
                                            ->schema([
                                                TextInput::make('title')
                                                    ->required()
                                                    ->columnSpan(4),
                                                TextInput::make('wait_time')
                                                    ->numeric()
                                                    ->minValue(0)
                                                    ->default(2)
                                                    ->required()
                                                    ->columnSpan(2),
                                                
                                                CuratorPicker::make('icon_id')
                                                    ->label('Animation Icon')
                                                    ->required()
                                                    ->columnSpan(3),
                                                Textarea::make('content')
                                                    ->required()
                                                    ->columnSpan(3),
                                            ]),

                                    ]),


                            ]),
                        Tabs\Tab::make('Expedition Activity')
                            ->schema([
                                CuratorPicker::make('expedition_activity_image_id')
                                    ->required(),
                                TextInput::make('expedition_activity_count')
                                    ->required(),
                                Textarea::make('expedition_activity_content')
                                    ->required()
                            ]),
                        Tabs\Tab::make('Trek Activity')
                            ->schema([
                                CuratorPicker::make('trek_activity_image_id')
                                    ->required(),
                                TextInput::make('trek_activity_count')
                                    ->required(),
                                Textarea::make('trek_activity_content')
                                    ->required()
                            ]),
                        Tabs\Tab::make('Tour Activity')
                            ->schema([
                                CuratorPicker::make('tour_activity_image_id')
                                    ->required(),
                                TextInput::make('tour_activity_count')
                                    ->required(),
                                Textarea::make('tour_activity_content')
                                    ->required()
                            ]),
                        Tabs\Tab::make('Peak Activity')
                            ->schema([
                                CuratorPicker::make('peak_activity_image_id')
                                    ->required(),
                                TextInput::make('peak_activity_count')
                                    ->required(),
                                Textarea::make('peak_activity_content')
                                    ->required()
                            ]),

                        Tabs\Tab::make('Stats')
                            ->schema([
                                TextInput::make('stat_traveller_count')
                                    ->label("Traveller count")
                                    ->required(),
                                TextInput::make('stat_association_count')
                                    ->required(),
                                TextInput::make('stat_customer_feedback')
                                    ->label("Customer feedback")
                                    ->suffix('out of 10')
                                    ->required(),
                                TextInput::make('stat_success_rate')
                                    ->label("Success rate")
                                    ->suffix('%')
                                    ->required(),
                            ]),
                        Tabs\Tab::make('Parallax')
                            ->schema([
                                CuratorPicker::make('parallax_image_id')
                                    ->required(),
                            ]),
                    ]),
            ]);
    }
}
