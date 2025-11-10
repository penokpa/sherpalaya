<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use App\Enums\CategoryTypes;
use App\Filament\Resources\CategoryResource;
use App\Traits\Filament\TranslatableListRecords;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListCategories extends ListRecords
{
    use TranslatableListRecords;

    protected static string $resource = CategoryResource::class;

    protected function getAdditionalHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
{
    return [
        // 'all' => Tab::make('All'),
        'expedition' => Tab::make('Expedition')
            ->modifyQueryUsing(fn (Builder $query) => $query->where('type', CategoryTypes::EXPEDITION)),
        'trek' => Tab::make('Trek')
            ->modifyQueryUsing(fn (Builder $query) => $query->where('type', CategoryTypes::TREK)),
        'tour' => Tab::make('Tour')
            ->modifyQueryUsing(fn (Builder $query) => $query->where('type', CategoryTypes::TOUR)),
    ];
}
}
