<?php

namespace App\Filament\Fields;

use Closure;
use Exception;
use Filament\Actions\ActionGroup;
use Filament\Actions\LocaleSwitcher;
use Filament\Actions\SelectAction;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Field;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Get;
use Filament\Support\Concerns\EvaluatesClosures;
use Filament\Support\Enums\ActionSize;
use Illuminate\Support\Arr;

class TranslatableRepeater
{
    use EvaluatesClosures;

    protected ?Closure $getFieldUsing = null;
    protected ?Closure $getFieldsUsing = null;
    protected ?Closure $getRepeaterUsing = null;

    protected array $excludeFieldsFromTranslation = [];

    public static function make(string $name)
    {
        return new static($name);
    }

    public function field(Closure $field): static
    {
        $this->getFieldUsing = $field;
        return $this;
    }

    // public function fields(Closure $field): static
    // {
    //     $this->getFieldsUsing = $field;
    //     return $this;
    // }

    // public function excludeFieldsFromTranslation(array $fields): static
    // {
    //     $this->excludeFieldsFromTranslation = $fields;
    //     return $this;
    // }

    public function repeater(Closure $repeater): static
    {
        $this->getRepeaterUsing = $repeater;
        return $this;
    }

    public function __construct(
        protected string $name,
    ) {}

    // protected function validateFields(array $fields): void
    // {
    //     $fields = array_unique($fields);
    //     $fields = array_filter($fields);
    //     array_map(function ($field) {
    //         return $this->validateField($field);
    //     }, $fields);
    // }

    // protected function resolveFields(array $fields, array $columns): array
    // {

    //     if (count($fields) != count($columns)) {
    //         throw new Exception("Unequal number of columns and fields for table repeater");
    //     }

    //     $enFields = Arr::map($fields, function ($field, $key) use ($columns) {
    //         if (in_array($columns[$key], $this->excludeFieldsFromTranslation)) {
    //             return $field::make($columns[$key]);
    //         } else {
    //             return $field::make($columns[$key] . '.en');
    //         }
    //     });

    //     $frFields = Arr::map($fields, function ($field, $key) use ($columns) {
    //         if (in_array($columns[$key], $this->excludeFieldsFromTranslation)) {
    //             return $field::make($columns[$key]);
    //         } else {
    //             return $field::make($columns[$key] . '.fr');
    //         }
    //     });

    //     $getFieldsUsing = $this->getFieldsUsing;

    //     if (!is_null($getFieldsUsing)) {
    //         $enFields = $getFieldsUsing($enFields);
    //         $frFields = $getFieldsUsing($frFields);
    //     }

    //     $enFields = Arr::map($enFields, function ($field, $key) use ($columns) {
    //         return $field;
    //     });

    //     $frFields = Arr::map($frFields, function ($field, $key) use ($columns) {
    //         return $field;
    //     });

    //     return [
    //         'en' => $enFields,
    //         'fr' => $frFields,
    //     ];
    // }

    // protected function resolveRepeaters(array $fields): array
    // {

    //     $enTableRepeater = TableRepeater::make($this->name);

    //     $frTableRepeater = TableRepeater::make($this->name);

    //     $getRepeaterUsing = $this->getRepeaterUsing;

    //     if (!is_null($getRepeaterUsing)) {
    //         $enTableRepeater = $getRepeaterUsing($enTableRepeater);
    //         $frTableRepeater = $getRepeaterUsing($frTableRepeater);
    //     }


    //     $enTableRepeater = $enTableRepeater
    //         ->schema($fields['en'])
    //         ->dehydrated(true);
    //         // ->dehydrateStateUsing(function($state, Get $get){
    //         //     $frState = $get('/');
    //         //     dd($state, $frState);
    //         // });

    //     $frTableRepeater = $frTableRepeater
    //         ->schema($fields['fr'])
    //         ->dehydrated(false);

    //     return [
    //         'en' => $enTableRepeater,
    //         'fr' => $frTableRepeater,
    //     ];
    // }


    protected function validateField(string $field): void
    {
        if (!is_subclass_of($field, Field::class)) {
            throw new Exception(Field::class . " expected. Got " . $field);
        }
    }

    protected function resolveField(string $field): array
    {
        $enField = $field::make('en');

        $frField = $field::make('fr');

        $getFieldUsing = $this->getFieldUsing;

        if (!is_null($getFieldUsing)) {
            $enField = $getFieldUsing($enField);
            $frField = $getFieldUsing($frField);
        }

        return [
            'en' => $enField,
            'fr' => $frField,
        ];
    }

    public function simple(string $field): Repeater
    {

        $this->validateField($field);
        $fields = $this->resolveField($field);


        return Repeater::make($this->name)
            ->afterStateHydrated(function ($component, $state, $operation) {
                if ($operation == 'create') {
                    return;
                }
                if(isset($state['en'])){
                    $component->state($state['en']);
                }
            })
            ->dehydrateStateUsing(function ($state) {
                if (isset($state['en'])) {
                    return $state['en'];
                } else {
                    return $state;
                }
                // dd($state);
            })
            ->schema([
                $fields['en'],
                $fields['fr'],
            ]);
    }

    // public function table(array $fields, array $columns): Tabs
    // {
    //     $this->validateFields($fields);

    //     $fields = $this->resolveFields($fields, $columns);

    //     $repeaters = $this->resolveRepeaters($fields);

    //     return Tabs::make()
    //         ->schema([
    //             Tab::make('English')
    //                 ->schema([
    //                     $repeaters['en']
    //                 ]),
    //             Tab::make('French')
    //                 ->schema([
    //                     $repeaters['fr']
    //                 ]),
    //         ]);
    // }
}
