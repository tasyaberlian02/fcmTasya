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
        Schema::create('produksi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idTanaman');
            $table->string('namaKabKota');
            $table->integer('tahun1');
            $table->integer('tahun2');
            $table->integer('tahun3');
            $table->integer('tahun4');
            $table->integer('tahun5');
            $table->timestamps();

            $table->foreign('idTanaman')->references('id')->on('tanaman')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produksi');
    }
};