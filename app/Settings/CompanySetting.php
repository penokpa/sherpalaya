<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class CompanySetting extends Settings
{

    public ?string $company_logo_id;
    public ?string $company_name_en;
    public ?string $company_name_fr;
    public ?string $company_address_en;
    public ?string $company_address_fr;
    public ?string $company_email_en;
    public ?string $company_email_fr;
    public ?string $company_contact_number_en;
    public ?string $company_contact_number_fr;

    public ?string $facebook_url;
    public ?string $instagram_url;
    public ?string $youtube_url;
    public ?string $tiktok_url;


    public static function group(): string
    {
        return 'company';
    }
}
