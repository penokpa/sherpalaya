<?php

namespace App\Traits;

use App\Models\Category;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;
use Laravel\Scout\Searchable as ScoutSearchable;

trait HasCategory
{
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}