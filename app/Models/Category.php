<?php

namespace App\Models;

use App\Enums\CategoryType;
use App\Helpers\CuratorModelHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasTranslations;

    protected $fillable = [
        'name',
        'type',
        'order',
        'slug',
        'description',
        'sort_order',
        'cover_image_id',
    ];

    protected $casts = [
        'type'       => CategoryType::class,
        'sort_order' => 'integer',
    ];

    public $translatable = [
        'name',
        'description',
    ];

    protected static function booted(): void
    {
        static::saving(function (self $category) {
            if (blank($category->slug) && filled($category->name)) {
                $base = Str::slug($category->getTranslation('name', 'en', false) ?: 'category');
                $category->slug = static::uniqueSlug($base, $category->getKey());
            }
        });
    }

    protected static function uniqueSlug(string $base, ?int $ignoreId = null): string
    {
        $slug = $base;
        $i = 2;
        while (static::query()
            ->where('slug', $slug)
            ->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))
            ->exists()
        ) {
            $slug = $base . '-' . $i++;
        }
        return $slug;
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function coverImage(): BelongsTo
    {
        return CuratorModelHelper::belongsTo($this, 'cover_image_id');
    }

    public function expeditions()
    {
        return $this->hasMany(Expedition::class);
    }

    public function treks()
    {
        return $this->hasMany(Trek::class);
    }

    public function tours()
    {
        return $this->hasMany(Tour::class);
    }
}
