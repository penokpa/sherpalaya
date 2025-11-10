<?php
namespace App\Traits;

use App\Contracts\EnumHasTranslation;
use Exception;

trait TranslatableEnum
{

    public static function enumImplementsEnumHasTranslation(): bool
    {
        return in_array(EnumHasTranslation::class, class_implements(self::class) ?? []);
    }

    public static function getAllTranslatedOptions($locale): array
    {
        if(!enum_exists(self::class)){
            throw new Exception(self::class . " is not an enum");
        }

        if (!self::enumImplementsEnumHasTranslation()) {
            throw new Exception("Enum is not translatable");
        }

        $options = [];

        foreach (self::cases() as $case) {
            $translatedLabelKey = self::getTranslationKey() . '.' . $case->value;
            $translatedData =  __($translatedLabelKey, locale: $locale ?? 'en') ?? 'N/A';

            $options[$case->value] = $translatedData;
        }
        return $options;
    }

    public function getTranslatedOption($locale): string
    {
        $allOptions = self::getAllTranslatedOptions($locale);

        return isset($allOptions[$this->value]) ? $allOptions[$this->value] : "N/A";
    }

    public function getLabel(): string
    {
        return $this->getTranslatedOption(app()->currentLocale() ?? 'en', $this);
    }
}
