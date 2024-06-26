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
        Schema::create('alamat_calon_santris', function (Blueprint $table) {
            $table->id('id_alamat');
            $table->string('dusun_santri');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('provinsi_id');
            $table->unsignedBigInteger('kabupaten_id');
            $table->unsignedBigInteger('kecamatan_id');
            $table->unsignedBigInteger('kelurahan_id');
            $table->timestamps();
            $table->foreign('user_id')->references('id_user')->on('users')->onDelete('cascade');
            $table->foreign('provinsi_id')->references('id_provinsi')->on('provinsis')->onDelete('cascade');
            $table->foreign('kabupaten_id')->references('id_kabupaten')->on('kabupatens')->onDelete('cascade');
            $table->foreign('kecamatan_id')->references('id_kecamatan')->on('kecamatans')->onDelete('cascade');
            $table->foreign('kelurahan_id')->references('id_kelurahan')->on('kelurahans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alamat_calon_santris');
    }
};
