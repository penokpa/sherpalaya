<?php

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
        Schema::create('expedition_our_sherpa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('our_sherpa_id');
            $table->foreignId('expedition_id');
            $table->unsignedBigInteger('order')
                ->default(0);
            $table->unsignedBigInteger('count');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expedition_our_sherpa');
    }
};
