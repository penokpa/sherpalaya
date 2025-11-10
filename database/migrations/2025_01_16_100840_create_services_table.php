<?php

use App\Helpers\CuratorMigrationHelper;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->longText('title');
            $table->longText('description');
            $table->longText('location');

            $table->timestamps();
        });
        CuratorMigrationHelper::migrateMediaField('services', 'cover_image_id');

        CuratorMigrationHelper::migratePivotTable('media_service', 'service_id');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        CuratorMigrationHelper::rollbackPivotTable('media_service');

        CuratorMigrationHelper::rollbackMediaField('services', 'cover_image_id');
        Schema::dropIfExists('services');
    }
};
