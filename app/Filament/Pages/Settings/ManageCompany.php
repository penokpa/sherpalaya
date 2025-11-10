<?php

namespace App\Filament\Pages\Settings;

use App\Filament\Fields\CuratorPicker;
use App\Settings\CompanySetting;
use App\Traits\HasSettingsSidebar;
use Filament\Forms;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class ManageCompany extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string $settings = CompanySetting::class;

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
                        Tabs\Tab::make('Company Details')
                            ->schema([
                                CuratorPicker::make('company_logo_id')
                                    ->required(),
                                TextInput::make('company_name')
                                    ->required(),
                                TextInput::make('company_address')
                                    ->required(),
                                TextInput::make('company_email')
                                    ->required(),
                                TextInput::make('company_contact_number')
                                    ->required(),
                            ]),
                        Tabs\Tab::make('Social Media')
                            ->schema([
                                TextInput::make('facebook_url')
                                    ->url()
                                    ->required(),
                                TextInput::make('instagram_url')
                                    ->url()
                                    ->required(),
                                TextInput::make('youtube_url')
                                    ->url()
                                    ->required(),
                                TextInput::make('tiktok_url')
                                    ->url()
                                    ->required(),
                            ])
                    ])
            ]);
    }
}
