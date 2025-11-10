<?php

namespace App\Helpers;

use App\Contracts\EnumHasTranslation;
use BackedEnum;
use Exception;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;

class FilamentEnumFieldHelper
{

    public static function makeSelectField(string $field, string $enum): Select
    {
        self::validateEnum($enum);
        return  Select::make($field)
            ->options(function (\Livewire\Component $livewire) use ($enum) {
                return $enum::getAllTranslatedOptions($livewire->activeLocale);
            });
    }

    public static function makeTextColumn(string $field, string $enum): TextColumn
    {
        self::validateEnum($enum);
        return TextColumn::make($field)
            ->formatStateUsing(function ($state, \Livewire\Component $livewire) use ($enum) {
                $locale = $livewire->activeLocale ?? 'en';

                if (is_string($state)) {
                    $state = $enum::tryFrom($state);
                }

                if (!($state instanceof $enum)) {
                    throw new Exception("State could not be resolved into enum");
                }

                return $state->getTranslatedOption($locale);
            });
    }

    protected static function validateEnum(string $enum)
    {
        if (!enum_exists($enum)) {
            throw new Exception($enum . " is not an enum");
        }

        $enumImplementsEnumHasTranslation = in_array(EnumHasTranslation::class, class_implements($enum) ?? []);

        if (!$enumImplementsEnumHasTranslation) {
            throw new Exception("Enum is not translatable");
        }
    }

    // User::where('email', $input)
    //     ->orWhere('username', $input)
    //     ->first()

}
