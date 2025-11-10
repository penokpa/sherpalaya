<?php

namespace App\Models;

use App\Contracts\CanBeEasySearched;
use App\Enums\SearchType;
use App\Helpers\CuratorModelHelper;
use App\Traits\EasySearch;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;
use Spatie\Translatable\HasTranslations;

class Destination extends Model
{
    use HasFactory;
    use HasTranslations;


    protected $fillable = [
        'name',
        'description',
        'region_id',
        'location',
    ];

    protected $casts = [
        'location' => 'array',
    ];

    public $translatable = [
        'description',
    ];

    // RELATIONSHIPS
    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function itinerary()
    {
        return $this->belongsTo(Region::class);
    }

    public function services(): BelongsToMany
    {
        return $this->belongsToMany(
            Service::class,
            'destination_service'
        )->using(DestinationService::class)
            ->withPivot([
                'order'
            ]);
    }

    public function treks()
    {
        return $this->belongsToMany(
            Trek::class,
            'destination_trek'
        )->using(DestinationTrek::class)
            ->withPivot([
                'order'
            ]);
    }
    public function expeditions()
    {
        return $this->belongsToMany(
            Trek::class,
            'destination_expedition'
        )->using(DestinationExpedition::class)
            ->withPivot([
                'order'
            ]);
    }
    public function tours()
    {
        return $this->belongsToMany(
            Tour::class,
            'destination_tour'
        )->using(DestinationTour::class)
            ->withPivot([
                'order'
            ]);
    }

    public function destinationImages(): BelongsToMany
    {
        return CuratorModelHelper::belongsToMany($this, 'destination_media', 'destination_id');
    }
}
