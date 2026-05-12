<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class AboutUsSetting extends Settings
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
    public ?array $certificate_images;

    public static function group(): string
    {
        return 'about_us';
    }
}
