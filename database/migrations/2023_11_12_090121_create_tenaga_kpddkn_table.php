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
        Schema::create('tenaga_kpddkn', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jenis_tenaga_kependidikan');
            $table->enum('jenjang_pendidikan', ['sma', 'd1', 'd2', 'd3', 'd4', 's1', 's2', 's3']);
            $table->string('unit_kerja');
            // $table->foreignId('id_pt_unit')->constrained('pt_unit')->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('tenaga_kpddkn');
    }
};
