<?php

namespace App\Models;

use App\Helpers\CuratorModelHelper;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
use RalphJSmit\Laravel\SEO\Support\SEOData;
use Spatie\Translatable\HasTranslations;

class Post extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $fillable = [
        'slug',
        'title',
        'excerpt',
        'body',
        'cover_image_id',
        'is_featured',
        'published_at',
    ];

    public $translatable = [
        'title',
        'excerpt',
        'body',
    ];

    protected $casts = [
        'is_featured'  => 'boolean',
        'published_at' => 'datetime',
    ];

    protected static function booted(): void
    {
        static::saving(function (Post $post) {
            // Auto-fill slug from the English title when missing.
            if (blank($post->slug)) {
                $base = Str::slug($post->getTranslation('title', 'en', false) ?: 'post');
                $post->slug = static::uniqueSlug($base, $post->getKey());
            }
        });
    }

    protected static function uniqueSlug(string $base, ?int $ignoreId = null): string
    {
        $slug = $base;
        $i    = 2;
        while (static::query()
            ->where('slug', $slug)
            ->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))
            ->exists()
        ) {
            $slug = $base . '-' . $i++;
        }
        return $slug;
    }

    public function coverImage(): BelongsTo
    {
        return CuratorModelHelper::belongsTo($this, 'cover_image_id');
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->whereNotNull('published_at')->where('published_at', '<=', now());
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function isPublished(): bool
    {
        return $this->published_at !== null && $this->published_at->isPast();
    }

    public function getDynamicSEOData(): SEOData
    {
        return new SEOData(
            title:       $this->title,
            description: $this->excerpt,
            image:       $this->coverImage?->url,
            author:      'Sherpalaya',
            published_time: $this->published_at,
            modified_time:  $this->updated_at,
        );
    }
}
