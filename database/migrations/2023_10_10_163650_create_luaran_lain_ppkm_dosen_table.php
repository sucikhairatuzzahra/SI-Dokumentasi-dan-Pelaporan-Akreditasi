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
        Schema::create('luaran_lain_ppkm_dosen', function (Blueprint $table) {
            $table->id('pk_luaran_lain_ppkm_dosen');
            $table->integer('id_luaran_lain_ppkm');
            $table->integer('id_dosen');
            $table->enum('utama', ['Y', 'T']);
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
        Schema::dropIfExists('luaran_lain_ppkm_dosen');
    }
};
