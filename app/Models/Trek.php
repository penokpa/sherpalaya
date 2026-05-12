<?php

namespace App\Models;

use App\Contracts\CanBeEasySearched;
use App\Contracts\CanBeInquiried;
use App\Enums\SearchType;
use App\Enums\TrekDifficulty;
use App\Helpers\CuratorModelHelper;
use App\Traits\EasySearch;
use App\Traits\HasCategory;
use App\Traits\HasInquiries;
use Awcodes\Curator\Models\Media;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Collection;
use RalphJSmit\Laravel\SEO\Support\SEOData;
use Spatie\Translatable\HasTranslations;

class Trek extends Model implements CanBeEasySearched, CanBeInquiried
{
    use EasySearch;
    use HasFactory;
    use HasInquiries;
    use HasTranslations;
    use HasCategory;

    protected $fillable = [
        'title',
        'cover_image_id',
        'feature_image_id',
        'description',
        'duration',
        'region_id',
        'grade',
        'starting_point',
        'ending_point',
        'best_time_for_trek',
        'starting_altitude',
        'highest_altitude',
        'trek_difficulty',
        'costs_include',
        'costs_exclude',
        'is_featured',
    ];
    public $translatable = [
        'title',
        'description',
        'best_time_for_trek',
        'costs_include',
        'costs_exclude',
    ];

    protected $casts = [
        'trek_difficulty' => TrekDifficulty::class,
        'costs_exclude' => 'array',
        'costs_include' => 'array',
    ];

    // SEO

    public function getDynamicSEOData(): SEOData
    {
        return new SEOData(
            title: $this->title,
            description: $this->description,
            image: $this->searchResultImage()?->url,
            author: "Sherpalaya",
        );
    }

    // Easy Search

    public function searchType(): SearchType{
        return SearchType::TREK;
    }


    public function searchResultTitle(): string{
        return $this->title;
    }

    public function searchResultUrl(): string
    {
        return '/' . app()->currentLocale() . '/treks/' . $this->id;
    }

    public function searchResultImage(): ?Media
    {
        $this->loadMissing('coverImage');
        return $this->coverImage;
    }

    // RELATIONSHIPS

    public function itineraries():MorphMany
    {
        return $this->morphMany(Itinerary::class,'itinerable');
    }
    public function keyHighlights():MorphMany
    {
        return $this->morphMany(KeyHighlight::class,'highlightable');
    }
    public function essentialTips():MorphMany
    {
        return $this->morphMany(EssentialTip::class,'tippable');
    }
    public function inquiries(): MorphMany
    {
        return $this->morphMany(Inquiry::class, 'inquiriable');
    }

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }
    public function destinations()
    {
        return $this->belongsToMany(
            Destination::class,
            'destination_trek'
        )->using(DestinationTrek::class)
            ->withPivot([
                'order'
            ]);
    }
    public function sherpas()
    {
        return $this->belongsToMany(
            OurSherpa::class,
            'our_sherpa_trek'
        )->using(OurSherpaTrek::class)
            ->withPivot([
                'order'
            ]);
    }

    public function coverImage(): BelongsTo
    {
        return CuratorModelHelper::belongsTo($this, 'cover_image_id');
    }

    public function featureImage(): BelongsTo
    {
        return CuratorModelHelper::belongsTo($this, 'feature_image_id');
    }

    public function images(): BelongsToMany
    {
        return CuratorModelHelper::belongsToMany($this, 'media_trek', 'trek_id');
    }


}
