<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        foreach (['treks', 'expeditions', 'tours'] as $table) {
            Schema::table($table, function (Blueprint $t) use ($table) {
                if (! Schema::hasColumn($table, 'published_at')) {
                    $t->timestamp('published_at')->nullable()->after('updated_at');
                    $t->index('published_at');
                }
            });
        }

        // Existing records were already public — backfill published_at = now() so they stay visible.
        foreach (['treks', 'expeditions', 'tours'] as $table) {
            \Illuminate\Support\Facades\DB::table($table)
                ->whereNull('published_at')
                ->update(['published_at' => now()]);
        }
    }

    public function down(): void
    {
        foreach (['treks', 'expeditions', 'tours'] as $table) {
            Schema::table($table, function (Blueprint $t) use ($table) {
                if (Schema::hasColumn($table, 'published_at')) {
                    $t->dropIndex([$table . '_published_at_index']);
                    $t->dropColumn('published_at');
                }
            });
        }
    }
};
