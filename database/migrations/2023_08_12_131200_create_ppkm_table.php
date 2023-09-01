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
        Schema::create('ppkm', function (Blueprint $table) {
            $table->id('pk_id_ppkm');
            $table->string('tahun');
            $table->string('judul');
            $table->enum('jenis_penelitian_pengabdian', ['penelitian', 'pengabdian']);
            $table->enum('id_jenis_sumber_pembiayaan', ['1', '2', '3', '4']);
            $table->enum('sumber_pembiayaan', ['mandiri', 'perguruan_tinggi', 'lmbg_dlm_negri', 'lmbg_luar_negri']);
            $table->enum('kerjasama', ['y', 't']);
            $table->string('id_kriteria');
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
        Schema::dropIfExists('ppkm');
    }
};
