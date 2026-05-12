<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class PageSetting extends Settings
{
    public ?string $expedition_page_cover_image_id;
    public ?string $expedition_page_content_en;
    public ?string $expedition_page_content_fr;
    public ?string $expedition_page_title_up_en;
    public ?string $expedition_page_title_up_fr;
    public ?string $expedition_page_main_title_en;
    public ?string $expedition_page_main_title_fr;
    public ?string $expedition_page_title_down_en;
    public ?string $expedition_page_title_down_fr;

    public ?string $trek_page_cover_image_id;
    public ?string $trek_page_content_en;
    public ?string $trek_page_content_fr;

    public ?string $trek_page_title_up_en;
    public ?string $trek_page_title_up_fr;
    public ?string $trek_page_main_title_en;
    public ?string $trek_page_main_title_fr;
    public ?string $trek_page_title_down_en;
    public ?string $trek_page_title_down_fr;

    public ?string $tour_page_cover_image_id;
    public ?string $tour_page_content_en;
    public ?string $tour_page_content_fr;
    public ?string $tour_page_title_up_en;
    public ?string $tour_page_title_up_fr;
    public ?string $tour_page_main_title_en;
    public ?string $tour_page_main_title_fr;
    public ?string $tour_page_title_down_en;
    public ?string $tour_page_title_down_fr;
    
    public ?string $team_page_cover_image_id;
    public ?string $team_page_content_title_en;
    public ?string $team_page_content_title_fr;
    public ?string $team_page_content_en;
    public ?string $team_page_content_fr;
    public ?string $team_page_title_up_en;
    public ?string $team_page_title_up_fr;
    public ?string $team_page_main_title_en;
    public ?string $team_page_main_title_fr;
    public ?string $team_page_title_down_en;
    public ?string $team_page_title_down_fr;



    public static function group(): string
    {
        return 'page';
    }
}
