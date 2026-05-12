<?php
namespace App\Traits\Filament;

trait TranslatableCreateRecord{
    // use \Filament\Resources\Pages\CreateRecord\Concerns\Translatable;

    protected function getHeaderActions(): array
    {
        $additionalActions = [];

        if(method_exists($this, 'getAdditionalHeaderActions')){
            $additionalActions = $this->getAdditionalHeaderActions();
        }
        return [
            ...$additionalActions,
            // \Filament\Actions\LocaleSwitcher::make(),
        ];
    }

}
