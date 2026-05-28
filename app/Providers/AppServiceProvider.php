<?php

namespace App\Providers;

use App\Livewire\Curator\CuratorPanel;
use App\Settings\CompanySetting;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Throwable;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // CMS overrides the env-based WhatsApp number when present, so call sites
        // that read config('services.whatsapp.number') don't need to know about settings.
        // Wrapped so fresh-install migrations don't crash before settings exist.
        try {
            $waNumber = app(CompanySetting::class)->company_whatsapp_number;
            if (filled($waNumber)) {
                config(['services.whatsapp.number' => $waNumber]);
            }
        } catch (Throwable) {
            // Settings table not ready yet — env fallback applies.
        }

        Livewire::component('curator-panel', CuratorPanel::class);
    }
}
