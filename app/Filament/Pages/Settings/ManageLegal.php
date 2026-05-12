<?php

namespace App\Filament\Pages\Settings;

use App\Settings\LegalSetting;
use App\Traits\HasSettingsSidebar;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class ManageLegal extends SettingsPage
{
    use HasPageShield;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string $settings = LegalSetting::class;

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
                        Tabs\Tab::make('Privacy Policy')
                            ->schema([
                                RichEditor::make('privacy_policy_en')
                                    ->hiddenLabel()
                                    ->required(),
                                RichEditor::make('privacy_policy_fr')
                                    ->hiddenLabel()
                                    ->required(),
                            ]),
                            Tabs\Tab::make('Terms and Condition')
                            ->schema([
                                RichEditor::make('terms_and_condition_en')
                                    ->hiddenLabel()
                                    ->required(),
                                RichEditor::make('terms_and_condition_fr')
                                    ->hiddenLabel()
                                    ->required(),
                            ]),
                            Tabs\Tab::make('Cookie Policy')
                            ->schema([
                                RichEditor::make('cookie_policy_en')
                                    ->hiddenLabel()
                                    ->required(),
                                RichEditor::make('cookie_policy_fr')
                                    ->hiddenLabel()
                                    ->required(),
                            ]),
                    ])
            ]);
    }
}
