<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class DestinationTrek extends Pivot
{
    protected $fillable = [
        'destination_id',
        'trek_id',
        'order'
    ];
}
