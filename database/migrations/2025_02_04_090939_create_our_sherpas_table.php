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
        Schema::create('our_sherpas', function (Blueprint $table) {
            $table->id();
            $table->string('name')
                    ->required();
            $table->string('title')
                    ->required();
            $table->longText('language');
            $table->longText('experience');
            $table->longText('description');
            $table->timestamps();
        });
        CuratorMigrationHelper::migrateMediaField('our_sherpas', 'profile_picture_id');

        CuratorMigrationHelper::migratePivotTable('awards_and_certificates_media', 'our_sherpa_id');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        CuratorMigrationHelper::rollbackPivotTable('awards_and_certificates_media');

        CuratorMigrationHelper::rollbackMediaField('our_sherpas', 'profile_picture_id');
        Schema::dropIfExists('our_sherpas');
    }
};
