<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('about_us.cover_image_id', null);
        $this->migrator->add('about_us.content', null);
        $this->migrator->add('about_us.certificate_images', null);
    }
};
