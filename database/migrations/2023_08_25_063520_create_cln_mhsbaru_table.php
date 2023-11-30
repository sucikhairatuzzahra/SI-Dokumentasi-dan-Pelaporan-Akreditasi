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
<<<<<<< HEAD
            $table->integer('thn_akademik');
            $table->integer('id_pt_unit');
            $table->string('kode_pt_unit');
=======
            $table->unsignedBigInteger('id_thn_akademik');
            $table->foreign('id_thn_akademik')->references('id')->on('tahun_akademik');
            $table->unsignedBigInteger('id_pt_unit');
            $table->foreign('id_pt_unit')->references('id')->on('pt_unit');
>>>>>>> origin/prefered_dev
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
