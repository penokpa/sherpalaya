#!/usr/bin/env bash
#
# Push only the storage media files that local has but production is
# missing (HTTP 404 on https://sherpalaya.com/storage/<path>).
#
# Usage from this Mac:
#     ./scripts/rsync-missing-media-to-prod.sh           # dry-run, lists what would be sent
#     ./scripts/rsync-missing-media-to-prod.sh --commit  # actually upload
#
# Files-from list is regenerated each run by HEAD-checking every
# cover_image_id / feature_image_id media path against prod.
# Re-runnable: rsync skips files already in place.

set -euo pipefail

SRC_ROOT="/Users/nima.t/Projects/sherpalaya/public/storage"
# Target the Laravel storage disk directly (the public/storage symlink
# on prod points here). Writing through the symlink also works, but
# this is the canonical location and avoids accidentally creating a
# stray directory if the symlink ever goes missing.
DST="sherpala@s1316.sgp1.mysecurecloudhost.com:/home/sherpala/public_html/storage/app/public/"
LIST_FILE="$(mktemp -t sherpalaya-missing-media.XXXXXX)"
trap 'rm -f "$LIST_FILE"' EXIT

cd "$(dirname "$0")/.."

echo "▶ Collecting cover/feature media paths from the DB..."
php artisan tinker --no-interaction --execute='
$ids = collect();
foreach ([\App\Models\Expedition::class, \App\Models\Trek::class, \App\Models\Tour::class, \App\Models\Region::class, \App\Models\Category::class] as $m) {
    foreach ($m::query()->get(["cover_image_id","feature_image_id"]) as $r) {
        if ($r->cover_image_id) $ids->push($r->cover_image_id);
        if ($r->feature_image_id ?? null) $ids->push($r->feature_image_id);
    }
}
foreach (\App\Models\Media::whereIn("id", $ids->unique()->values())->get(["path"]) as $mm) {
    echo $mm->path . PHP_EOL;
}
' 2>/dev/null | sort -u > "$LIST_FILE.all"

total=$(wc -l < "$LIST_FILE.all" | tr -d ' ')
echo "  $total referenced paths"

echo "▶ Probing each against prod (HEAD)..."
while IFS= read -r p; do
    code=$(curl -s -o /dev/null -w "%{http_code}" "https://sherpalaya.com/storage/$p")
    if [ "$code" != "200" ]; then
        echo "$p" >> "$LIST_FILE"
    fi
done < "$LIST_FILE.all"

missing=$(wc -l < "$LIST_FILE" 2>/dev/null | tr -d ' ' || echo 0)
echo "  $missing missing on prod"

if [ "$missing" = "0" ]; then
    echo "✓ Nothing to upload."
    rm -f "$LIST_FILE.all"
    exit 0
fi

# Filter to only files that actually exist locally — won't bother
# trying to rsync something we don't have.
> "$LIST_FILE.have"
while IFS= read -r p; do
    if [ -f "$SRC_ROOT/$p" ]; then
        echo "$p" >> "$LIST_FILE.have"
    else
        echo "  ⚠ skipping (missing locally too): $p" >&2
    fi
done < "$LIST_FILE"

mv "$LIST_FILE.have" "$LIST_FILE"
rm -f "$LIST_FILE.all"

mode="--dry-run"
if [ "${1:-}" = "--commit" ]; then
    mode=""
    echo "▶ Uploading $(wc -l < "$LIST_FILE" | tr -d ' ') files to $DST"
else
    echo "▶ Dry-run — would upload $(wc -l < "$LIST_FILE" | tr -d ' ') files. Pass --commit to actually send."
fi

rsync -avz $mode --files-from="$LIST_FILE" "$SRC_ROOT/" "$DST"

if [ -z "$mode" ]; then
    echo "✓ Upload finished."
fi
