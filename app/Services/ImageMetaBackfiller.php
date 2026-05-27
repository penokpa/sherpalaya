<?php

namespace App\Services;

use Awcodes\Curator\Models\Media;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ImageMetaBackfiller
{
    /**
     * Backfill empty alt/title on the Media rows attached to $parent
     * via the given BelongsTo image relations.
     *
     * Uses DB::table to bypass MediaObserver — we only touch alt/title,
     * never `name`, but going through Eloquent could still trigger
     * unintended writes on translatable fields elsewhere.
     */
    public static function apply(Model $parent, array $imageRelations, string $titleField = 'title'): void
    {
        $title = self::resolveTitle($parent, $titleField);

        if ($title === '') {
            return;
        }

        $ids = collect($imageRelations)
            ->map(fn (string $rel) => $parent->{$rel . '_id'} ?? null)
            ->filter()
            ->unique()
            ->values()
            ->all();

        if (empty($ids)) {
            return;
        }

        Media::query()
            ->whereIn('id', $ids)
            ->get(['id', 'alt', 'title'])
            ->each(function (Media $m) use ($title) {
                $update = [];

                if (blank($m->alt)) {
                    $update['alt'] = $title;
                }

                if (blank($m->title)) {
                    $update['title'] = $title;
                }

                if (! empty($update)) {
                    DB::table($m->getTable())->where('id', $m->id)->update($update);
                }
            });
    }

    private static function resolveTitle(Model $parent, string $field): string
    {
        if (method_exists($parent, 'getTranslation')) {
            return trim((string) $parent->getTranslation($field, 'en', false));
        }

        return trim((string) ($parent->{$field} ?? ''));
    }
}
