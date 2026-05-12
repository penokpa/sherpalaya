<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class ContactUsSetting extends Settings
{

    public ?string $cover_image_id;
    public ?string $content_title_en;
    public ?string $content_title_fr;
    public ?string $content_en;
    public ?string $content_fr;
    public ?string $title_up_fr;
    public ?string $title_up_en;
    public ?string $main_title_en;
    public ?string $main_title_fr;
    public ?string $title_down_en;
    public ?string $title_down_fr;

    public ?string $address_en;
    public ?string $address_fr;
    public ?string $contact_en;
    public ?string $contact_fr;
    public ?string $working_hour_en;
    public ?string $working_hour_fr;


    public static function group(): string
    {
        return 'contact_us';
    }
}
