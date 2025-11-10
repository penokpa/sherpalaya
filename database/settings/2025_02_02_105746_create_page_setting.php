<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('page.expedition_page_cover_image_id', null);
        $this->migrator->add('page.expedition_page_content', null);
        $this->migrator->add('page.trek_page_cover_image_id', null);
        $this->migrator->add('page.trek_page_content', null);
        $this->migrator->add('page.tour_page_cover_image_id', null);
        $this->migrator->add('page.tour_page_content', null);
        $this->migrator->add('page.peak_page_cover_image_id', null);
        $this->migrator->add('page.peak_page_content', null);
        $this->migrator->add('page.service_page_cover_image_id', null);
        $this->migrator->add('page.service_page_content', null);
        $this->migrator->add('page.about_us_page_cover_image_id', null);
        $this->migrator->add('page.about_us_page_content', null);


    }
};
