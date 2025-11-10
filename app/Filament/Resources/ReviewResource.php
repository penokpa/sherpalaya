<?php

namespace App\Filament\Resources;

use App\Filament\Fields\CuratorPicker;
use App\Filament\Resources\ReviewResource\Pages;
use App\Filament\Resources\ReviewResource\RelationManagers;
use App\Models\Review;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\FontWeight;
use Filament\Tables;
use Filament\Tables\Columns\Layout\Panel;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReviewResource extends Resource
{
    protected static ?string $model = Review::class;

    protected static ?string $navigationIcon = 'heroicon-o-inbox';

    protected static ?string $navigationGroup = 'Site';

    protected static ?int $navigationSort = 4;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->columns(2)
                    ->schema([
                        Section::make()
                            ->columns(5)
                            ->columnSpan(1)
                            ->schema([
                                TextInput::make('name')
                                    ->columnSpan(3)
                                    ->required(),
                                Toggle::make('display_in_home_page')
                                    ->inline(false)
                                    ->default(false)
                                    ->columnSpan(2),
                                Textarea::make('title')
                                    ->rows(1)
                                    ->columnSpanFull()
                                    ->required(),
                                RichEditor::make('description')
                                    ->required()
                                    ->columnSpanFull()
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
                            ]),
                        Section::make()
                            ->columnSpan(1)
                            ->schema([
                                CuratorPicker::make('image_id')
                                    ->color('primary')
                                    ->label('Review Image')
                                    // ->hint('for expedition page')
                                    ->relationship('reviewImage', 'id'),
                            ]),
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
                    TextColumn::make('title'),
                ])->from('md'),
                Panel::make([
                    Stack::make([
                        TextColumn::make('description')
                            ->html()
                            ->words(25),
                    ]),
                ])->collapsible()
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
            'index' => Pages\ListReviews::route('/'),
            'create' => Pages\CreateReview::route('/create'),
            'view' => Pages\ViewReview::route('/{record}'),
            'edit' => Pages\EditReview::route('/{record}/edit'),
        ];
    }
}
