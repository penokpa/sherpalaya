<?php

namespace App\Observers;

use App\Services\ImageMetaBackfiller;
use Illuminate\Database\Eloquent\Model;

class BackfillImageMetaObserver
{
    public function saved(Model $model): void
    {
        ImageMetaBackfiller::apply($model, ['cover_image', 'feature_image']);
    }
}
