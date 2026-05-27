<?php

namespace App\Filament\Resources;

use Awcodes\Curator\Resources\MediaResource as BaseMediaResource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

/**
 * Our customised Curator MediaResource.
 *
 * Extends the package's resource to add a folder (directory) filter so Tashi
 * can browse media by section — treks, expeditions, posts, etc.
 */
class MediaResource extends BaseMediaResource
{
    public static function table(Table $table): Table
    {
        return parent::table($table)
            ->filters([
                SelectFilter::make('directory')
                    ->label('Folder')
                    ->options(fn () => static::folderOptions())
                    ->placeholder('All folders'),
            ]);
    }

    private static function folderOptions(): array
    {
        $model = static::getModel();
        $folders = $model::query()
            ->select('directory')
            ->whereNotNull('directory')
            ->groupBy('directory')
            ->orderBy('directory')
            ->pluck('directory')
            ->all();

        return array_combine($folders, array_map(
            fn ($d) => ucwords(str_replace(['-', '_'], ' ', $d)),
            $folders
        ));
    }
}
