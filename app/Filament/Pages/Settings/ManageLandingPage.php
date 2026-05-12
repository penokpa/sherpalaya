<?php

namespace App\Filament\Pages\Settings;

use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Illuminate\Support\Str;
use Filament\Pages\SettingsPage;
use App\Traits\HasSettingsSidebar;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Tabs;
use App\Settings\LandingPageSetting;
use Filament\Forms\Components\Hidden;
use App\Filament\Fields\CuratorPicker;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\HtmlString;

class ManageLandingPage extends SettingsPage
{
    use HasPageShield;

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
                                    ->columnSpanFull()
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
                                            ->label('Static Image Before Animation')
                                            ->columnSpanFull()
                                            ->required(),
                                        Section::make('English')
                                            ->columnSpan(1)
                                            ->schema([
                                                TextInput::make('ask_for_animation_title_en')
                                                    ->label('Title')
                                                    ->required(),
                                                Textarea::make('ask_for_animation_content_en')
                                                    ->label('Content')
                                                    ->autosize()
                                                    ->required(),
                                                Grid::make(3)
                                                    ->columnSpan(1)
                                                    ->schema([
                                                        TextInput::make('ask_for_animation_positive_response_en')
                                                            ->label('Start button')
                                                            ->required(),
                                                        TextInput::make('ask_for_animation_negative_response_en')
                                                            ->label('Skip button')
                                                            ->required(),
                                                        TextInput::make('animation_button_text_en')
                                                            ->label('End button')
                                                            ->required(),
                                                    ])
                                            ]),
                                        Section::make('French')
                                            ->columnSpan(1)
                                            ->schema([
                                                TextInput::make('ask_for_animation_title_fr')
                                                    ->label('Title')
                                                    ->required(),
                                                Textarea::make('ask_for_animation_content_fr')
                                                    ->label('Content')
                                                    ->autosize()
                                                    ->required(),
                                                Grid::make(3)
                                                    ->columnSpan(1)
                                                    ->schema([
                                                        TextInput::make('ask_for_animation_positive_response_fr')
                                                            ->label('Start button')
                                                            ->required(),
                                                        TextInput::make('ask_for_animation_negative_response_fr')
                                                            ->label('Skip button')
                                                            ->required(),
                                                        TextInput::make('animation_button_text_fr')
                                                            ->label('End button')
                                                            ->required(),
                                                    ])
                                            ]),
                                    ]),

                                Grid::make(2)
                                    ->schema([
                                        CuratorPicker::make('animation_button_icon_id')
                                            ->label('Button Icon')
                                            ->required(),
                                        CuratorPicker::make('animation_sound_id')
                                            ->label('Animation Sound')
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
                                    ->columns(2)
                                    ->schema([
                                        Hidden::make('id')
                                            ->default(fake()->regexify('[A-Za-z]{10}')),

                                        Section::make('English')
                                            ->columnSpan(1)
                                            ->schema([
                                                TextInput::make('title_en')
                                                    ->label('Title')
                                                    ->required(),
                                                Textarea::make('content_en')
                                                    ->autosize()
                                                    ->label('Content')
                                                    ->required()
                                            ]),
                                        Section::make('French')
                                            ->columnSpan(1)
                                            ->schema([
                                                TextInput::make('title_fr')
                                                    ->label('Title')
                                                    ->required(),
                                                Textarea::make('content_fr')
                                                    ->label('Content')
                                                    ->autosize()
                                                    ->required()
                                            ]),
                                        Section::make()
                                            ->columns(8)
                                            ->schema([
                                                TextInput::make('wait_time')
                                                    ->numeric()
                                                    ->minValue(0)
                                                    ->default(2)
                                                    ->required()
                                                    ->columnSpan(3),
                                                CuratorPicker::make('icon_id')
                                                    ->label('Animation Icon')
                                                    ->required()
                                                    ->columnSpan(3),
                                            ]),

                                        Grid::make(2)
                                            ->schema([
                                                CuratorPicker::make('images')
                                                    ->required()
                                                    ->label('Images')
                                                    ->columnSpanFull()
                                                    ->multiple(),
                                            ]),
                                    ]),


                            ]),
                        Tabs\Tab::make('Home Page')
                            ->schema([
                                Section::make('Header')
                                    ->columns(2)
                                    ->schema([
                                        Section::make('English')
                                            ->columnSpan(1)
                                            ->schema([
                                                TextInput::make('homepage_title_en')
                                                    ->label('Title')
                                                    ->required(),
                                                Textarea::make('homepage_description_en')
                                                    ->label('Description')
                                                    ->autosize()
                                                    ->required(),
                                            ]),
                                        Section::make('French')
                                            ->columnSpan(1)
                                            ->schema([
                                                TextInput::make('homepage_title_fr')
                                                    ->label('Title')
                                                    ->required(),

                                                Textarea::make('homepage_description_fr')
                                                    ->label('Description')
                                                    ->autosize()
                                                    ->required(),
                                            ]),
                                    ]),
                                Section::make('Cards')
                                    ->columns(4)
                                    ->schema([
                                        CuratorPicker::make('expedition_activity_image_id')
                                            ->required()
                                            ->label('Expedition Image')

                                            ->columnSpan(2),
                                        CuratorPicker::make('trek_activity_image_id')
                                            ->required()
                                            ->label('Trek Image')

                                            ->columnSpan(2),
                                        CuratorPicker::make('tour_activity_image_id')
                                            ->columnSpan(2)
                                            ->label('Activity Image')
                                            ->required(),
                                        CuratorPicker::make('peak_activity_image_id')
                                            ->columnSpan(2)
                                            ->label('Team Image')
                                            ->required(),
                                        TextInput::make('expedition_activity_count')
                                            ->label('Expeditions Count')
                                            ->required(),
                                        TextInput::make('trek_activity_count')
                                            ->label('Treks Count')
                                            ->required(),
                                        TextInput::make('tour_activity_count')
                                            ->label('Activities Count')
                                            ->required(),
                                        TextInput::make('peak_activity_count')
                                            ->label('Team message')
                                            ->required(),
                                    ]),
                                Section::make('Stats')
                                    ->columns(2)
                                    ->schema([
                                        TextInput::make('stat_traveller_count')
                                            ->label("Travellers Count")
                                            ->required(),
                                        TextInput::make('stat_association_count')
                                            ->label("Associations Count")
                                            ->required(),
                                        TextInput::make('stat_customer_feedback')
                                            ->label("Customer Feedback")
                                            ->suffix('out of 10')
                                            ->required(),
                                        TextInput::make('stat_success_rate')
                                            ->label("Success Rate")
                                            ->suffix('%')
                                            ->required(),
                                    ]),


                            ]),
                        Tabs\Tab::make('Featured')
                            ->columns(2)
                            ->schema([
                                Section::make('English')
                                    ->columnSpan(1)
                                    ->schema([
                                        Textarea::make('expedition_activity_content_en')
                                            ->label('Expedition Content')
                                            ->autosize()
                                            ->required(),
                                        Textarea::make('trek_activity_content_en')
                                            ->label('Trek Content')
                                            ->autosize()
                                            ->required(),
                                        Textarea::make('tour_activity_content_en')
                                            ->label('Activity Content')
                                            ->autosize()
                                            ->required(),
                                    ]),
                                Section::make('French')
                                    ->columnSpan(1)
                                    ->schema([
                                        Textarea::make('expedition_activity_content_fr')
                                        ->label('Expedition Content')
                                        ->autosize()
                                        ->required(),

                                    Textarea::make('trek_activity_content_fr')
                                        ->label('Trek Content')
                                        ->autosize()
                                        ->required(),

                                    Textarea::make('tour_activity_content_fr')
                                        ->label('Activity Content')
                                        ->autosize()
                                        ->required(),
                                    ]),


                            ]),


                        Tabs\Tab::make('Parallax')
                            ->schema([
                                CuratorPicker::make('parallax_image_id')
                                    ->label('Parallax Image')
                                    ->required(),
                            ]),
                    ]),
            ]);
    }
}
