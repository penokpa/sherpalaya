<?php

namespace App\Filament\Resources\DestinationResource\Widgets;

use App\Filament\Resources\TourResource;
use App\Models\Destination;
use App\Models\Tour;
use Awcodes\Curator\Components\Tables\CuratorColumn;
use Filament\Support\Enums\FontWeight;
use Filament\Tables;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class DestinationToursTable extends BaseWidget
{
    protected int|string|array $columnSpan = 'full';
    public ?Destination $record = null;

    public function getDisplayName(): string
    {
        return "Tours";
    }
    protected function getTableHeading(): string
    {
        return "in this destination";

    }
    public function table(Table $table): Table
    {
        return $table
            ->query(
                Tour::whereHas('destinations', function ($query) {
                    $query->where('destination_id', $this->record->id);
                })
            )
            ->columns([
                Split::make([
                    CuratorColumn::make('cover_image_id')
                        ->label('Cover Image')
                        ->size(150),
                    TextColumn::make('title')
                        ->size(TextColumn\TextColumnSize::Large),
                ]),
            ])
            ->contentGrid([
                'sm' => 1,
                'md' => 2,
                'xl' => 2,
            ])
            ->recordUrl(fn (Tour $record) =>
                    TourResource::getUrl('view', ['record' => $record])
            );
    }
}
