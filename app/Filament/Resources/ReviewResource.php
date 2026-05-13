<?php

namespace App\Filament\Resources;

use App\Enums\ReviewPlatform;
use App\Filament\Fields\CuratorPicker;
use App\Filament\Resources\ReviewResource\Pages;
use App\Filament\Resources\ReviewResource\RelationManagers;
use App\Models\Review;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
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
                            ->columns(6)
                            ->columnSpan(1)
                            ->schema([
                                TextInput::make('name')
                                    ->columnSpan(4)
                                    ->required(),
                                Toggle::make('display_in_home_page')
                                    ->inline(false)
                                    ->default(false)
                                    ->columnSpan(2),
                                Select::make('platform')
                                    ->options(ReviewPlatform::class)
                                    ->required()
                                    ->columnSpan(2),
                                Select::make('rating')
                                    ->options([1 => '1 ★', 2 => '2 ★★', 3 => '3 ★★★', 4 => '4 ★★★★', 5 => '5 ★★★★★'])
                                    ->default(5)
                                    ->required()
                                    ->columnSpan(2),
                                DatePicker::make('reviewed_at')
                                    ->label('Review Date')
                                    ->native(false)
                                    ->columnSpan(2),
                                Textarea::make('title')
                                    ->rows(1)
                                    ->columnSpanFull()
                                    ->required(),
                                RichEditor::make('description')
                                    ->required()
                                    ->columnSpanFull()
                                    ->toolbarButtons([
                                        'blockquote',
                                        'bold',
                                        'bulletList',
                                        'h2',
                                        'h3',
                                        'italic',
                                        'link',
                                        'orderedList',
                                        'redo',
                                        'underline',
                                        'undo',
                                    ]),
                                TextInput::make('review_url')
                                    ->label('Original Review URL')
                                    ->url()
                                    ->placeholder('https://...')
                                    ->helperText('Link to the original review on Google / TripAdvisor / Trustpilot for verification')
                                    ->columnSpanFull(),
                            ]),
                        Section::make()
                            ->columnSpan(1)
                            ->schema([
                                CuratorPicker::make('image_id')
                                    ->color('primary')
                                    ->label('Reviewer Avatar')
                                    ->hint('optional')
                                    ->squareImage(200)
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
            ->defaultSort('created_at','desc')
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
