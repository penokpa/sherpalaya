# Media Bulk Import

Drop your renamed photos into the folders below, then run:

    php artisan media:wipe --commit            # delete the current library
    php artisan media:bulk-import import       # dry-run
    php artisan media:bulk-import import --commit

Each subfolder has a `_filenames.txt` listing every expected filename.
You can use any image extension (jpg, jpeg, png, webp); the importer
slugifies the filename (sans extension) and matches it against the
record's title.

## Region folders

Each region folder accepts:

  - `region.jpg`         — cover for the region itself
  - `<trek-slug>.jpg`    — sets cover_image_id + feature_image_id on the matching Trek
  - `<expedition-slug>.jpg` — sets cover_image_id + feature_image_id on the matching Expedition
  - **Any other image**  — attached as gallery to every Trek + Expedition in the region

## Top-level folders

  - `tours/<tour-slug>.jpg`         — Tour cover + feature
  - `settings/<setting-name>.jpg`   — page hero / parallax / about-us cover (see settings/_filenames.txt)

## Rules

  - Folder names are case-insensitive, matched loosely (`langtang/` matches "Langtang, Gosainkunda").
  - Filenames are slugified before matching (`Everest Base Camp.jpg` and
    `EVEREST_BASE_CAMP.jpg` both work as `everest-base-camp.jpg`).
  - Re-running the importer over an already-imported file is a no-op:
    the Media row's `source_hash` recognises the same bytes.
