<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Filament\Resources\ServiceResource\RelationManagers;
use App\Models\Service;
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
use Filament\Resources\Resource;
use Filament\Support\Enums\FontWeight;
use Filament\Tables;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\HtmlString;
use RalphJSmit\Filament\Components\Forms\Sidebar;

class ServiceResource extends Resource
{
    use TranslatableResource;

    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Content';
    protected static ?int $navigationSort = 7;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Sidebar::make([
                    Section::make('')
                    ->schema([
                        TextInput::make('title')
                        ->columnSpanFull()
                        ->required(),
                    RichEditor::make('description')
                        ->columnSpanFull()
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
                        ]),

                        Map::make('location')
                            ->label('Location')
                            ->columnSpanFull()
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

                    ]),
                ],[
                    Section::make()
                        ->schema([
                            CuratorPicker::make('cover_image_id')
                            ->color('primary')
                            ->label('Cover Image')
                            ->hint('for service page')
                            ->relationship('coverImage', 'id'),
                        CuratorPicker::make('images')
                            ->multiple()
                            ->label('Images')
                            ->hint('any other relevant images')
                            ->relationship('images', 'id'),
                        ]),
                        Section::make('Destinations')
                                    ->schema([
                                        Select::make('destinations')
                                            ->hiddenLabel()
                                            ->multiple()
                                            ->relationship(titleAttribute: 'name')
                                            ->preload()
                                            ->searchable(['name', 'location'])
                                            ->native(false),
                                    ]),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Split::make([
                    CuratorColumn::make('cover_image_id')
                        ->label('Cover Image')
                        ->size(150),
                    TextColumn::make('title')
                    ->size(TextColumn\TextColumnSize::Large)
                    ->weight(FontWeight::Bold)
                    ->description(fn (?Service $record): HtmlString => new HtmlString($record?->description ?? '')),
                ]),
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
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'view' => Pages\ViewService::route('/{record}'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
