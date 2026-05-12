<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->string('platform')->nullable()->after('description');
            $table->unsignedTinyInteger('rating')->nullable()->after('platform');
            $table->date('reviewed_at')->nullable()->after('rating');
            $table->string('review_url')->nullable()->after('reviewed_at');
        });
    }

    public function down(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropColumn(['platform', 'rating', 'reviewed_at', 'review_url']);
        });
    }
};
