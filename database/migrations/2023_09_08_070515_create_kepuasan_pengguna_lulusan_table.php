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
        Schema::create('kepuasan_pengguna_lulusan', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_kemampuan');
            $table->double('sangat_baik');
            $table->double('baik');
            $table->double('cukup');
            $table->double('kurang');
            $table->string('rencana_tindak_lanjut');
            $table->foreignId('id_pt_unit')->constrained('pt_unit')->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('kepuasan_pengguna_lulusan');
    }
};
