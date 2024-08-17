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
        Schema::create('clustering', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idTanaman');
            $table->integer('jumlahKlaster');
            $table->integer('nilaiBobot');
            $table->integer('maxIterasi');
            $table->timestamps();

            $table->foreign('idTanaman')->references('id')->on('tanaman')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clustering');
    }
};
