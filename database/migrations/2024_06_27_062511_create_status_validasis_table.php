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
        Schema::create('status_validasis', function (Blueprint $table) {
            $table->id('id_status_validasi');
            $table->unsignedBigInteger('user_id');
            $table->string('nama_status_validasi');
            $table->timestamps();
            $table->foreign('user_id')->references('id_user')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status_validasis');
    }
};
