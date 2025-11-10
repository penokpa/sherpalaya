<?php

namespace App\Models;

use App\Contracts\CanBeEasySearched;
use App\Contracts\CanBeInquiried;
use App\Enums\SearchType;
use App\Helpers\CuratorModelHelper;
use App\Traits\EasySearch;
use App\Traits\HasInquiries;
use Awcodes\Curator\Models\Media;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Collection;
use Spatie\Translatable\HasTranslations;

class Service extends Model implements CanBeEasySearched, CanBeInquiried
{
    use EasySearch;
    use HasInquiries;
    use HasTranslations;
    protected $fillable = [
        'title',
        'description',
        'cover_image_id',
        'location',
        // is_active
    ];
    protected $casts = [
        'location' => 'array',
        'is_active' => 'boolean',
    ];

    public $translatable = [
        'title',
        'description',
    ];
    // Easy Search

    public function searchType(): SearchType
    {
        return SearchType::SERVICE;
    }


    public function searchResultTitle(): string
    {
        return $this->title;
    }

    public function searchResultUrl(): string
    {
        return '/services/' . $this->id;
    }

    public function searchResultImage(): ?Media
    {
        $this->loadMissing('coverImage');
        return $this->coverImage;
    }

    // RELATIONSHIPS

    public function inquiries(): MorphMany
    {
        return $this->morphMany(Inquiry::class, 'inquiriable');
    }
    public function destinations()
    {
        return $this->belongsToMany(
            Destination::class,
            'destination_service'
        )->using(DestinationService::class)
            ->withPivot([
                'order'
            ]);
    }
    public function coverImage(): BelongsTo
    {
        return CuratorModelHelper::belongsTo($this, 'cover_image_id');
    }
    public function images(): BelongsToMany
    {
        return CuratorModelHelper::belongsToMany($this, 'media_service', 'service_id');
    }
}
