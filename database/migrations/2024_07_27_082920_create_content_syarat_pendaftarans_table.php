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
        Schema::create('content_syarat_pendaftarans', function (Blueprint $table) {
            $table->id('id_syarat_pendaftaran');
            $table->string('title_syarat_pendaftaran');
            $table->string('sub_title_syarat_pendaftaran');
            $table->string('image_syarat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('content_syarat_pendaftarans');
    }
};
