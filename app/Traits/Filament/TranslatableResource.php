<?php
namespace App\Traits\Filament;

use Exception;
use Filament\Resources\Concerns\Translatable;
use Illuminate\Support\Arr;
use Spatie\Translatable\HasTranslations;

trait TranslatableResource
{
    use Translatable;

    public static function getTranslatableLocales(): array
    {
        return ['en', 'fr'];
    }

    public static function getRepeaterFields(): array
    {
        return [];
    }

    public static function getTranslatableAttributes(): array
    {
        $model = static::getModel();

        if (! method_exists($model, 'getTranslatableAttributes')) {
            throw new Exception("Model [{$model}] must use trait [" . HasTranslations::class . '].');
        }

        $attributes = app($model)->getTranslatableAttributes();

        if (! count($attributes)) {
            throw new Exception("Model [{$model}] must have [\$translatable] properties defined.");
        }


        $attributes = Arr::reject($attributes, function($translatableAttribute){
            return in_array($translatableAttribute, self::getRepeaterFields());
        });

        return $attributes;
    }
}
