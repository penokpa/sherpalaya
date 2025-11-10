<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Spatie\Translatable\HasTranslations;

class EssentialTip extends Model
{
    use HasTranslations;
    protected $fillable = [
        'tippable_id',
        'tippable_type',
        'title',
        'description',
    ];
    public $translatable = [
        'title',
        'description',
    ];
    public function tippable(): MorphTo
    {
        return $this->morphTo();
    }
}
