<?php

namespace App\Filament\Pages\Settings;

use App\Traits\HasSettingsSidebar;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Litespeed\LSCache\LSCache;

class ManageCache extends Page
{
    use HasPageShield;
    use HasSettingsSidebar;

    public ?array $data = [];

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.manage-cache';

    protected static bool $shouldRegisterNavigation = false;

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        Toggle::make('clear_cache')
                            ->default(false),
                    ])
            ])
            ->statePath('data');
    }

    public function updateCache(): void
    {
        $formData = $this->form->getState();

        if ($formData['clear_cache'] === true) {
            try {
                LSCache::purgeAll();

                Notification::make()
                    ->title("Cache cleared")
                    ->body("Cache cleared successfullt")
                    ->success()
                    ->send();
            } catch (\Throwable $th) {
                Notification::make()
                    ->title("Failed to clear cache")
                    ->body("Something went wrong while clearing cache")
                    ->danger()
                    ->send();
            }
        } else {
            Notification::make()
                ->title("Cache preserved")
                ->body("No action taken against cache")
                ->success()
                ->send();
        }
    }
}
