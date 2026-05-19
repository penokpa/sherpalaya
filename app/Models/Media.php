<?php

namespace App\Models;

use Awcodes\Curator\Models\Media as BaseMedia;
use Awcodes\Curator\Support\Helpers;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as InterventionImage;

/**
 * Smart media URL resolution + auto-optimization on upload.
 *
 * - Newly uploaded images are downscaled to max 1920px wide and re-encoded
 *   at quality 82, in place. Original Curator metadata (size, dimensions)
 *   is refreshed afterwards so the admin shows accurate numbers.
 * - URL resolution prefers the local public disk in dev, falls back to
 *   Curator's default in prod.
 */
class Media extends BaseMedia
{
    /** Anything wider than this gets scaled down on upload. */
    private const MAX_WIDTH = 1920;

    /** JPEG/WebP quality. 82 is the sweet spot — visually identical to 100, ~70% smaller. */
    private const JPEG_QUALITY = 82;

    /** PNG compression level (0–9). 9 = max compression (still lossless). */
    private const PNG_COMPRESSION = 9;

    private const OPTIMIZABLE_TYPES = [
        'image/jpeg',
        'image/jpg',
        'image/png',
        'image/webp',
    ];

    protected static function booted(): void
    {
        static::created(function (self $media) {
            $media->optimizeUploadedImage();
        });
    }

    /**
     * Resize + re-encode the just-uploaded file in place.
     * Silent no-op for non-raster types, missing files, or unexpected failures.
     */
    public function optimizeUploadedImage(): void
    {
        if (! in_array($this->type, self::OPTIMIZABLE_TYPES, true)) {
            return;
        }

        if (blank($this->disk) || blank($this->path)) {
            return;
        }

        $disk = Storage::disk($this->disk);
        if (! $disk->exists($this->path)) {
            return;
        }

        $fullPath = $disk->path($this->path);

        try {
            $image = InterventionImage::make($fullPath);

            // Downscale only — never upscale a small image
            if ($image->width() > self::MAX_WIDTH) {
                $image->resize(self::MAX_WIDTH, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
            }

            $quality = $this->type === 'image/png'
                ? self::PNG_COMPRESSION
                : self::JPEG_QUALITY;

            $image->save($fullPath, $quality);

            // Refresh size/dimensions so the admin shows accurate metadata
            clearstatcache(true, $fullPath);
            $this->size = filesize($fullPath);
            $this->width = $image->width();
            $this->height = $image->height();
            $this->saveQuietly();
        } catch (\Throwable $e) {
            // Don't crash uploads if optimization fails — original file is still saved.
            report($e);
        }
    }

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
