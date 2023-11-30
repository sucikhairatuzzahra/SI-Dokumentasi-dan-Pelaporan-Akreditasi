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
        Schema::create('ppkm_dtpr', function (Blueprint $table) {
            $table->id();
            $table->string('nama_dtpr');
            $table->enum('jenis_penelitian_pengabdian', ['penelitian', 'pengabdian']);
            $table->string('judul');
            $table->enum('ketua',['ya','tidak']);
<<<<<<< HEAD
            $table->string('jenis_luaran');
            $table->string('jenis_luaran_lain');
            $table->string('tahun');
            $table->string('dana');
            $table->string('bukti')->nullable();
            $table->integer('id_pt_unit');
            $table->string('kode_pt_unit');
=======
            $table->unsignedBigInteger('id_luaran');
            $table->foreign('id_luaran')->references('id')->on('jenis_luaran');
            $table->unsignedBigInteger('id_luaran_lain');
            $table->foreign('id_luaran_lain')->references('id')->on('jenis_luaran_lain');
            $table->string('tahun');
            $table->string('dana');
            $table->string('bukti')->nullable();
            $table->unsignedBigInteger('id_pt_unit');
            $table->foreign('id_pt_unit')->references('id')->on('pt_unit');
>>>>>>> origin/prefered_dev
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
        Schema::dropIfExists('ppkm_dtpr');
    }
};
