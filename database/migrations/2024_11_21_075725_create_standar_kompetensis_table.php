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
        Schema::create('standar_kompetensi', function (Blueprint $table) {
            $table->id();
            $table->string('unit_code');
            $table->string('unit_title');
            $table->string('unit_deskripsi');
            $table->foreignId('jurusan_id')->constrained('jurusans')->onDelete('cascade'); // Relasi ke tabel jurusans
            $table->string('assessor_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('standar');
    }
};
