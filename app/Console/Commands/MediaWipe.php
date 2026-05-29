<?php

namespace App\Console\Commands;

use App\Models\Media;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

/**
 * Nukes every Media row + file plus every reference to media throughout
 * the system. Intended for a clean-slate reupload, not routine use.
 *
 * Order of operations:
 *   1. Null every cover_image_id / feature_image_id on Trek / Expedition /
 *      Tour / Post / Category / Region / Service.
 *   2. Null every Spatie Settings row whose name contains image_id.
 *   3. Truncate every Media pivot table.
 *   4. Delete every Media row (Eloquent delete fires Curator's file-cleanup
 *      observer, removing files from disk too).
 *
 * Dry-run by default. --commit applies. Requires typed-yes confirmation.
 */
class MediaWipe extends Command
{
    protected $signature = 'media:wipe
        {--commit : Actually wipe. Default is dry-run.}';

    protected $description = 'Delete every Media row + file and clear every reference to media. Destructive.';

    private const FK_REFERENCES = [
        ['table' => 'treks', 'column' => 'cover_image_id'],
        ['table' => 'treks', 'column' => 'feature_image_id'],
        ['table' => 'expeditions', 'column' => 'cover_image_id'],
        ['table' => 'expeditions', 'column' => 'feature_image_id'],
        ['table' => 'tours', 'column' => 'cover_image_id'],
        ['table' => 'tours', 'column' => 'feature_image_id'],
        ['table' => 'posts', 'column' => 'cover_image_id'],
        ['table' => 'categories', 'column' => 'cover_image_id'],
        ['table' => 'regions', 'column' => 'cover_image_id'],
        ['table' => 'services', 'column' => 'cover_image_id'],
    ];

    private const PIVOT_TABLES = [
        'media_trek',
        'media_tour',
        'expedition_media',
        'destination_media',
        'awards_and_certificates_media',
        'media_service',
    ];

    public function handle(): int
    {
        $commit = (bool) $this->option('commit');

        // Inventory
        $totalMedia = Media::count();
        $totalBytes = (int) Media::sum('size');
        $fkRefs = 0;
        foreach (self::FK_REFERENCES as $ref) {
            if (\Schema::hasTable($ref['table']) && \Schema::hasColumn($ref['table'], $ref['column'])) {
                $fkRefs += DB::table($ref['table'])->whereNotNull($ref['column'])->count();
            }
        }
        $pivotRows = 0;
        foreach (self::PIVOT_TABLES as $pivot) {
            if (\Schema::hasTable($pivot)) {
                $pivotRows += DB::table($pivot)->count();
            }
        }
        $settingsRefs = \Schema::hasTable('settings')
            ? DB::table('settings')->where('name', 'LIKE', '%image_id%')->count()
            : 0;

        $this->newLine();
        $this->warn('=== MEDIA WIPE PLAN ===');
        $this->line('  Media rows to delete:           ' . $totalMedia . ' (' . number_format($totalBytes / 1024 / 1024, 1) . ' MB)');
        $this->line('  FK refs to null (cover/feature): ' . $fkRefs);
        $this->line('  Pivot rows to delete:            ' . $pivotRows);
        $this->line('  Settings image-id rows to null:  ' . $settingsRefs);
        $this->newLine();

        if (! $commit) {
            $this->comment('Dry-run. Re-run with --commit to apply.');
            return self::SUCCESS;
        }

        if (! $this->confirm('This will delete EVERY image in the library and clear every reference. Continue?', false)) {
            $this->warn('Aborted.');
            return self::SUCCESS;
        }
        if ($this->ask('Type "WIPE" to confirm') !== 'WIPE') {
            $this->warn('Confirmation phrase did not match. Aborted.');
            return self::SUCCESS;
        }

        DB::transaction(function () {
            foreach (self::FK_REFERENCES as $ref) {
                if (\Schema::hasTable($ref['table']) && \Schema::hasColumn($ref['table'], $ref['column'])) {
                    DB::table($ref['table'])->whereNotNull($ref['column'])->update([$ref['column'] => null]);
                }
            }
            if (\Schema::hasTable('settings')) {
                DB::table('settings')->where('name', 'LIKE', '%image_id%')->update(['payload' => 'null']);
            }
            foreach (self::PIVOT_TABLES as $pivot) {
                if (\Schema::hasTable($pivot)) {
                    DB::table($pivot)->delete();
                }
            }
        });

        // Delete Media one at a time so Curator's file-cleanup observer fires
        // for each row — that removes the file from disk + empty directories.
        $deleted = 0;
        Media::query()->orderBy('id')->chunkById(50, function ($chunk) use (&$deleted) {
            foreach ($chunk as $m) {
                $m->delete();
                $deleted++;
            }
        });

        $this->newLine();
        $this->info('✓ Wiped. ' . $deleted . ' Media rows + files deleted, ' . $fkRefs . ' FK refs nulled, ' . $pivotRows . ' pivot rows removed, ' . $settingsRefs . ' settings cleared.');

        return self::SUCCESS;
    }
}
