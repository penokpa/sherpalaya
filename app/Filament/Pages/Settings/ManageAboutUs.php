<?php

namespace App\Filament\Pages\Settings;

use App\Filament\Fields\CuratorPicker;
use App\Settings\AboutUsSetting;
use App\Settings\PageSetting;
use App\Traits\HasSettingsSidebar;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class ManageAboutUs extends SettingsPage
{
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
                            ->schema([
                                CuratorPicker::make('cover_image_id')
                                    ->required(),
                                RichEditor::make('content')
                                    ->required(),
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
