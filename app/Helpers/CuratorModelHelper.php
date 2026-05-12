<?php
namespace App\Helpers;

use Awcodes\Curator\Models\Media;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CuratorModelHelper
{

    public static function belongsTo(Model $model, string $relatedId): BelongsTo
    {
        return $model->belongsTo(Media::class, $relatedId, 'id');
    }

    public static function belongsToMany(
        Model $model,
        string $table,
        string $relatedId,
        string $mediaId = 'media_id',
        bool $isOrderable = true,
    ): BelongsToMany {
        if ($isOrderable) {
            return $model
                ->belongsToMany(Media::class, $table, $relatedId, $mediaId)
                ->withPivot('order')
                ->orderBy('order');
        } else {
            return $model
                ->belongsToMany(Media::class, $table, $relatedId, $mediaId);
        }
    }
}
