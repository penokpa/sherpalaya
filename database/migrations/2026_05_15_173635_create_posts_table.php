<?php

use App\Helpers\CuratorMigrationHelper;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->longText('title');     // translatable JSON
            $table->longText('excerpt');   // translatable JSON
            $table->longText('body');      // translatable JSON
            $table->boolean('is_featured')->default(false);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();

            $table->index('published_at');
        });

        CuratorMigrationHelper::migrateMediaField('posts', 'cover_image_id');
    }

    public function down(): void
    {
        CuratorMigrationHelper::rollbackMediaField('posts', 'cover_image_id');
        Schema::dropIfExists('posts');
    }
};
