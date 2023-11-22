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
            $table->string('nomor_induk_dosen');
            $table->enum('jenis_nomor_induk_dosen', ['NIDN', 'NIDK']);
            $table->string('pendidikan_magister');
            $table->string('pendidikan_doktor')->nullable();
            $table->string('bidang_keahlian');
            $table->string('jabatan_akademik')->nullable();
            $table->string('sertifikat_pendidik_profesional')->nullable();
            $table->string('sertifikat_kompetensi_profesi_industri')->nullable();
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
