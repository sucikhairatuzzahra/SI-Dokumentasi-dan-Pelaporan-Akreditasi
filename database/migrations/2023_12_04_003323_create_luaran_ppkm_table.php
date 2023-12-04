<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('luaran_ppkm', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_ppkm')->constrained('ppkm')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('judul_luaran_ppkm');
            $table->foreignId('id_jenis_luaran')->constrained('jenis_luaran')->cascadeOnUpdate()->cascadeOnDelete();
            $table->year('tahun');
            $table->integer('jumlah_sitasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('luaran_ppkm');
    }
};
