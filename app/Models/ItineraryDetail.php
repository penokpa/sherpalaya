<?php

namespace App\Models;

use App\Enums\ItineraryTypes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ItineraryDetail extends Model
{
    use HasFactory;

    use HasTranslations;

    protected $fillable =[
        'itinerary_id',
        'type',
        'description',
    ];
    public $translatable = [
        'description',
    ];

    protected $casts = [
        'type' => ItineraryTypes::class,
    ];

    public function itinerary()
    {
        return $this->belongsTo(Itinerary::class);
    }
}
