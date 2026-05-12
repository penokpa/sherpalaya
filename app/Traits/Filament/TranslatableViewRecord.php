<?php

namespace App\Traits\Filament;

trait TranslatableViewRecord
{
    // use \Filament\Resources\Pages\ViewRecord\Concerns\Translatable;

    protected function getHeaderActions(): array
    {
        $additionalActions = [];

        if (method_exists($this, 'getAdditionalHeaderActions')) {
            $additionalActions = $this->getAdditionalHeaderActions();
        }
        return [
            ...$additionalActions,
            // \Filament\Actions\LocaleSwitcher::make(),
        ];
    }
}
