<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('company.company_whatsapp_number', env('WHATSAPP_NUMBER', '9779801717177'));
    }
};
