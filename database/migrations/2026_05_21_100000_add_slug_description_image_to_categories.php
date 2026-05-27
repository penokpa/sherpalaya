<?php

use App\Helpers\CuratorMigrationHelper;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('categories', function (Blueprint $t) {
            if (! Schema::hasColumn('categories', 'slug')) {
                $t->string('slug')->nullable()->after('name');
            }
            if (! Schema::hasColumn('categories', 'description')) {
                $t->text('description')->nullable()->after('slug');
            }
            if (! Schema::hasColumn('categories', 'sort_order')) {
                $t->unsignedInteger('sort_order')->default(999)->after('description');
            }
        });

        if (! Schema::hasColumn('categories', 'cover_image_id')) {
            CuratorMigrationHelper::migrateMediaField('categories', 'cover_image_id');
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('categories', 'cover_image_id')) {
            CuratorMigrationHelper::rollbackMediaField('categories', 'cover_image_id');
        }
        Schema::table('categories', function (Blueprint $t) {
            foreach (['sort_order', 'description', 'slug'] as $col) {
                if (Schema::hasColumn('categories', $col)) {
                    $t->dropColumn($col);
                }
            }
        });
    }
};
