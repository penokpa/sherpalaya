<?php

use App\Helpers\CuratorMigrationHelper;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('treks', function (Blueprint $table) {
            $table->id();
            $table->longText('title');
            // $table->string('cover_image')
            //     ->required();
            $table->longText('description');
            $table->string('duration')
                ->required();
            $table->string('grade')
                ->nullable()
                ->default(null);
            $table->foreignId('category_id')
                ->nullable()
                ->default(null);
            $table->foreignId('region_id');
            $table->boolean('is_featured');
            $table->string('starting_point')
                ->required();
            $table->string('ending_point')
                ->required();
            $table->longText('best_time_for_trek');
            $table->unsignedSmallInteger('starting_altitude')
                ->required();
            $table->unsignedSmallInteger('highest_altitude')
                ->required();
            $table->string('trek_difficulty')
                ->nullable()
                ->default(null);
            $table->longText('costs_include');
            $table->longText('costs_exclude');
            $table->timestamps();
        });

        CuratorMigrationHelper::migrateMediaField('treks', 'cover_image_id');
        CuratorMigrationHelper::migrateMediaField('treks', 'feature_image_id');

        CuratorMigrationHelper::migratePivotTable('media_trek', 'trek_id');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        CuratorMigrationHelper::rollbackPivotTable('media_trek');

        CuratorMigrationHelper::rollbackMediaField('treks', 'feature_image_id');
        CuratorMigrationHelper::rollbackMediaField('treks', 'cover_image_id');
        Schema::dropIfExists('treks');
    }
};
