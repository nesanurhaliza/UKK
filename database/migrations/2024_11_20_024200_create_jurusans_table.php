<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('jurusans', function (Blueprint $table) {
            $table->id(); // Auto Increment ID
            $table->string('nama_jurusan');
            $table->string('desc');
            $table->timestamps(); // Menyimpan waktu dibuat dan diperbarui
        });
    }

    public function down()
    {
        Schema::dropIfExists('jurusans');
    }
};
