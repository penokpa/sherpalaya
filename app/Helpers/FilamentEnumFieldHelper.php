<?php

namespace App\Helpers;

use App\Contracts\EnumHasTranslation;
use BackedEnum;
use Exception;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Set;
use Filament\Tables\Columns\TextColumn;

class FilamentEnumFieldHelper
{

    public static function makeSelectField(string $field, string $enum, ?callable $selectField = null): Tabs
    {
        $availableLocales = config('app.locales');

        $tabs = [];

        foreach ($availableLocales as $index => $locale) {
            $select = Select::make($field . '_' . $locale);

            if (!is_null($selectField)) {
                $select = $selectField($select);
            }

            array_push(
                $tabs,
                Tab::make($locale == 'en' ? 'English' : 'French')
                    ->schema([
                        Hidden::make($field)
                            ->afterStateHydrated(function ($state, Set $set) use ($field, $locale) {
                                $set($field . '_' . $locale, $state);
                            }),
                        $select
                            ->options(function () use ($enum, $locale) {
                                return $enum::getAllTranslatedOptions($locale);
                            })
                            ->afterStateUpdated(function ($state, Set $set) use ($field) {
                                $set($field, $state);
                            })
                            ->dehydrated(false),
                    ])
            );
        }
        self::validateEnum($enum);

        return Tabs::make()
            ->reactive()
            ->schema($tabs);
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
