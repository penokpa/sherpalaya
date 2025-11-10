<?php

namespace App\Filament\Resources;

use App\Enums\CategoryTypes;
use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Filament\Resources\CategoryResource\Widgets\CategoryTable;
use App\Helpers\FilamentEnumFieldHelper;
use App\Models\Category;
use App\Traits\Filament\TranslatableResource;
use BackedEnum;
use Filament\Forms;
use Filament\Forms\Components\Component;
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

class CategoryResource extends Resource
{

    use TranslatableResource;

    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-bars-3-bottom-left';

    protected static ?string $navigationGroup = 'Content';

    protected static ?int $navigationSort = 5;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->hiddenOn('view')
                    ->schema([
                        TextInput::make('name')
                            ->required(),
                            FilamentEnumFieldHelper::makeSelectField('type', CategoryTypes::class)
                                ->required(),
                    ])
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
                // FilamentEnumFieldHelper::makeTextColumn('type', CategoryTypes::class),
            ])
            ->contentGrid([
                'sm' =>2,
                'md' => 2,
                'lg' =>3,
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'view' => Pages\ViewCategory::route('/{record}'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
    public static function getWidgets(): array
    {
        return [
            CategoryTable::class,
        ];
    }
}
