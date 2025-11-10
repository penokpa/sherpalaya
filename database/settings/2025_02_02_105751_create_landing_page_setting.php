<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('landing_page.animation_sections', null);

        $this->migrator->add('landing_page.ask_for_animation_title', null);
        $this->migrator->add('landing_page.ask_for_animation_content', null);
        $this->migrator->add('landing_page.ask_for_animation_image_id', null);
        $this->migrator->add('landing_page.ask_for_animation_positive_response', null);
        $this->migrator->add('landing_page.ask_for_animation_negative_response', null);

        $this->migrator->add('landing_page.animation_button_icon_id', null);
        $this->migrator->add('landing_page.animation_button_text', null);
        $this->migrator->add('landing_page.animation_sound_id', null);

        $this->migrator->add('landing_page.expedition_activity_image_id', null);
        $this->migrator->add('landing_page.expedition_activity_content', null);
        $this->migrator->add('landing_page.expedition_activity_count', null);

        $this->migrator->add('landing_page.trek_activity_image_id', null);
        $this->migrator->add('landing_page.trek_activity_content', null);
        $this->migrator->add('landing_page.trek_activity_count', null);

        $this->migrator->add('landing_page.tour_activity_image_id', null);
        $this->migrator->add('landing_page.tour_activity_content', null);
        $this->migrator->add('landing_page.tour_activity_count', null);

        $this->migrator->add('landing_page.peak_activity_image_id', null);
        $this->migrator->add('landing_page.peak_activity_content', null);
        $this->migrator->add('landing_page.peak_activity_count', null);

        $this->migrator->add('landing_page.stat_traveller_count', null);
        $this->migrator->add('landing_page.stat_association_count', null);
        $this->migrator->add('landing_page.stat_customer_feedback', null);
        $this->migrator->add('landing_page.stat_success_rate', null);

        $this->migrator->add('landing_page.parallax_image_id', null);

    }
};
