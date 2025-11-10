<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Spatie\Translatable\HasTranslations;

class KeyHighlight extends Model
{
    use HasTranslations;

    protected $fillable = [
        'highlightable_id',
        'highlightable_type',
        'title',
        'description',
    ];
    public $translatable = [
        'title',
        'description',
    ];
    public function highlightable(): MorphTo
    {
        return $this->morphTo();
    }
}

