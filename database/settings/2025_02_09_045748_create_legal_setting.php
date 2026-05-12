<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('legal.privacy_policy_en', null);
        $this->migrator->add('legal.privacy_policy_fr', null);
        $this->migrator->add('legal.terms_and_condition_en', null);
        $this->migrator->add('legal.terms_and_condition_fr', null);
        $this->migrator->add('legal.cookie_policy_en', null);
        $this->migrator->add('legal.cookie_policy_fr', null);
    }
};
