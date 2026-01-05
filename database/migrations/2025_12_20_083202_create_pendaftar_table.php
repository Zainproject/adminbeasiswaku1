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
        Schema::create('pendaftar', function (Blueprint $table) {
            $table->id('id_user');
            $table->string('nama_lengkap');
            $table->date('tetala');
            $table->string('email');
            $table->string('password');
            $table->string('instansi');
            $table->text('alamat');
            $table->string('status');
            $table->string('surat')->nullable();
            $table->unsignedBigInteger('beasiswa_id')->nullable();
            $table->foreign('beasiswa_id')->references('id')->on('beasiswa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftar');
    }
};
