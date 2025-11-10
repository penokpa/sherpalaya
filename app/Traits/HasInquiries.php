<?php

namespace App\Traits;

use App\Models\Inquiry;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasInquiries
{
    public function inquiries(): MorphMany
    {
        return $this->morphMany(Inquiry::class, 'inquiriable');
    }

    public function getWhatsappUrl(): string
    {
        $siteUrl = $this->getUrl(); // Get the actual URL
        $message = "Hey there! I am contacting for a package listed on your website at: " . $siteUrl;

        return "https://wa.me/" . config('services.whatsapp.number') . "?text=" . urlencode($message);
    }


    public function getUrl(): string
    {
        $resourceName = strtolower(
            Arr::last(
                explode(
                    '\\',
                    get_class($this)
                )
            )
        );
        return  config('app.url') . '/' . Str::plural($resourceName) . '/' . $this->id;
    }
}
