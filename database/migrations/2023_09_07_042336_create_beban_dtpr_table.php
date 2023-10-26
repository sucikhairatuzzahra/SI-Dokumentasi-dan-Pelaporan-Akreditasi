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
        Schema::create('beban_dtpr', function (Blueprint $table) {
            $table->id();
            $table->string('nama_dosen');
            $table->integer('pgjrn_ps_sendiri');
            $table->integer('pgjrn_ps_lain_pt_sendiri');
            $table->integer('pgjrn_pt_lain');
            $table->integer('sks_penelitian');
            $table->integer('sks_pengabdian');
            $table->integer('manajemen_pt_sendiri');
            $table->integer('manajemen_pt_lain');
            $table->unsignedBigInteger('id_pt_unit');
            $table->foreign('id_pt_unit')->references('pk_id_pt_unit')->on('pt_unit')->onDelete('restrict');
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
        Schema::dropIfExists('beban_dtpr');
    }
};
