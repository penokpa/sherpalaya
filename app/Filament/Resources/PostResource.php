<?php

namespace App\Filament\Resources;

use App\Filament\Fields\CuratorPicker;
use App\Filament\Resources\PostResource\Pages;
use App\Models\Post;
use App\Traits\Filament\TranslatableResource;
use Awcodes\Curator\Components\Tables\CuratorColumn;
use Filament\Forms\Components\DateTimePicker;
use App\Filament\Fields\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PostResource extends Resource
{
    use TranslatableResource;

    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationGroup = 'Content';

    protected static ?int $navigationSort = 10;

    protected static ?string $pluralModelLabel = 'Blog Posts';

    protected static ?string $modelLabel = 'Blog Post';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Content')
                ->columns(1)
                ->schema([
                    TextInput::make('title')
                        ->required()
                        ->maxLength(200)
                        ->translatable(),

                    TextInput::make('slug')
                        ->helperText('Auto-generated from the English title if left blank. Used in the URL.')
                        ->maxLength(220)
                        ->rule('regex:/^[a-z0-9-]+$/')
                        ->unique(ignoreRecord: true),

                    Textarea::make('excerpt')
                        ->rows(3)
                        ->maxLength(280)
                        ->helperText('Short summary shown on the blog listing and in SEO meta. ~160 chars works best.')
                        ->translatable(),

                    RichEditor::make('body')
                        ->required()
                        ->translatable(),
                ]),

            Section::make('Cover image')
                ->schema([
                    CuratorPicker::make('cover_image_id')
                        ->label('Cover image')
                        ->coverImage(),
                ]),

            Section::make('Publishing')
                ->columns(2)
                ->schema([
                    DateTimePicker::make('published_at')
                        ->label('Publish date')
                        ->seconds(false)
                        ->helperText('Leave blank to keep as draft. Set a future date to schedule.'),
                    Toggle::make('is_featured')
                        ->label('Featured')
                        ->helperText('Featured posts appear in the highlighted slot on the blog listing.'),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                CuratorColumn::make('cover_image_id')
                    ->label('')
                    ->size(60)
                    ->circular(false),
                TextColumn::make('title')
                    ->searchable()
                    ->limit(60)
                    ->wrap(),
                TextColumn::make('published_at')
                    ->label('Published')
                    ->dateTime('M j, Y')
                    ->sortable()
                    ->placeholder('— draft'),
                IconColumn::make('is_featured')
                    ->boolean()
                    ->label('Featured'),
            ])
            ->defaultSort('published_at', 'desc')
            ->filters([
                Tables\Filters\TernaryFilter::make('is_featured')->label('Featured'),
                Tables\Filters\Filter::make('published')
                    ->query(fn ($query) => $query->whereNotNull('published_at')->where('published_at', '<=', now()))
                    ->label('Published only'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit'   => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
