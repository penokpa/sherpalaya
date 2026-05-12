<?php

namespace App\Models;

use App\Helpers\CuratorModelHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use RalphJSmit\Laravel\SEO\Support\SEOData;
use Spatie\Translatable\HasTranslations;

class OurSherpa extends Model
{
    use HasTranslations;
    protected $fillable = [
        'profile_picture_id',
        'name',
        'language',
        'title',
        'description',
        'experience'
    ];

    public $translatable = [
        'title',
        'description',
        // 'experience',
    ];
    protected $casts = [
        'language' => 'array',
        'experience' => 'array',
    ];


    protected static function booted()
    {
        static::creating(function ($sherpa){
            if(is_null($sherpa->description)){
                $sherpa->description = '';
            }
            if(is_null($sherpa->experience)){
                $sherpa->experience = '';
            }
            if(is_null($sherpa->language)){
                $sherpa->language = [];
            }
        });
    }

    // SEO

    public function getDynamicSEOData(): SEOData
    {
        $this->loadMissing('profilePicture');

        // Override only the properties you want:
        return new SEOData(
            title: $this->name,
            description: $this->title,
            image: $this->profilePicture?->url,
            author: "Sherpalaya",
        );
    }

    // Relationships

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

    public function expidetionOurSherpas(){
        return $this->hasMany(ExpeditionOurSherpa::class);
    }
    public function expeditions()
    {
        return $this->belongsToMany(
            Expedition::class,
            'expedition_our_sherpa'
        )->using(ExpeditionOurSherpa::class)
            ->withPivot([
                'order','count'
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
