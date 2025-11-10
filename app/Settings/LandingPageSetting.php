<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class LandingPageSetting extends Settings
{

    /**
     * Animation format for single animation
     *      - id (auto generate on create)
     *      - title
     *      - content
     *      - icon_id
     *      - image_id
     *      - wait_time
     */
    // Animation
    public ?array $animation_sections;

    public ?string $ask_for_animation_title;
    public ?string $ask_for_animation_content;
    public ?string $ask_for_animation_image_id;
    public ?string $ask_for_animation_positive_response;
    public ?string $ask_for_animation_negative_response;

    public ?string $animation_button_icon_id;
    public ?string $animation_button_text;

    public ?string $animation_sound_id;

    // Activity

    public ?string $expedition_activity_image_id;
    public ?string $expedition_activity_content;
    public ?string $expedition_activity_count;

    public ?string $trek_activity_image_id;
    public ?string $trek_activity_content;
    public ?string $trek_activity_count;

    public ?string $tour_activity_image_id;
    public ?string $tour_activity_content;
    public ?string $tour_activity_count;

    public ?string $peak_activity_image_id;
    public ?string $peak_activity_content;
    public ?string $peak_activity_count;

    // Stat
    public ?string $stat_traveller_count;
    public ?string $stat_association_count;
    public ?string $stat_customer_feedback;
    public ?string $stat_success_rate;

    public ?string $parallax_image_id;

    public static function group(): string
    {
        return 'landing_page';
    }
}
