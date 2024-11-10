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
        Schema::create('content_alur_penyerahans', function (Blueprint $table) {
            $table->id('id_alur_penyerahan');
            $table->string('title_alur_penyerahan_santri');
            $table->string('sub_title_alur_penyerahan_santri');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('content_alur_penyerahans');
    }
};
