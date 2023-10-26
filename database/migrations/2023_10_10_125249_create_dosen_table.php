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
            $table->id('pk_id_dosen');
            $table->string('nama_dosen');
            $table->string('nomor_induk_dosen');
            $table->enum('jenis_nomor_induk_dosen', ['NIDN', 'NIDK']);
            $table->integer('id_level_pendidikan_tertinggi');
            $table->string('pendidikan_magister');
            $table->string('pendidikan_doktor');
            $table->string('bidang_keahlian');
            $table->string('jabatan_akademik');
            $table->string('sertifikat_pendidik_profesional');
            $table->string('sertifikat_kompetensi_profesi_industri');
            $table->string('id_pt_unit_dosen_tetap');
            $table->string('id_kategori_dosen');
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
        Schema::dropIfExists('dosen');
    }
};
