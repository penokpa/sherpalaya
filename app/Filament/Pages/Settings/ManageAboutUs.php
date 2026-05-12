<?php

namespace App\Filament\Pages\Settings;

use App\Filament\Fields\CuratorPicker;
use App\Settings\AboutUsSetting;
use App\Settings\PageSetting;
use App\Traits\HasSettingsSidebar;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class ManageAboutUs extends SettingsPage
{
    use HasPageShield;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string $settings = AboutUsSetting::class;

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
                        Tabs\Tab::make('General')
                            ->columns(2)
                            ->schema([
                                CuratorPicker::make('cover_image_id')
                                    ->label('About Page Image')
                                    ->columnSpanFull()
                                    ->required(),
                                    Section::make('English')
                                    ->columnSpan(1)
                                    ->columns(10)
                                    ->schema([
                                        Textarea::make('title_up_en')
                                            ->label('Title (up)')
                                            ->columnSpan(6)
                                            ->autosize()
                                            ->required(),
                                        Textarea::make('main_title_en')
                                            ->label('Title (main)')
                                            ->columnSpanFull()
                                            ->autosize()
                                            ->required(),
                                        Textarea::make('title_down_en')
                                            ->label('Title (down)')
                                            ->columnSpan(8)
                                            ->autosize()
                                            ->required(),
                                        Textarea::make('content_title_en')
                                            ->label('Page Title')
                                            ->autosize()
                                            ->columnSpanFull()
                                            ->required(),
                                        Textarea::make('content_en')
                                            ->label('Content')
                                            ->autosize()
                                            ->columnSpanFull()
                                            ->required(),

                                    ]),
                                Section::make('French')
                                    ->columnSpan(1)
                                    ->columns(10)
                                    ->schema([
                                        Textarea::make('title_up_fr')
                                            ->label('Title (up)')
                                            ->columnSpan(6)
                                            ->autosize()
                                            ->required(),
                                        Textarea::make('main_title_fr')
                                            ->label('Title (main)')
                                            ->columnSpanFull()
                                            ->autosize()
                                            ->required(),
                                        Textarea::make('title_down_fr')
                                            ->label('Title (down)')
                                            ->columnSpan(8)
                                            ->autosize()
                                            ->required(),
                                        Textarea::make('content_title_fr')
                                            ->label('Page Title')
                                            ->autosize()
                                            ->columnSpanFull()
                                            ->required(),
                                        Textarea::make('content_fr')
                                            ->label('Content')
                                            ->autosize()
                                            ->columnSpanFull()
                                            ->required(),

                                    ]),
                            ]),
                        Tabs\Tab::make('Certificates')
                            ->schema([
                                CuratorPicker::make('certificate_images')
                                    ->columnSpanFull()
                                    ->multiple()
                                    ->label('Certificates')
                                    ->hint('authentic')
                            ]),
                    ])
            ]);
    }
}
