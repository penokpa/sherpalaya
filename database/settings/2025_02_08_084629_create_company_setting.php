<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('company.company_logo_id', null);
        $this->migrator->add('company.company_name_en', null);
        $this->migrator->add('company.company_name_fr', null);
        $this->migrator->add('company.company_address_en', null);
        $this->migrator->add('company.company_address_fr', null);
        $this->migrator->add('company.company_email_en', null);
        $this->migrator->add('company.company_email_fr', null);
        $this->migrator->add('company.company_contact_number_en', null);
        $this->migrator->add('company.company_contact_number_fr', null);

        $this->migrator->add('company.facebook_url', null);
        $this->migrator->add('company.instagram_url', null);
        $this->migrator->add('company.youtube_url', null);
        $this->migrator->add('company.tiktok_url', null);

    }
};
