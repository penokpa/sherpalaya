<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('media', function (Blueprint $table) {
            if (! Schema::hasColumn('media', 'hash')) {
                $table->string('hash', 64)->nullable()->after('size');
                $table->index('hash');
            }
        });

        // Backfill SHA-256 for files that exist on disk. DB::table updates so the
        // MediaObserver doesn't see this as a Media save (it would otherwise try to
        // re-organise the file on every backfilled row — see feedback memo).
        DB::table('media')->orderBy('id')->each(function ($row) {
            try {
                $disk = Storage::disk($row->disk);
                if (! $disk->exists($row->path)) {
                    return;
                }
                $hash = hash_file('sha256', $disk->path($row->path));
                if ($hash) {
                    DB::table('media')->where('id', $row->id)->update(['hash' => $hash]);
                }
            } catch (\Throwable $e) {
                // Skip unreadable files — they'll be flagged by media:orphans or media:dedupe.
            }
        });
    }

    public function down(): void
    {
        Schema::table('media', function (Blueprint $table) {
            if (Schema::hasColumn('media', 'hash')) {
                $table->dropIndex(['hash']);
                $table->dropColumn('hash');
            }
        });
    }
};
