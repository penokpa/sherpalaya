<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('about_us.cover_image_id', null);
        $this->migrator->add('about_us.content_title_en', null);
        $this->migrator->add('about_us.content_title_fr', null);
        $this->migrator->add('about_us.content_en', null);
        $this->migrator->add('about_us.content_fr', null);
        $this->migrator->add('about_us.title_up_fr', null);
        $this->migrator->add('about_us.title_up_en', null);
        $this->migrator->add('about_us.main_title_en', null);
        $this->migrator->add('about_us.main_title_fr', null);
        $this->migrator->add('about_us.title_down_en', null);
        $this->migrator->add('about_us.title_down_fr', null);
        $this->migrator->add('about_us.certificate_images', null);
    }
};
