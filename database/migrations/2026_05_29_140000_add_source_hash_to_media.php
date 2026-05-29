<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('media', function (Blueprint $table) {
            if (! Schema::hasColumn('media', 'source_hash')) {
                $table->string('source_hash', 64)->nullable()->after('hash');
                $table->index('source_hash');
            }
        });
        // No backfill — for existing records we don't know the pre-optimization
        // source hash. Seeders re-import will populate it from now on, and the
        // first re-import of a source file just adopts the existing Media row.
    }

    public function down(): void
    {
        Schema::table('media', function (Blueprint $table) {
            if (Schema::hasColumn('media', 'source_hash')) {
                $table->dropIndex(['source_hash']);
                $table->dropColumn('source_hash');
            }
        });
    }
};
