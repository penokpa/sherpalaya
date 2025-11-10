<?php

namespace App\Models;

use App\Contracts\CanBeEasySearched;
use App\Enums\SearchType;
use App\Traits\EasySearch;
use Awcodes\Curator\Models\Media;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Region extends Model
{

    protected $fillable = [
        'name',
    ];

    // RELATIONSHIPS

    public function destinations()
    {
        return $this->hasMany(Destination::class);
    }
    public function treks()
    {
        return $this->hasMany(Trek::class);
    }
    public function tours()
    {
        return $this->hasMany(Tour::class);
    }
    public function expeditions()
    {
        return $this->hasMany(Expedition::class);
    }
}
