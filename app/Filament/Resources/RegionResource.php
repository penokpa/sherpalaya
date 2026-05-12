<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RegionResource\Pages;
use App\Filament\Resources\RegionResource\RelationManagers;
use App\Filament\Resources\RegionResource\RelationManagers\DestinationsRelationManager;
use App\Filament\Resources\RegionResource\Widgets\RegionExpeditionTable;
use App\Filament\Resources\RegionResource\Widgets\RegionMultiWidget;
use App\Filament\Resources\RegionResource\Widgets\RegionStats;
use App\Filament\Resources\RegionResource\Widgets\RegionTourTable;
use App\Filament\Resources\RegionResource\Widgets\RegionTrekTable;
use App\Models\Region;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\FontWeight;
use Filament\Tables;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RegionResource extends Resource
{
    protected static ?string $model = Region::class;

    protected static ?string $navigationIcon = 'heroicon-o-map';

    protected static ?int $navigationSort = 6;

    protected static ?string $navigationGroup = 'Content';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Region Name')
                ->hiddenOn('view')
                    ->schema([
                        TextInput::make('name')
                            ->hiddenOn('view')
                            ->hiddenLabel()
                            ->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Split::make([
                    TextColumn::make('name')
                    ->size(TextColumn\TextColumnSize::Large)
                    ->weight(FontWeight::Bold),
                ]),
            ])
            ->contentGrid([
                'sm' => 1,
                'md' => 2,
                'xl' => 3,
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\ViewAction::make(),
                // Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            DestinationsRelationManager::class,
        ];
    }
    public static function getWidgets(): array
    {
        return [
            RegionStats::class,
            RegionExpeditionTable::class,
            RegionTrekTable::class,
            RegionTourTable::class,
            RegionMultiWidget::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRegions::route('/'),
            'create' => Pages\CreateRegion::route('/create'),
            'view' => Pages\ViewRegion::route('/{record}'),
            'edit' => Pages\EditRegion::route('/{record}/edit'),
        ];
    }
}
