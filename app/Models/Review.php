<?php

namespace App\Models;

use App\Enums\ReviewPlatform;
use App\Helpers\CuratorModelHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    protected $fillable = [
        'name',
        'title',
        'description',
        'image_id',
        'display_in_home_page',
        'platform',
        'rating',
        'reviewed_at',
        'review_url',
    ];

    protected function casts()
    {
        return [
            'display_in_home_page' => 'boolean',
            'platform' => ReviewPlatform::class,
            'rating' => 'integer',
            'reviewed_at' => 'date',
        ];
    }

    public function reviewImage(): BelongsTo
    {
        return CuratorModelHelper::belongsTo($this, 'image_id');
    }
}
