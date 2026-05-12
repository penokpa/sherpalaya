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
        Schema::create('destinations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('region_id');
            $table->longText('description');
            $table->longText('location');
            $table->timestamps();
        });
        CuratorMigrationHelper::migratePivotTable('destination_media', 'destination_id');

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        CuratorMigrationHelper::rollbackPivotTable('destination_media');

        Schema::dropIfExists('destinations');
    }
};
