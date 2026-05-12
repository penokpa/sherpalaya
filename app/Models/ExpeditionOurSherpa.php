<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ExpeditionOurSherpa extends Pivot
{
    protected $fillable = [
        'our_sherpa_id',
        'expedition_id',
        'order',
        'count'
    ];

    // Relationships

    public function expedition(){
        return $this->belongsTo(Expedition::class);
    }

    public function ourSherpa(){
        return $this->belongsTo(OurSherpa::class);
    }
}
