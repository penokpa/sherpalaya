<?php

namespace App\Filament\Pages\Settings;

use App\Filament\Fields\CuratorPicker;
use App\Settings\ContactUsSetting;
use App\Traits\HasSettingsSidebar;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class ManageContactUs extends SettingsPage
{
    use HasPageShield;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string $settings = ContactUsSetting::class;

    use HasSettingsSidebar;

    // Hide page from main navigation
    protected static bool $shouldRegisterNavigation = false;


    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->columns(2)
                    ->schema([
                        CuratorPicker::make('cover_image_id')
                                            ->label('Contact Page Cover Image')
                                            ->columnSpanFull()
                                            ->required(),
                        Section::make('English')
                        ->columnSpan(1)
                        ->columns(10)
                        ->schema([
                            Textarea::make('title_up_en')
                                ->columnSpan(6)
                                ->autosize()
                                ->label('Title (up)'),
                            Textarea::make('main_title_en')
                                ->columnSpan(10)
                                ->autosize()
                                ->label('Title (main)'),
                            Textarea::make('title_down_en')
                                ->columnSpan(8)
                                ->autosize()
                                ->label('Title (down)'),
                            Textarea::make('content_title_en')
                                ->label('Page Title')
                                ->columnSpanFull()
                                ->autosize()
                                ->required(),
                            Textarea::make('content_en')
                                ->label('Content')
                                ->autosize()
                                ->columnSpanFull()
                                ->required(),
                            Textarea::make('address_en')
                                ->label('Address')
                                ->autosize()
                                ->columnSpanFull()
                                ->required(),
                            Textarea::make('contact_en')
                                ->label('Contact')
                                ->autosize()
                                ->columnSpanFull()
                                ->required(),
                            Textarea::make('working_hour_en')
                                ->label('Working Hours')
                                ->autosize()
                                ->columnSpanFull()
                                ->required(),
                        ]),
                    Section::make('French')
                        ->columnSpan(1)
                        ->columns(10)
                        ->schema([
                            Textarea::make('title_up_fr')
                                ->columnSpan(6)
                                ->autosize()
                                ->label('Title (up)'),
                            Textarea::make('main_title_fr')
                                ->columnSpan(10)
                                ->autosize()
                                ->label('Title (main)'),
                            Textarea::make('title_down_fr')
                                ->columnSpan(8)
                                ->autosize()
                                ->label('Title (down)'),
                            Textarea::make('content_title_fr')
                                ->label('Page Title')
                                ->columnSpanFull()
                                ->autosize()
                                ->required(),
                            Textarea::make('content_fr')
                                ->label('Content')
                                ->columnSpanFull()
                                ->autosize()
                                ->required(),
                            Textarea::make('address_fr')
                                ->label('Address')
                                ->columnSpanFull()
                                ->autosize()
                                ->required(),
                            Textarea::make('contact_fr')
                                ->label('Contact')
                                ->columnSpanFull()
                                ->autosize()
                                ->required(),
                            Textarea::make('working_hour_fr')
                                ->label('Working Hours')
                                ->columnSpanFull()
                                ->autosize()
                                ->required(),
                        ]),
                    ]),

            ]);
    }
}
