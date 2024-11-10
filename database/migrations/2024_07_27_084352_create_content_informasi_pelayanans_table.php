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
        Schema::create('content_informasi_pelayanans', function (Blueprint $table) {
            $table->id('id_informasi_pelayanan');
            $table->date('dari_tanggal_pembukaan_pendaftaran')->nullable();
            $table->date('sampai_tanggal_pembukaan_pendaftaran')->nullable();
            $table->string('layanan_putra')->nullable();
            $table->string('layanan_putri')->nullable();
            $table->date('dari_tanggal_verifikasi_berkas')->nullable();
            $table->date('sampai_tanggal_verifikasi_berkas')->nullable();
            $table->string('tempat_verifikasi_berkas')->nullable();
            $table->time('dari_pelayanan_waktu_pagi')->nullable();
            $table->time('sampai_pelayanan_waktu_pagi')->nullable();
            $table->time('dari_pelayanan_waktu_siang')->nullable();
            $table->time('sampai_pelayanan_waktu_siang')->nullable();
            $table->string('image_informasi_pelayanan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('content_informasi_pelayanans');
    }
};
