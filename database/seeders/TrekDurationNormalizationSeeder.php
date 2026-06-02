<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Normalizes the trek `duration` column to bare integers (e.g. "14") instead
 * of the mixed bag of "14" and "14 days" that earlier seeders/imports left
 * behind. The Filament admin form already treats duration as numeric with
 * a ' days' visual suffix, and the public templates append ' days' at render
 * time — so the canonical storage format is the bare integer.
 *
 * Idempotent: only rows matching /^\s*\d+\s*days?\s*$/i are rewritten.
 * Once normalized they no longer match the pattern, so re-running is a no-op.
 */
class TrekDurationNormalizationSeeder extends Seeder
{
    public function run(): void
    {
        $rows = DB::table('treks')
            ->select('id', 'duration')
            ->whereNotNull('duration')
            ->get();

        foreach ($rows as $row) {
            if (preg_match('/^\s*(\d+)\s*days?\s*$/i', $row->duration, $m)) {
                DB::table('treks')
                    ->where('id', $row->id)
                    ->update(['duration' => $m[1], 'updated_at' => now()]);
            }
        }
    }
}
