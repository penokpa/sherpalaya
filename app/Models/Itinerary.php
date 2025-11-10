<?php

namespace App\Models;

use App\Enums\ItineraryTypes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Spatie\Translatable\HasTranslations;

class Itinerary extends Model
{
    use HasFactory;

    use HasTranslations;

    protected $fillable =[
        'title',
        'itinerable_id',
        'itinerable_type',
    ];

    protected $casts = [
        // 'type' => ItineraryTypes::class,
    ];

    public $translatable = [
        'title',
    ];
    public function itinerable(): MorphTo
    {
        return $this->morphTo();
    }
    public function itineraryDetails()
    {
        return $this->hasMany(ItineraryDetail::class);
    }
    public function destinations()
    {
        return $this->belongsToMany(
            Destination::class,
            'destination_itinerary'
        )->using(DestinationItinerary::class)
            ->withPivot([
                'order'
            ]);
    }
}
