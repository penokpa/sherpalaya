<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class ContactUsSetting extends Settings
{
    public ?string $content;
    public ?string $address;
    public ?string $contact;
    public ?string $working_hour;

    public static function group(): string
    {
        return 'contact_us';
    }
}
