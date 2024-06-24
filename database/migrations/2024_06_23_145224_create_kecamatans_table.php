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
        Schema::create('kecamatans', function (Blueprint $table) {
            $table->id('id_kecamatan');
            $table->unsignedBigInteger('kabupaten_id');
            $table->string('name');
            $table->timestamps();
            $table->foreign('kabupaten_id')->references('id_kabupaten')->on('kabupatens')->onDelete('cascade');
        });
    }
    // migrate 1 migration ex
    // php artisan migrate --path=database/migration/2024_06_23_145224_create_kecamatans_table.php

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kecamatans');
    }
};
