<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->update(
            'company.company_email_en',
            fn () => 'info@sherpalaya.com',
        );

        $this->migrator->update(
            'company.company_email_fr',
            fn () => 'info@sherpalaya.com',
        );

        $this->migrator->update(
            'company.company_address_en',
            fn ($value) => is_string($value) && str_contains($value, 'Bafal')
                ? 'Chandol, Ward No. 4, Kathmandu'
                : $value,
        );

        $this->migrator->update(
            'company.company_address_fr',
            fn ($value) => is_string($value) && str_contains($value, 'Bafal')
                ? 'Chandol, Ward No. 4, Kathmandu'
                : $value,
        );

        $this->migrator->update(
            'legal.privacy_policy_en',
            fn ($value) => is_string($value)
                ? str_replace('support@sherpalaya.com', 'info@sherpalaya.com', $value)
                : $value,
        );

        $this->migrator->update(
            'legal.privacy_policy_fr',
            fn ($value) => is_string($value)
                ? str_replace('support@sherpalaya.com', 'info@sherpalaya.com', $value)
                : $value,
        );
    }
};
