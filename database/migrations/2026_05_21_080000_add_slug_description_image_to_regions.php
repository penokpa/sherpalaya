<?php

use App\Helpers\CuratorMigrationHelper;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('regions', function (Blueprint $t) {
            if (! Schema::hasColumn('regions', 'slug')) {
                $t->string('slug')->nullable()->unique()->after('name');
            }
            if (! Schema::hasColumn('regions', 'description')) {
                $t->text('description')->nullable()->after('slug');
            }
            if (! Schema::hasColumn('regions', 'sort_order')) {
                $t->unsignedInteger('sort_order')->default(999)->after('description');
            }
        });

        // Cover image — uses the existing Curator media column helper so the
        // image picker in admin works the same way as treks/expeditions/tours.
        if (! Schema::hasColumn('regions', 'cover_image_id')) {
            CuratorMigrationHelper::migrateMediaField('regions', 'cover_image_id');
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('regions', 'cover_image_id')) {
            CuratorMigrationHelper::rollbackMediaField('regions', 'cover_image_id');
        }
        Schema::table('regions', function (Blueprint $t) {
            foreach (['sort_order', 'description', 'slug'] as $col) {
                if (Schema::hasColumn('regions', $col)) {
                    $t->dropColumn($col);
                }
            }
        });
    }
};
