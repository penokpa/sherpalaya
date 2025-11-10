<?php

namespace App\Models;

use App\Enums\InquiryType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Inquiry extends Model
{
    
    protected $fillable = [
        'full_name',
        'email',
        'message',
        'type',
        'inquiriable_id',
        'inquiriable_type'
    ];

    protected function casts()
    {
        return [
            'type' => InquiryType::class
        ];
    }

    // Relation
    public function inquiriable(): MorphTo
    {
        return $this->morphTo();
    }
}
