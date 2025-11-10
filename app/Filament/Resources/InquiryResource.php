<?php

namespace App\Filament\Resources;

use App\Enums\InquiryType;
use App\Filament\Resources\InquiryResource\Pages;
use App\Filament\Resources\InquiryResource\RelationManagers;
use App\Models\Expedition;
use App\Models\Inquiry;
use App\Models\Service;
use App\Models\Tour;
use App\Models\Trek;
use Filament\Forms;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
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

class InquiryResource extends Resource
{
    protected static ?string $model = Inquiry::class;

    protected static ?string $navigationIcon = 'heroicon-o-question-mark-circle';

    protected static ?string $navigationGroup = 'Site';

    protected static ?int $navigationSort = 1;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->columnSpan(1)
                    ->schema([
                        TextInput::make('full_name')
                            ->required(),
                        TextInput::make('email')
                            ->required()
                            ->email()
                            ->prefixIcon('heroicon-m-envelope'),
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
                        Select::make('type')
                            ->options(InquiryType::class)
                    ]),
                Section::make()
                    ->hiddenOn(['create', 'edit'])
                    ->columnSpan(1)
                    ->schema([
                        Select::make('inquiriable_type')
                            ->required()
                            ->reactive()
                            ->options([
                                Expedition::class => 'Expedition',
                                Trek::class => 'Trek',
                                Service::class => 'Service',
                                Tour::class => 'Tour',

                            ]),
                        Select::make('inquiriable_id')
                            ->options(function (Get $get) {
                                $type = $get('inquiriable_type');
                                if (is_null($type)) {
                                    return [];
                                } else {
                                    return $type::query()->pluck('title', 'id');
                                }
                            }),
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
                    TextColumn::make('inquiriable.title'),
                ])->from('md'),
                Panel::make([
                    Stack::make([
                        TextColumn::make('message')
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
            'index' => Pages\ListInquiries::route('/'),
            'create' => Pages\CreateInquiry::route('/create'),
            'view' => Pages\ViewInquiry::route('/{record}'),
            'edit' => Pages\EditInquiry::route('/{record}/edit'),
        ];
    }
}
