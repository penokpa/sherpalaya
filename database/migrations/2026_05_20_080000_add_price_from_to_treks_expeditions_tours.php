<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        foreach (['treks', 'expeditions', 'tours'] as $table) {
            Schema::table($table, function (Blueprint $t) use ($table) {
                if (! Schema::hasColumn($table, 'price_from')) {
                    $t->decimal('price_from', 10, 2)->nullable()->after('published_at');
                    $t->index('price_from');
                }
            });
        }
    }

    public function down(): void
    {
        foreach (['treks', 'expeditions', 'tours'] as $table) {
            Schema::table($table, function (Blueprint $t) use ($table) {
                if (Schema::hasColumn($table, 'price_from')) {
                    $t->dropIndex([$table . '_price_from_index']);
                    $t->dropColumn('price_from');
                }
            });
        }
    }
};
