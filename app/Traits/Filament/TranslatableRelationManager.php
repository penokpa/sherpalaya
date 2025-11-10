<?php
namespace App\Traits\Filament;

use Filament\Resources\RelationManagers\Concerns\Translatable;
use Livewire\Attributes\Reactive;

trait TranslatableRelationManager {
    use Translatable;

    #[Reactive]
    public ?string $activeLocale = null;

    public function getTranslatableLocales(): array
    {
        return ['en', 'fr'];
    }
}
