<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class AboutUsSetting extends Settings
{

    public ?string $cover_image_id;
    public ?string $content;
    public ?array $certificate_images;

    // public static function casts(): array
    // {
    //     return [
    //         'certificate_images' => 'array',
    //     ];
    // }

    public static function group(): string
    {
        return 'about_us';
    }
}
