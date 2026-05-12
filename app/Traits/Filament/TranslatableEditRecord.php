<?php

namespace App\Traits\Filament;

trait TranslatableEditRecord
{
    // use \Filament\Resources\Pages\EditRecord\Concerns\Translatable;

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
