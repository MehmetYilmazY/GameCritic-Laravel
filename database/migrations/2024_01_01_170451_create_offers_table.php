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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('car_request_id')->constrained('cars'); // "cars" tablosuna referans
            $table->string('teklif_baslik'); // Doğru sütunun eklenmiş olduğundan emin olun
            $table->text('genel_bilgiler');
            $table->decimal('fiyat', 8, 2);
            $table->text('doviz');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
