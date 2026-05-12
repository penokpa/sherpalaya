<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('destination_trek', function (Blueprint $table) {
            $table->id();
            $table->foreignId('destination_id');
            $table->foreignId('trek_id');
            $table->unsignedBigInteger('order')
                ->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destination_trek');
    }
};
