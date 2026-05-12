<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class LegalSetting extends Settings
{

    public ?string $privacy_policy_en;
    public ?string $privacy_policy_fr;
    public ?string $terms_and_condition_en;
    public ?string $terms_and_condition_fr;
    public ?string $cookie_policy_en;
    public ?string $cookie_policy_fr;

    public static function group(): string
    {
        return 'legal';
    }
}
