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
        Schema::create('cln_mhsbaru', function (Blueprint $table) {
            $table->id();
            $table->integer('thn_akademik');
            $table->string('pt_unit');
            // $table->foreign('id_pt_unit')->references('pk_id_pt_unit')->on('pt_unit')->onDelete('restrict');
            $table->integer('daya_tampung');
            $table->integer('pendaftar');
            $table->integer('lulus_seleksi');
            $table->integer('maba_reguler');
            $table->integer('maba_transfer');
            $table->integer('mhs_aktif_reguler');
            $table->integer('mhs_aktif_transfer');
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
        Schema::dropIfExists('cln_mhsbaru');
    }
};
