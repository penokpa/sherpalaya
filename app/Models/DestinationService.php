<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class DestinationService extends Pivot
{
    protected $fillable = [
        'destination_id',
        'service_id',
        'order',
    ];
}
