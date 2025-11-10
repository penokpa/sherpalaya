<?php

namespace App\Filament\Resources\RegionResource\RelationManagers;

use App\Filament\Resources\DestinationResource;
use App\Models\Destination;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DestinationsRelationManager extends RelationManager
{
    protected static string $relationship = 'destinations';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Split::make([
                    Tables\Columns\TextColumn::make('name'),
                ]),
            ])
            ->contentGrid([
                'xl' => 3,
                'md' => 2,
                'sm' => 1,
            ])
            ->paginated(false)
            ->recordUrl(fn (Destination $record) =>
                    DestinationResource::getUrl('view', ['record' => $record])
            )
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
