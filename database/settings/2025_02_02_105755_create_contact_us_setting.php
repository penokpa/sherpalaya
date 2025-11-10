<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('contact_us.content', null);
        $this->migrator->add('contact_us.address', null);
        $this->migrator->add('contact_us.contact', null);
        $this->migrator->add('contact_us.working_hour', null);
    }
};
