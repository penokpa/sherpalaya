<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DestinationResource\Pages;
use App\Filament\Resources\DestinationResource\RelationManagers;
use App\Filament\Resources\DestinationResource\Widgets\DestinationExpeditionTable;
use App\Filament\Resources\DestinationResource\Widgets\DestinationToursTable;
use App\Filament\Resources\DestinationResource\Widgets\DestinationTrekTable;
use App\Models\Destination;
use App\Filament\Fields\CuratorPicker;
use App\Traits\Filament\TranslatableResource;
use Awcodes\Curator\Components\Tables\CuratorColumn;
use Dotswan\MapPicker\Fields\Map;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Support\Enums\FontWeight;
use Filament\Tables;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use RalphJSmit\Filament\Components\Forms\Sidebar;

class DestinationResource extends Resource
{
    use TranslatableResource;

    protected static ?string $model = Destination::class;

    protected static ?string $navigationIcon = 'heroicon-o-map-pin';

    protected static ?int $navigationSort = 7;

    protected static ?string $navigationGroup = 'Content';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                    Section::make('')
                        ->columns(5)
                        ->schema([
                            TextInput::make('name')
                                ->columnSpan(3)
                                ->required(),
                            Select::make('region_id')
                            ->relationship('region','name')
                            ->native(false)
                            ->preload()
                            ->columnSpan(2)
                            ->searchable()
                            ->required(),
                            RichEditor::make('description')
                            ->required()
                            ->toolbarButtons([
                                // 'attachFiles',
                                'blockquote',
                                'bold',
                                'bulletList',
                                // 'codeBlock',
                                'h2',
                                'h3',
                                'italic',
                                'link',
                                'orderedList',
                                'redo',
                                // 'strike',
                                'underline',
                                'undo',
                            ])
                            ->translatable()
                            ->columnSpan(3),
                            Map::make('location')
                                ->label('Location')
                                ->columnSpan(2)
                                ->defaultLocation(latitude: 27.700769, longitude: 85.300140)
                                ->extraStyles([
                                    'min-height: 50vh',
                                    'border-radius: 50px'
                                ])
                                // ->liveLocation(true, true, 5000)
                                // ->showMarker()
                                ->markerColor("#22c55eff")
                                ->showFullscreenControl()
                                ->showZoomControl()
                                ->draggable()
                                ->tilesUrl("https://tile.openstreetmap.de/{z}/{x}/{y}.png")
                                ->zoom(15)
                                ->detectRetina()
                                ->showMyLocationButton()
                                ->geoMan(false)
                                ->geoManEditable(true)
                                ->geoManPosition('bottomright')
                                ->drawCircleMarker()
                                // ->rotateMode()
                                ->clickable(true) //click to move marker
                                // ->drawMarker()
                                // ->drawPolygon()
                                // ->drawPolyline()
                                // ->drawCircle()
                                ->dragMode()
                                // ->cutPolygon()
                                // ->editPolygon()
                                // ->deleteLayer()
                                ->setColor('#3388ff')
                                ->setFilledColor('#cad9ec'),

                            CuratorPicker::make('destinationImages')
                                ->columnSpanFull()
                                ->multiple()
                                ->label('Images')
                                ->hint('related')
                                ->relationship('destinationImages', 'id')

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
                    // ->weight(FontWeight::Bold)
                    ->searchable(),
                    // TextColumn::make('region.name')
                    //     ->searchable()
                    //     ->badge(),
                    CuratorColumn::make('destinationImages')
                    ->size(90)
                    ->ring(1) // options 0,1,2,4
                    ->overlap(2) // options 0,2,3,4
                    ->limit(2),

                ]),
            ])
            ->groups([
                'region.name'
            ])
            ->contentGrid([
                'sm' => 1,
                'md' => 2,
                'xl' => 2,
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\ViewAction::make(),
                // Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    public static function getWidgets(): array
    {
        return [
            DestinationToursTable::class,
            DestinationExpeditionTable::class,
            DestinationTrekTable::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDestinations::route('/'),
            'create' => Pages\CreateDestination::route('/create'),
            'view' => Pages\ViewDestination::route('/{record}'),
            'edit' => Pages\EditDestination::route('/{record}/edit'),
        ];
    }
}
