<?php

namespace App\Filament\Pages\Settings;

use App\Filament\Fields\CuratorPicker;
use App\Settings\CompanySetting;
use App\Traits\HasSettingsSidebar;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class ManageCompany extends SettingsPage
{
    use HasPageShield;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string $settings = CompanySetting::class;

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
                        CuratorPicker::make('company_logo_id')
                        ->required()
                        ->columnSpan(1)
                        ->label('Logo'),
                    Section::make('Social Media')
                        ->columnSpan(1)
                        ->schema([
                            TextInput::make('facebook_url')
                                ->url()
                                ->label('Facebook')
                                ->required(),
                            TextInput::make('instagram_url')
                                ->url()
                                ->label('Instagram')
                                ->required(),
                            TextInput::make('youtube_url')
                                ->url()
                                ->label('YouTube')
                                ->required(),
                            TextInput::make('tiktok_url')
                                ->url()
                                ->label('TikTok')
                                ->required(),
                        ]),
                    Section::make('English')
                        ->columnSpan(1)
                        ->schema([
                            TextInput::make('company_name_en')

                            ->label('Company Name')
                                ->required(),
                            TextInput::make('company_address_en')
                            ->label('Address')
                                ->required(),
                            TextInput::make('company_email_en')
                            ->label('Email')
                                ->required(),
                            TextInput::make('company_contact_number_en')
                            ->label('Contact Number')
                                ->required(),
                        ]),
                    Section::make('French')
                        ->columnSpan(1)
                        ->schema([
                            TextInput::make('company_name_fr')
                            ->label('Company Name')
                                ->required(),

                            TextInput::make('company_address_fr')
                            ->label('Address')
                                ->required(),

                            TextInput::make('company_email_fr')
                            ->label('Email')
                                ->required(),

                            TextInput::make('company_contact_number_fr')
                            ->label('Contact Number')
                                ->required(),
                        ]),
                    ]),

            ]);
    }
}
