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
        Schema::create('pendanaan', function (Blueprint $table) {
            $table->id();
            $table->string('sumber_dana');
            $table->string('jumlah');
            $table->string('bukti')->nullable();
            $table->string('keterangan');
<<<<<<< HEAD
            $table->integer('id_pt_unit');
            $table->string('kode_pt_unit');
=======
            $table->unsignedBigInteger('id_pt_unit');
            $table->foreign('id_pt_unit')->references('id')->on('pt_unit');
>>>>>>> origin/prefered_dev
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
        Schema::dropIfExists('pendanaan');
    }
};
