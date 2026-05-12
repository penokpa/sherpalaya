<?php

namespace App\Filament\Fields;

use Awcodes\Curator\Components\Forms\CuratorPicker as FormsCuratorPicker;
use Filament\Forms\Components\Actions\Action;

class CuratorPicker extends FormsCuratorPicker
{
    public function getPickerAction(): Action
    {
        return parent::getPickerAction()
            ->disabled(function (string $operation) {
                return $operation == 'view';
            });
    }

    public function getRemoveAction(): Action
    {
        return parent::getRemoveAction()
            ->disabled(function (string $operation) {
                return $operation == 'view';
            });
    }

    public function getRemoveAllAction(): Action
    {
        return parent::getRemoveAllAction()
            ->disabled(function (string $operation) {
                return $operation == 'view';
            });
    }
}
