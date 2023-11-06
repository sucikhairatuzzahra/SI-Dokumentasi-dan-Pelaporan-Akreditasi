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
        Schema::create('kelulusan_tepat_waktu', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun_masuk');
            $table->unsignedBigInteger('id_pt_unit');
            $table->foreign('id_pt_unit')->references('pk_id_pt_unit')->on('pt_unit')->onDelete('restrict');
            $table->integer('jml_mhs');
            $table->integer('jml_lulusan');
            $table->string('masa_studi');
            $table->integer('jml_mhs_aktif');
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
        Schema::dropIfExists('kelulusan_tepat_waktu');
    }
};
