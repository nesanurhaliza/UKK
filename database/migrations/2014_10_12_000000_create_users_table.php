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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phonenumber');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('as', ['admin', 'assessor', 'student']);
            $table->boolean('active')->default(1);
            $table->string('foto')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('admin_access')->default(false)->after('active'); // kolom akses admin
            $table->string('assessment_qualification')->nullable()->after('active'); // kolom kualifikasi assessor
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
