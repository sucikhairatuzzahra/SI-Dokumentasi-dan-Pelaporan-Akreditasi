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
        Schema::create('masa_tunggu_lulusan', function (Blueprint $table) {
            $table->id();
            $table->year('tahun_lulus');
            $table->integer('jumlah_lulusan');
            $table->integer('lulusan_terlacak');
            $table->integer('waktu_tunggu');
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
        Schema::dropIfExists('masa_tunggu_lulusan');
    }
};
