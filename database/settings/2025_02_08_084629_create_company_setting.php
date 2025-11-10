<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('company.company_logo_id', null);
        $this->migrator->add('company.company_name', null);
        $this->migrator->add('company.company_address', null);
        $this->migrator->add('company.company_email', null);
        $this->migrator->add('company.company_contact_number', null);

        $this->migrator->add('company.facebook_url', null);
        $this->migrator->add('company.instagram_url', null);
        $this->migrator->add('company.youtube_url', null);
        $this->migrator->add('company.tiktok_url', null);

    }
};
