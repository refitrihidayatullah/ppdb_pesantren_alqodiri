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
        Schema::create('content_alur_pendaftarans', function (Blueprint $table) {
            $table->id('id_alur_pendaftaran');
            $table->string('title_alur_pendaftaran_online');
            $table->string('sub_title_alur_pendaftaran_online');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('content_alur_pendaftarans');
    }
};
