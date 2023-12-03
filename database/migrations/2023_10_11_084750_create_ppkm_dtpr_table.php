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
            $table->unsignedBigInteger('id_dosen');
            $table->foreign('id_dosen')->references('id')->on('dosen');
            $table->unsignedBigInteger('id_ppkm');
            $table->foreign('id_ppkm')->references('id')->on('ppkm');
            $table->enum('ketua',['ya','tidak']);
            $table->unsignedBigInteger('id_pt_unit');
            $table->foreign('id_pt_unit')->references('id')->on('pt_unit');
            $table->timestamps();
             // $table->unsignedBigInteger('id_luaran');
            // $table->foreign('id_luaran')->references('id')->on('jenis_luaran');
            // $table->string('judul_luaran');
            // $table->unsignedBigInteger('id_luaran_lain');
            // $table->foreign('id_luaran_lain')->references('id')->on('jenis_luaran_lain');
            // $table->string('judul_luaran_lain');
            // $table->string('bukti')->nullable();
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
