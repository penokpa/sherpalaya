<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('page.expedition_page_cover_image_id', null);
        $this->migrator->add('page.expedition_page_content_en', null);
        $this->migrator->add('page.expedition_page_content_fr', null);
        $this->migrator->add('page.expedition_page_title_up_en', null);
        $this->migrator->add('page.expedition_page_title_up_fr', null);
        $this->migrator->add('page.expedition_page_main_title_en', null);
        $this->migrator->add('page.expedition_page_main_title_fr', null);
        $this->migrator->add('page.expedition_page_title_down_en', null);
        $this->migrator->add('page.expedition_page_title_down_fr', null);

        $this->migrator->add('page.trek_page_cover_image_id', null);
        $this->migrator->add('page.trek_page_content_en', null);
        $this->migrator->add('page.trek_page_content_fr', null);
        $this->migrator->add('page.trek_page_title_up_en', null);
        $this->migrator->add('page.trek_page_title_up_fr', null);
        $this->migrator->add('page.trek_page_main_title_en', null);
        $this->migrator->add('page.trek_page_main_title_fr', null);
        $this->migrator->add('page.trek_page_title_down_en', null);
        $this->migrator->add('page.trek_page_title_down_fr', null);

        $this->migrator->add('page.tour_page_cover_image_id', null);
        $this->migrator->add('page.tour_page_content_en', null);
        $this->migrator->add('page.tour_page_content_fr', null);
        $this->migrator->add('page.tour_page_title_up_en', null);
        $this->migrator->add('page.tour_page_title_up_fr', null);
        $this->migrator->add('page.tour_page_main_title_en', null);
        $this->migrator->add('page.tour_page_main_title_fr', null);
        $this->migrator->add('page.tour_page_title_down_en', null);
        $this->migrator->add('page.tour_page_title_down_fr', null);

       

        $this->migrator->add('page.team_page_cover_image_id', null);
        $this->migrator->add('page.team_page_content_en', null);
        $this->migrator->add('page.team_page_content_fr', null);
        $this->migrator->add('page.team_page_content_title_en', null);
        $this->migrator->add('page.team_page_content_title_fr', null);
        $this->migrator->add('page.team_page_title_up_en', null);
        $this->migrator->add('page.team_page_title_up_fr', null);
        $this->migrator->add('page.team_page_main_title_en', null);
        $this->migrator->add('page.team_page_main_title_fr', null);
        $this->migrator->add('page.team_page_title_down_en', null);
        $this->migrator->add('page.team_page_title_down_fr', null);
    }
};
