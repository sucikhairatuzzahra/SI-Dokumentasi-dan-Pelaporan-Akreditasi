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
        Schema::create('jml_tng_kpddkn', function (Blueprint $table) {
            $table->unsignedBigInteger('tenaga_kependidikan_id');
            $table->foreign('tenaga_kependidikan_id')->references('id')->on('tenaga_kpddkn')->onDelete('restrict');
            $table->integer('sma');
            $table->integer('d1');
            $table->integer('d2');
            $table->integer('d3');
            $table->integer('d4');
            $table->integer('s1');
            $table->integer('s2');
            $table->integer('s3');
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
        Schema::dropIfExists('jml_tng_kpddkn');
    }
};
