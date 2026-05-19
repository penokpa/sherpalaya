<?php

namespace App\Filament\Fields;

use FilamentTiptapEditor\TiptapEditor;

/**
 * Sherpalaya's standard rich-text editor.
 *
 * Drop-in replacement for Filament's built-in RichEditor. Wraps the
 * awcodes/filament-tiptap-editor package so every admin form gets the same
 * curated toolbar (defined in config/filament-tiptap-editor.php under the
 * 'default' profile) without each resource needing to know the tool names.
 *
 * Drop-in: `use App\Filament\Fields\RichEditor` instead of
 * `use Filament\Forms\Components\RichEditor`. Existing chained methods
 * like ->required() and ->translatable() still work.
 */
class RichEditor extends TiptapEditor
{
    public static function make(?string $name = null): static
    {
        return parent::make($name)
            ->profile('default');
    }
}
