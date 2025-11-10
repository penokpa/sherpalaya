<?php

namespace App\Models;

use App\Helpers\CuratorModelHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class OurSherpa extends Model
{
    use HasTranslations;
    protected $fillable = [
        'profile_picture_id',
        'name',
        'title',
        'description',
    ];

    public $translatable = [
        'title',
        'description',
    ];


    protected static function booted()
    {
        static::creating(function ($sherpa){
            if(is_null($sherpa->description)){
                $sherpa->description = '';
            }
        });
    }
    public function treks()
    {
        return $this->belongsToMany(
            Trek::class,
            'our_sherpa_trek'
        )->using(OurSherpaTrek::class)
            ->withPivot([
                'order'
            ]);
    }
    public function expeditions()
    {
        return $this->belongsToMany(
            Expedition::class,
            'our_sherpa_expedition'
        )->using(OurSherpaExpedition::class)
            ->withPivot([
                'order'
            ]);
    }
    public function tours()
    {
        return $this->belongsToMany(
            Tour::class,
            'our_sherpa_tour'
        )->using(OurSherpaTour::class)
            ->withPivot([
                'order'
            ]);
    }
    public function profilePicture(): BelongsTo
    {
        return CuratorModelHelper::belongsTo($this, 'profile_picture_id');
    }
    public function awardsAndCertificates(): BelongsToMany
    {
        return CuratorModelHelper::belongsToMany($this, 'awards_and_certificates_media', 'our_sherpa_id');
    }
}
