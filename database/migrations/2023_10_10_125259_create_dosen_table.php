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
        Schema::create('dosen', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_induk_dosen')->unique();
            $table->enum('jenis_nomor_induk_dosen', ['NIDN', 'NIDK']);
            $table->unsignedBigInteger('id_level_pendidikan_tertinggi');
            $table->foreign('id_level_pendidikan_tertinggi')->references('id')->on('level_pendidikan_tertinggi');
            $table->string('pendidikan_magister');
            $table->string('pendidikan_doktor')->nullable();
            $table->string('bidang_keahlian');
            $table->string('jabatan_akademik')->nullable();
            $table->unsignedBigInteger('id_pegawai');
            $table->foreign('id_pegawai')->references('id')->on('pegawai');
            $table->unsignedBigInteger('id_pt_unit');
            $table->foreign('id_pt_unit')->references('id')->on('pt_unit');
            $table->unsignedBigInteger('id_kategori_dosen');
            $table->foreign('id_kategori_dosen')->references('id')->on('kategori_dosen');
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
        Schema::dropIfExists('dosen');
    }
};
