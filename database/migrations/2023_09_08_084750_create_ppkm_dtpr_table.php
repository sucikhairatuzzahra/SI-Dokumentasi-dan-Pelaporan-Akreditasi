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
        Schema::create('ppkm_dtpr', function (Blueprint $table) {
            $table->id();
            $table->string('nama_dtpr');
            $table->integer('publikasi_infokom');
            $table->integer('penelitian_infokom');
            $table->integer('penelitian_infokom_hki');
            $table->integer('pkm_infokom_adobsi');
            $table->integer('pkm_infokom_hki');
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
        Schema::dropIfExists('ppkm_dtpr');
    }
};
