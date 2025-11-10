<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class OurSherpaExpedition extends Pivot
{
    protected $fillable = [
        'our_sherpa_id',
        'expedition_id',
        'order'
    ];
}
