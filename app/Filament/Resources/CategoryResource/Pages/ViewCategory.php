<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use App\Filament\Resources\CategoryResource;
use App\Filament\Resources\CategoryResource\Widgets\CategoryTable;
use App\Traits\Filament\TranslatableViewRecord;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewCategory extends ViewRecord
{
    use TranslatableViewRecord;

    protected static string $resource = CategoryResource::class;

    public function getTitle(): string
    {
        return $this->getRecord()->name;
    }

    protected function getAdditionalHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
    protected function getFooterWidgets(): array
    {
        return [
            CategoryTable::class,
        ];
    }
}
