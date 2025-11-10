<?php

namespace App\Filament\Resources\DestinationResource\Widgets;

use App\Filament\Resources\ServiceResource;
use App\Models\Destination;
use App\Models\Service;
use Awcodes\Curator\Components\Tables\CuratorColumn;
use Filament\Support\Enums\FontWeight;
use Filament\Tables;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Support\HtmlString;

class DestinationServiceTable extends BaseWidget
{
    protected int|string|array $columnSpan = 'full';
    public ?Destination $record = null;

    public function getDisplayName(): string
    {
        return "Services";
    }
    protected function getTableHeading(): string
    {
        return "in this destination";
    }

    public function table(Table $table): Table
    {

        return $table
            ->query(
                Service::whereHas('destinations', function ($query) {
                    $query->where('destination_id', $this->record->id);
                })
            )
            ->columns([
                Split::make([
                    CuratorColumn::make('cover_image_id')
                        ->label('Cover Image')
                        ->size(150),
                    TextColumn::make('title')
                        ->size(TextColumn\TextColumnSize::Large)
                        ->weight(FontWeight::Bold)
                        ->description(fn(?Service $record): HtmlString => new HtmlString($record?->description ?? '')),
                ]),
            ])
            ->contentGrid([
                'sm' => 1,
                'md' => 2,
                'xl' => 2,
            ])
            ->recordUrl(fn (Service $record) =>
                    ServiceResource::getUrl('view', ['record' => $record])
            );
    }
}
