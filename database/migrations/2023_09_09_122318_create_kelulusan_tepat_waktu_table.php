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
            $table->year('tahun_masuk');
            $table->integer('jml_mhs');
            $table->year('tahun_lulus');
            $table->integer('wisuda_ke');
            $table->integer('jml_lulusan');
            $table->string('masa_studi');
            $table->integer('id_pt_unit');
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
