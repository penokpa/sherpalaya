<?php

namespace App\Traits\Filament;

trait TranslatableListRecords
{
    use \Filament\Resources\Pages\ListRecords\Concerns\Translatable;

    protected function getHeaderActions(): array
    {
        $additionalActions = [];

        if (method_exists($this, 'getAdditionalHeaderActions')) {
            $additionalActions = $this->getAdditionalHeaderActions();
        }
        return [
            ...$additionalActions,
            \Filament\Actions\LocaleSwitcher::make(),
        ];
    }
}
