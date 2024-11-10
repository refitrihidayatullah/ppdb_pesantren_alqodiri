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
        Schema::create('content_webs', function (Blueprint $table) {
            $table->id('id_content');
            $table->string('title_web');
            $table->string('sub_title_web');
            $table->string('data_title_web');
            $table->date('dari_tahun_ajaran_web');
            $table->date('sampai_tahun_ajaran_web');
            $table->string('alamat_pondok');
            $table->string('email_pondok')->nullable();
            $table->string('no_telp_pondok')->nullable();
            $table->string('facebook_pondok')->nullable();
            $table->string('instagram_pondok')->nullable();
            $table->string('youtube_pondok')->nullable();
            $table->string('tiktok_pondok')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('content_webs');
    }
};
