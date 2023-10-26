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
            $table->id('pk_id_luaran_lain_ppkm');
            $table->string('tahun');
            $table->integer('id_ppkm');
            $table->integer('id_jenis_luaran_lain');
            $table->text('judul_luaran_lain');
            $table->string('keterangan');
            $table->integer('jumlah_sitasi');
            $table->integer('kriteria');
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
