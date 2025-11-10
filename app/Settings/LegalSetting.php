<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class LegalSetting extends Settings
{

    public ?string $privacy_policy;
    public ?string $terms_and_condition;
    public ?string $cookie_policy;

    public static function group(): string
    {
        return 'legal';
    }
}
