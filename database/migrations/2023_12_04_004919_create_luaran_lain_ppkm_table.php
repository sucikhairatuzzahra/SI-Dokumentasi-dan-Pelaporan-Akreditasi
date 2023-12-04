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
        Schema::create('luaran_lain_ppkm', function (Blueprint $table) {
            $table->id();
            $table->year('tahun');
            $table->foreignId('id_ppkm')->constrained('ppkm')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('id_jenis_luaran_lain')->constrained('jenis_luaran_lain')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('judul_luaran_lain');
            $table->string('keterangan');
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
        Schema::dropIfExists('luaran_lain_ppkm');
    }
};
