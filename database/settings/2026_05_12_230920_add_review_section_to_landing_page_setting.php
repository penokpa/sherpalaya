<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('landing_page.review_section_title_en', 'Real Stories, Real Adventures!');
        $this->migrator->add('landing_page.review_section_title_fr', 'Histoires vraies, aventures vraies !');
        $this->migrator->add('landing_page.review_section_subtitle_en', 'For more reviews, visit our review pages');
        $this->migrator->add('landing_page.review_section_subtitle_fr', "Pour plus d'avis, visitez nos pages d'avis");

        $this->migrator->add('landing_page.tripadvisor_url', null);
        $this->migrator->add('landing_page.google_reviews_url', null);
        $this->migrator->add('landing_page.trustpilot_url', null);
    }
};
