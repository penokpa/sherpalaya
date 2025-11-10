<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class PageSetting extends Settings
{
    public ?string $expedition_page_cover_image_id;
    public ?string $expedition_page_content;

    public ?string $trek_page_cover_image_id;
    public ?string $trek_page_content;

    public ?string $tour_page_cover_image_id;
    public ?string $tour_page_content;

    public ?string $peak_page_cover_image_id;
    public ?string $peak_page_content;

    public ?string $service_page_cover_image_id;
    public ?string $service_page_content;

   

    public static function group(): string
    {
        return 'page';
    }
}
