<?php

namespace App\Filament\Resources\RegionResource\Widgets;

use App\Filament\Resources\TourResource;
use App\Models\Region;
use App\Models\Tour;
use Awcodes\Curator\Components\Tables\CuratorColumn;
use Filament\Tables;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class RegionTourTable extends BaseWidget
{
    protected int|string|array $columnSpan = 'full';

    public function getDisplayName(): string
    {
        return "Tours";
    }

    protected function getTableHeading(): string
    {
        return "";
    }

    public ?Region $record = null;
    public function table(Table $table): Table
    {

        return $table
            ->query(
                Tour::query()
                    ->whereHas('destinations', function ($query) {
                        $query->where('region_id', $this->record->id);
                    })
            )
            ->columns([
                Split::make([
                    CuratorColumn::make('cover_image_id')
                        ->size(200),
                    Stack::make([
                        TextColumn::make('title')
                            ->size(TextColumn\TextColumnSize::Large),
                        TextColumn::make('type')
                            ->label('Type'),
                    ]),
                ]),
            ])
            ->contentGrid([
                'xl' => 2,
                'md' => 2,
                'sm' => 1,
            ])
            ->recordUrl(
                fn(Tour $record) =>
                TourResource::getUrl('view', ['record' => $record])
            );
    }
}
