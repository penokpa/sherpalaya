<?php

namespace App\Filament\Pages\Settings;

use App\Settings\ContactUsSetting;
use App\Traits\HasSettingsSidebar;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class ManageContactUs extends SettingsPage
{
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
                    ->schema([
                        Textarea::make('content')
                            ->required(),
                        Textarea::make('address')
                            ->required(),
                        Textarea::make('contact')
                            ->required(),
                        Textarea::make('working_hour')
                            ->required(),
                    ]),
            ]);
    }
}
