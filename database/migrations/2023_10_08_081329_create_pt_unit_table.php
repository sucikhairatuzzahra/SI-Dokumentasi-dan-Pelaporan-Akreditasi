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
        Schema::create('pt_unit', function (Blueprint $table) {
            $table->id('pk_id_pt_unit');
            $table->string('kode_pt_unit');
            $table->string('nama_pt_unit');
            $table->integer('induk_pt_unit');
            $table->unsignedBigInteger('id_level_pt_unit');
            $table->foreign('id_level_pt_unit')->references('pk_id_level_pt_unit')->on('level_pt_unit')->onDelete('restrict');
            $table->unsignedBigInteger('id_jenjang_program');
            $table->foreign('id_jenjang_program')->references('pk_id_jenjang_program')->on('jenjang_program')->onDelete('restrict');
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
        Schema::dropIfExists('pt_unit');
    }
};
