<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class DestinationItinerary extends Pivot
{
    protected $fillable = [
        'destination_id',
        'itinerary_id',
        'order'
    ];
}
