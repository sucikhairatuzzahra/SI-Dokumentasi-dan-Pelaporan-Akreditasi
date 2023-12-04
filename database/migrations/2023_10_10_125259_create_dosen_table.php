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
            $table->foreignId('id_level_pendidikan_tertinggi')->constrained('level_pendidikan_tertinggi')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('pendidikan_magister');
            $table->string('pendidikan_doktor')->nullable();
            $table->string('bidang_keahlian');
            $table->string('jabatan_akademik')->nullable();
            $table->foreignId('id_pegawai')->constrained('pegawai')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('id_pt_unit')->constrained('pt_unit')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('id_kategori_dosen')->constrained('kategori_dosen')->cascadeOnUpdate()->cascadeOnDelete();
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
