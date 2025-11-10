<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactUsResource\Pages;
use App\Filament\Resources\ContactUsResource\RelationManagers;
use App\Models\ContactUs;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
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

class ContactUsResource extends Resource
{
    protected static ?string $model = ContactUs::class;

    protected static ?string $navigationIcon = 'heroicon-o-phone';


    protected static ?string $navigationGroup = 'Site';
    protected static ?string $pluralModelLabel = 'Contact Us';

    protected static ?string $navigationLabel = 'Contact Us';

    protected static ?int $navigationSort = 2;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->columns(3)
                    ->schema([
                        TextInput::make('full_name')
                            ->required(),
                        TextInput::make('email')
                            ->required()
                            ->email()
                            ->prefixIcon('heroicon-m-envelope'),
                        TextInput::make('mobile_number')
                            ->prefix('+977 ')
                            ->numeric()
                            ->startsWith([
                                '97',
                                '98'
                            ])
                            ->minLength(10)
                            ->maxLength(10),
                        RichEditor::make('message')
                            ->required()
                            ->columnSpan(3)
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
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Split::make([
                    TextColumn::make('full_name')
                        ->size(TextColumn\TextColumnSize::Large)
                        ->weight(FontWeight::Bold),
                    TextColumn::make('email')
                        ->size(TextColumn\TextColumnSize::Large),
                    TextColumn::make('mobile_number')
                        ->size(TextColumn\TextColumnSize::Large)
                        ->prefix('+977'),
                ])->from('md'),
                Panel::make([
                    Stack::make([
                        TextColumn::make('message')
                            ->html()
                            ->words(25),
                    ]),
                ])->collapsible(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                // Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListContactUs::route('/'),
            'create' => Pages\CreateContactUs::route('/create'),
            'view' => Pages\ViewContactUs::route('/{record}'),
            'edit' => Pages\EditContactUs::route('/{record}/edit'),
        ];
    }
}
