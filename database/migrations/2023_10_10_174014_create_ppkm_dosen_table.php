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
        Schema::create('ppkm_dosen', function (Blueprint $table) {
            $table->id('pk_id_ppkm_dosen');
            $table->integer('id_luaran_ppkm');
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
        Schema::dropIfExists('ppkm_dosen');
    }
};
