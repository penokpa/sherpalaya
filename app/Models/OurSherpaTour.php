<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class OurSherpaTour extends Pivot
{
    protected $fillable = [
        'our_sherpa_id',
        'tour_id',
        'order'
    ];
}
