<?php

namespace App\Filament\Resources\CategoryResource\Widgets;

use App\Enums\CategoryTypes;
use App\Models\Category;
use App\Models\Expedition;
use App\Models\Tour;
use App\Models\Trek;
use Awcodes\Curator\Components\Tables\CuratorColumn;
use Filament\Tables;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class CategoryTable extends BaseWidget
{
    protected int|string|array $columnSpan = 'full';
    public ?Category $record = null;

    protected function getTableHeading(): string
    {
        return "";
    }

    protected function getTableQuery(): Builder
    {
        return match ($this->record->type) {
            CategoryTypes::EXPEDITION => Expedition::query()->where('category_id', $this->record->id),
            CategoryTypes::TREK => Trek::query()->where('category_id', $this->record->id),
            CategoryTypes::TOUR => Tour::query()->where('category_id', $this->record->id),
        };
    }
    public function table(Table $table): Table
    {
        return $table
            ->query(
                $this->getTableQuery()
            )
            ->columns([
                Split::make([
                    CuratorColumn::make('cover_image_id')
                        ->label('Cover Image')
                        ->size(250),
                    TextColumn::make('title')
                        ->size(TextColumn\TextColumnSize::Large),
                ]),
            ])
            ->contentGrid([
                'sm' => 1,
                'md' => 2,
                'xl' => 2,
            ]);
    }
}
