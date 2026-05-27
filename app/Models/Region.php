<?php

namespace App\Models;

use App\Helpers\CuratorModelHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Region extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'sort_order',
        'cover_image_id',
    ];

    protected $casts = [
        'sort_order' => 'integer',
    ];

    protected static function booted(): void
    {
        static::saving(function (self $region) {
            if (blank($region->slug) && filled($region->name)) {
                $region->slug = static::uniqueSlug(Str::slug($region->name), $region->getKey());
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

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    // RELATIONSHIPS

    public function coverImage(): BelongsTo
    {
        return CuratorModelHelper::belongsTo($this, 'cover_image_id');
    }

    public function destinations()
    {
        return $this->hasMany(Destination::class);
    }
    public function treks()
    {
        return $this->hasMany(Trek::class);
    }
    public function tours()
    {
        return $this->hasMany(Tour::class);
    }
    public function expeditions()
    {
        return $this->hasMany(Expedition::class);
    }
}
