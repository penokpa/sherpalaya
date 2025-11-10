<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class OurSherpaTrek extends Pivot
{
    protected $fillable = [
        'our_sherpa_id',
        'trek_id',
        'order'
    ];
}
