<?php

namespace App\Models;

use App\Enums\CategoryTypes;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasTranslations;


    protected $fillable = [
        'name',
        'type',
        'order',
    ];
    protected $casts = [
        'type' => CategoryTypes::class
    ];

    public $translatable = [
        'name',
    ];

    public function expeditions(){
        return $this->hasMany(Expedition::class);
    }

    public function treks(){
        return $this->hasMany(Trek::class);
    }

    public function tours(){
        return $this->hasMany(Tour::class);
    }
}
