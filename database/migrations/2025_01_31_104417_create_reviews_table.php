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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title');
            $table->longText('description');
            $table->boolean('display_in_home_page')
                ->default(true);
            $table->timestamps();
        });
        CuratorMigrationHelper::migrateMediaField('reviews', 'image_id');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        CuratorMigrationHelper::rollbackMediaField('reviews', 'image_id');
        Schema::dropIfExists('reviews');
    }
};
