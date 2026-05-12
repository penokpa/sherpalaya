<?php

namespace App\Filament\Resources;

use App\Enums\CategoryType;
use App\Enums\ItineraryType;
use App\Enums\TrekDifficulty;
use App\Filament\Fields\CuratorPicker;
use App\Filament\Fields\TranslatableRepeater;
use App\Filament\Resources\TrekResource\Pages;
use App\Filament\Resources\TrekResource\RelationManagers;
use App\Models\Trek;
use App\Traits\Filament\TranslatableResource;
use Awcodes\Curator\Components\Tables\CuratorColumn;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\FontWeight;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\Layout\Grid;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use RalphJSmit\Filament\Components\Forms\Sidebar;

class TrekResource extends Resource
{
    use TranslatableResource;

    protected static ?string $model = Trek::class;

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationIcon = 'heroicon-o-eye';

    protected static ?string $navigationGroup = 'Content';

    public static function getRepeaterFields(): array
    {
        return [
            'costs_include',
            'costs_exclude',
        ];
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Trek')
                    ->columnSpanFull()
                    ->tabs([
                        Tabs\Tab::make('General')
                            ->icon('heroicon-m-clipboard')
                            ->schema([
                                Sidebar::make([
                                    Section::make('')
                                        ->columns(6)
                                        ->schema([
                                            TextInput::make('title')
                                                ->required()
                                                ->translatable()
                                                ->columnSpanFull(),

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
                                                ->columnSpanFull(),

                                            Select::make('region_id')
                                                ->required()
                                                ->label('Region')
                                                ->relationship('region', 'name')
                                                ->native(false)
                                                ->columnSpan(3),
                                            Select::make('category_id')
                                                ->relationship(
                                                    'category',
                                                    'name',
                                                    modifyQueryUsing: fn($query) => $query->where('type', CategoryType::TREK)
                                                )
                                                ->native(false)
                                                ->columnSpan(3),
                                        ]),
                                ], [
                                    Section::make('')
                                        ->schema([
                                            CuratorPicker::make('cover_image_id')
                                                ->color('primary')
                                                ->label('Cover Image')
                                                ->hint('for trek page')
                                                ->relationship('coverImage', 'id'),
                                        ]),

                                    Section::make('')
                                        ->schema([
                                            Toggle::make('is_featured')
                                                ->default(false),
                                            CuratorPicker::make('feature_image_id')
                                                ->label('Feature Image')
                                                ->hint('for home page')
                                                ->relationship('featureImage', 'id'),
                                        ]),

                                ]),
                            ]),
                        Tabs\Tab::make('Details')
                            ->icon(icon: 'heroicon-m-chart-bar-square')
                            ->schema([
                                Sidebar::make([
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
                                    Section::make('Key Highlights')
                                        ->schema([
                                            Repeater::make('keyHighlights')
                                                ->label('Key Highlights')
                                                ->relationship('keyHighlights')
                                                ->reorderable()
                                                ->schema([
                                                    TextInput::make('title')
                                                        ->required()
                                                        ->translatable(),
                                                    TextArea::make('description')
                                                        ->required()
                                                        ->autosize()
                                                        ->translatable(),
                                                ]),
                                        ]),
                                    Section::make('Essential Tips')
                                        ->schema([
                                            Repeater::make('essentialTips')
                                                ->label('Essential Tips')
                                                ->relationship('essentialTips')
                                                ->reorderable()
                                                ->schema([
                                                    TextInput::make('title')
                                                        ->required()
                                                        ->translatable(),
                                                    TextArea::make('description')
                                                        ->required()
                                                        ->autosize()
                                                        ->translatable(),

                                                ]),
                                        ]),
                                ], [
                                    Section::make()
                                        ->columns(2)
                                        ->schema([
                                            TextArea::make('best_time_for_trek')
                                                ->required()
                                                ->label('Best Time For Trek')
                                                ->translatable()
                                                ->columnSpanFull(),
                                            Select::make('trek_difficulty')
                                                ->options(TrekDifficulty::class)
                                                ->default(TrekDifficulty::MODERATE)
                                                ->native(false)
                                                ->columnSpanFull(),
                                            TextInput::make('duration')
                                                ->numeric()
                                                ->required()
                                                ->minValue(1)
                                                ->maxValue(999)
                                                ->suffix('days'),
                                            TextInput::make('grade')
                                                ->numeric()
                                                ->minValue(1)
                                                ->maxValue(10)
                                                ->suffix('/10'),
                                            TextInput::make('starting_altitude')
                                                ->numeric()
                                                ->required()
                                                ->suffix("m"),
                                            TextInput::make('highest_altitude')
                                                ->numeric()
                                                ->required()
                                                ->suffix("m"),
                                        ]),
                                    Section::make()
                                        ->schema([
                                            TextInput::make('starting_point')
                                                ->label('Starting Point')
                                                ->required(),
                                            TextInput::make('ending_point')
                                                ->label('Ending Point')
                                                ->required(),
                                        ]),

                                ]),

                            ]),
                        Tabs\Tab::make('Images')
                            ->icon('heroicon-m-photo')

                            ->schema([
                                Section::make()
                                    ->schema([
                                        CuratorPicker::make('images')
                                            ->multiple()
                                            ->label('Images')
                                            ->hint('any other relevant images')
                                            ->relationship('images', 'id'),
                                    ]),
                            ]),
                        Tabs\Tab::make('Costs')
                            ->icon('heroicon-m-exclamation-circle')

                            ->schema([
                                Section::make('Costs Include')
                                    ->schema([
                                        TranslatableRepeater::make('costs_include')
                                            ->field(function ($field) {
                                                return $field
                                                    ->prefixIcon('heroicon-o-check-badge')
                                                    ->prefixIconColor('success');
                                            })
                                            ->simple(TextInput::class)
                                            ->hiddenLabel(),
                                    ]),
                                Section::make('Costs Exclude')
                                    ->schema([
                                        TranslatableRepeater::make('costs_exclude')
                                            ->field(function ($field) {
                                                return $field
                                                    ->prefixIcon('heroicon-o-x-circle')
                                                    ->prefixIconColor('danger');
                                            })
                                            ->simple(TextInput::class)
                                            ->hiddenLabel()
                                    ]),
                            ]),
                        Tabs\Tab::make('Itinerary')
                            ->icon('heroicon-m-calendar-date-range')

                            ->schema([
                                Section::make("")
                                    ->schema([
                                        Repeater::make('itinerary')
                                            ->label('Itinerary')
                                            ->relationship('itineraries')
                                            ->columns(7)
                                            ->schema([
                                                Textarea::make('title')
                                                    ->required()
                                                    ->autosize()
                                                    ->translatable()
                                                    ->columnSpan(3),
                                                Select::make('destinations')
                                                    ->relationship('destinations', 'name')
                                                    ->multiple()
                                                    ->preload()
                                                    ->searchable()
                                                    ->columnSpan(4)
                                                    ->native(false),
                                                Repeater::make('itineraryDetails')
                                                    ->relationship('itineraryDetails')
                                                    ->reorderable()
                                                    ->cloneable()
                                                    ->columnSpanFull()
                                                    ->schema([
                                                        Select::make('type')
                                                            ->options(ItineraryType::class)
                                                            ->native(false)
                                                            ->required(),
                                                        Textarea::make('description')
                                                            ->required()
                                                            ->rows(1)
                                                            ->autosize()
                                                            ->translatable(),
                                                    ])->columnSpanFull(),
                                            ])
                                    ]),
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
                        ->size(200),
                    Stack::make([
                        TextColumn::make('title')
                            ->size(TextColumn\TextColumnSize::Large)
                            ->weight(FontWeight::Bold)
                            ->searchable(),
                        TextColumn::make('duration')
                            ->icon('heroicon-m-clock')
                            ->size(TextColumn\TextColumnSize::Small)
                            ->suffix(' days'),
                        TextColumn::make('category.name')
                            ->badge()
                            ->icon('heroicon-m-bolt')
                            ->size(TextColumn\TextColumnSize::Small)
                            ->prefix(''),
                        TextColumn::make('region.name')
                            ->badge()
                            ->icon('heroicon-m-map')
                            ->size(TextColumn\TextColumnSize::Small)
                            ->prefix(''),
                    ]),

                    // ->description(fn (Trek $record): string => strip_tags($record->grade . "/10"))
                    // ->html(),
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
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
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
            'index' => Pages\ListTreks::route('/'),
            'create' => Pages\CreateTrek::route('/create'),
            'view' => Pages\ViewTrek::route('/{record}'),
            'edit' => Pages\EditTrek::route('/{record}/edit'),
        ];
    }
}
