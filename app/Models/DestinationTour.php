<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class DestinationTour extends Pivot
{
    protected $fillable = [
        'destination_id',
        'tour_id',
        'order'
    ];
}
