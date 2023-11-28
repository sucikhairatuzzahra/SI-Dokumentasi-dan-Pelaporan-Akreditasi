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
            $table->string('nama_dosen');
            $table->string('nomor_induk_dosen')->unique();
            $table->enum('jenis_nomor_induk_dosen', ['NIDN', 'NIDK']);
            $table->integer('id_level_pendidikan_tertinggi');
            $table->string('pendidikan_magister');
            $table->string('pendidikan_doktor')->nullable();
            $table->string('bidang_keahlian');
            $table->string('jabatan_akademik')->nullable();
            $table->integer('id_pegawai');
            $table->integer('id_pt_unit');
            $table->integer('id_kategori_dosen');
            // $table->string('sertifikat_pendidik_profesional')->nullable();
            // $table->string('sertifikat_kompetensi_profesi_industri')->nullable();
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
