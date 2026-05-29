<?php

namespace App\Console\Commands;

use App\Models\Media;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

/**
 * Find Media records that nothing references (orphans), and pivot rows that
 * reference Media that no longer exists (dangling). Print as a table, with
 * --commit to delete.
 *
 * Orphan deletes use Media::delete() so Curator file-cleanup observers fire.
 * Dangling-pivot deletes use DB::table — they're just bookkeeping rows.
 */
class MediaOrphans extends Command
{
    protected $signature = 'media:orphans
        {--commit : Apply deletions. Default is a report only.}
        {--orphans-only : Skip the dangling-pivot scan.}
        {--dangling-only : Skip the orphan scan.}';

    protected $description = 'Report (and optionally delete) Media records referenced by nothing, plus pivot rows pointing at deleted Media';

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
        $skipOrphans = (bool) $this->option('dangling-only');
        $skipDangling = (bool) $this->option('orphans-only');

        $totalDeletedMedia = 0;
        $totalFreedBytes = 0;
        $totalDeletedPivots = 0;

        if (! $skipOrphans) {
            $referenced = $this->collectReferencedIds();
            $orphans = Media::whereNotIn('id', $referenced ?: [0])->get(['id', 'name', 'path', 'size', 'created_at']);

            $this->line('');
            $this->info('Orphaned Media (referenced by nothing): ' . $orphans->count());
            if ($orphans->isNotEmpty()) {
                $this->table(
                    ['id', 'name', 'path', 'size', 'created_at'],
                    $orphans->map(fn ($m) => [
                        $m->id,
                        \Str::limit($m->name, 50),
                        \Str::limit($m->path, 50),
                        number_format((int) $m->size),
                        $m->created_at,
                    ])->all()
                );

                if ($commit) {
                    if (! $this->confirm('Delete these ' . $orphans->count() . ' orphan Media records (rows + files)?')) {
                        $this->warn('Aborted orphan delete.');
                    } else {
                        foreach ($orphans as $m) {
                            $totalFreedBytes += (int) $m->size;
                            Media::find($m->id)?->delete();
                            $totalDeletedMedia++;
                        }
                        $this->info("Deleted {$totalDeletedMedia} orphan Media (" . number_format($totalFreedBytes / 1024 / 1024, 2) . ' MB).');
                    }
                }
            }
        }

        if (! $skipDangling) {
            $existingIds = Media::pluck('id')->all();
            $existingSet = array_flip($existingIds);
            $danglingByTable = [];

            foreach (self::PIVOT_TABLES as $pivot) {
                if (! \Schema::hasTable($pivot)) {
                    continue;
                }
                $rows = DB::table($pivot)->get();
                $bad = $rows->filter(fn ($r) => ! isset($existingSet[(int) $r->media_id]));
                if ($bad->isNotEmpty()) {
                    $danglingByTable[$pivot] = $bad;
                }
            }

            $totalDangling = collect($danglingByTable)->sum(fn ($rows) => $rows->count());
            $this->line('');
            $this->info("Dangling pivot rows (point at deleted Media): {$totalDangling}");
            foreach ($danglingByTable as $tbl => $bad) {
                $missingIds = $bad->pluck('media_id')->unique()->sort()->values()->all();
                $this->line('  ' . $tbl . ': ' . $bad->count() . ' rows, ' . count($missingIds) . ' missing media IDs (' . implode(',', array_slice($missingIds, 0, 10)) . (count($missingIds) > 10 ? ',…' : '') . ')');
            }

            if ($commit && $totalDangling > 0) {
                if (! $this->confirm("Delete these {$totalDangling} dangling pivot rows?")) {
                    $this->warn('Aborted pivot delete.');
                } else {
                    foreach ($danglingByTable as $tbl => $bad) {
                        DB::table($tbl)->whereIn('id', $bad->pluck('id'))->delete();
                        $totalDeletedPivots += $bad->count();
                    }
                    $this->info("Deleted {$totalDeletedPivots} dangling pivot rows.");
                }
            }
        }

        $this->newLine();
        if (! $commit) {
            $this->comment('Report only — re-run with --commit to delete.');
        } else {
            $this->info("Done. {$totalDeletedMedia} Media (" . number_format($totalFreedBytes / 1024 / 1024, 2) . " MB), {$totalDeletedPivots} pivot rows removed.");
        }

        return self::SUCCESS;
    }

    /** Set of Media ids referenced by any FK column, pivot row, or settings entry. */
    private function collectReferencedIds(): array
    {
        $ids = [];
        foreach (self::FK_REFERENCES as $ref) {
            if (! \Schema::hasTable($ref['table']) || ! \Schema::hasColumn($ref['table'], $ref['column'])) {
                continue;
            }
            $ids = array_merge($ids, DB::table($ref['table'])->whereNotNull($ref['column'])->pluck($ref['column'])->all());
        }
        foreach (self::PIVOT_TABLES as $pivot) {
            if (! \Schema::hasTable($pivot)) {
                continue;
            }
            $ids = array_merge($ids, DB::table($pivot)->pluck('media_id')->all());
        }
        // Spatie Settings: any row whose name contains "image_id" stores a Media id
        // in payload as a JSON-encoded int (e.g. "94" or 94).
        if (\Schema::hasTable('settings')) {
            $rows = DB::table('settings')->where('name', 'LIKE', '%image_id%')->pluck('payload');
            foreach ($rows as $payload) {
                $decoded = json_decode($payload, true);
                if (is_numeric($decoded)) {
                    $ids[] = (int) $decoded;
                }
            }
        }
        return array_values(array_unique(array_map('intval', $ids)));
    }
}
