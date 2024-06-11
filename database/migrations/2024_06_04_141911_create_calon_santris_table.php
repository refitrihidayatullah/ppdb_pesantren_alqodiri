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
        Schema::create('calon_santris', function (Blueprint $table) {
            $table->id('id_santri');
            $table->unsignedBigInteger('user_id');
            $table->dateTime('tanggal_daftar');
            $table->string('nama_lengkap_santri');
            $table->string('tempat_lahir_santri');
            $table->date('tanggal_lahir_santri');
            $table->string('jenis_kelamin_santri');
            $table->timestamps();
            $table->foreign('user_id')->references('id_user')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calon_santris');
    }
};
