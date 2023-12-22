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
        Schema::create('oyunlar', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('about');
            $table->float('metacritic_rate')->nullable();
            $table->float('user_rate')->nullable();
            // Diğer özellikler için sütunları ekleyebilirsiniz
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
