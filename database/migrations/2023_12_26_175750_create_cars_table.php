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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('teslimEdilecek')->nullable();
            $table->string('kullaniciName')->nullable();
            $table->string('alisYeri')->nullable();
            $table->string('alisTarihi')->nullable();
            $table->string('alisSaati')->nullable();
            $table->string('teslimYeri')->nullable();
            $table->string('teslimTarihi')->nullable();
            $table->string('teslimSaati')->nullable();
            $table->string('firma')->nullable();
            $table->string('mailGonderilecekKisi')->nullable();
            $table->string('mailGonderilecekKisi2')->nullable();
            $table->string('aciklama')->nullable();
            $table->string('kvkkForm')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
