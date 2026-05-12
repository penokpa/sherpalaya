<?php

namespace App\Filament\Resources\OurSherpaResource\Widgets;

use App\Filament\Resources\PeakResource;
use App\Models\OurSherpa;
use App\Models\Peak;
use Awcodes\Curator\Components\Tables\CuratorColumn;
use Filament\Tables;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class SherpaPeaksTableWidget extends BaseWidget
{
    protected int|string|array $columnSpan = 'full';

    public function getDisplayName(): string
    {
        return "Peaks";
    }
    protected function getTableHeading(): string
    {
        return "expedited by sherpa";
    }


    public ?OurSherpa $record = null;
    public function table(Table $table): Table
    {
        return $table
            ->query(
                $this->record->peaks()->getQuery()
            )
            ->columns([
                Split::make([
                    CuratorColumn::make('cover_image_id')
                        ->size(200),
                    TextColumn::make('title')
                    ->size(TextColumn\TextColumnSize::Large),
                ]),
            ])
            ->contentGrid([
                'xl' => 2,
                'md' => 2,
                'sm' => 1,
            ])
            ->recordUrl(fn (Peak $record) =>
                    PeakResource::getUrl('view', ['record' => $record])
            );
    }
}
