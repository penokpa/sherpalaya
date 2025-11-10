<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class CompanySetting extends Settings
{

    public ?string $company_logo_id;
    public ?string $company_name;
    public ?string $company_address;
    public ?string $company_email;
    public ?string $company_contact_number;

    public ?string $facebook_url;
    public ?string $instagram_url;
    public ?string $youtube_url;
    public ?string $tiktok_url;


    public static function group(): string
    {
        return 'company';
    }
}
