<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('contact_us.cover_image_id', null);
        $this->migrator->add('contact_us.content_en', null);
        $this->migrator->add('contact_us.content_fr', null);
        $this->migrator->add('contact_us.content_title_en', null);
        $this->migrator->add('contact_us.content_title_fr', null);
        $this->migrator->add('contact_us.title_up_fr', null);
        $this->migrator->add('contact_us.title_up_en', null);
        $this->migrator->add('contact_us.main_title_en', null);
        $this->migrator->add('contact_us.main_title_fr', null);
        $this->migrator->add('contact_us.title_down_en', null);
        $this->migrator->add('contact_us.title_down_fr', null);
        $this->migrator->add('contact_us.address_en', null);
        $this->migrator->add('contact_us.address_fr', null);
        $this->migrator->add('contact_us.contact_en', null);
        $this->migrator->add('contact_us.contact_fr', null);
        $this->migrator->add('contact_us.working_hour_en', null);
        $this->migrator->add('contact_us.working_hour_fr', null);
    }
};
