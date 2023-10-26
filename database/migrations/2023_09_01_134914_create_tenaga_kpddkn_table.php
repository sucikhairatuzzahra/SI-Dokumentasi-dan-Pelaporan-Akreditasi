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
            $table->string('jenis_tng_kpddkn');
            // $table->enum('jenjang_pendidikan', ['sma/smk', 'd1', 'd2', 'd3', 'd4', 's1', 's2', 's3']);
            $table->string('unit_kerja');
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
