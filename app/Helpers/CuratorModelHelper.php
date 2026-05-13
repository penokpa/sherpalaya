<?php
namespace App\Helpers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CuratorModelHelper
{
    protected static function mediaClass(): string
    {
        return config('curator.model', \Awcodes\Curator\Models\Media::class);
    }

    public static function belongsTo(Model $model, string $relatedId): BelongsTo
    {
        return $model->belongsTo(static::mediaClass(), $relatedId, 'id');
    }

    public static function belongsToMany(
        Model $model,
        string $table,
        string $relatedId,
        string $mediaId = 'media_id',
        bool $isOrderable = true,
    ): BelongsToMany {
        $class = static::mediaClass();
        if ($isOrderable) {
            return $model
                ->belongsToMany($class, $table, $relatedId, $mediaId)
                ->withPivot('order')
                ->orderBy('order');
        } else {
            return $model
                ->belongsToMany($class, $table, $relatedId, $mediaId);
        }
    }
}
