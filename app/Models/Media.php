<?php

namespace App\Models;

use Awcodes\Curator\Models\Media as BaseMedia;
use Awcodes\Curator\Support\Helpers;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;

/**
 * Smart media URL resolution for local dev.
 *
 * Behavior:
 * - If the file exists on the local public disk → returns local URL (APP_URL + /storage/...)
 * - Otherwise → falls back to Curator's default (which respects PUBLIC_DISK_URL env override).
 *
 * Production behavior unchanged: PUBLIC_DISK_URL is unset there, so falls back
 * to APP_URL.'/storage' anyway, and all files exist locally on the server.
 */
class Media extends BaseMedia
{
    protected function url(): Attribute
    {
        return Attribute::make(
            get: function (): string {
                if (blank($this->disk) || blank($this->path)) {
                    return '';
                }

                if ($this->disk === 'public' && Storage::disk('public')->exists($this->path)) {
                    return rtrim(config('app.url'), '/') . '/storage/' . ltrim($this->path, '/');
                }

                return Helpers::getUrl(disk: $this->disk, path: $this->path);
            }
        );
    }
}
