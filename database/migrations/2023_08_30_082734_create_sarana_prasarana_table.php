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
        Schema::create('sarana_prasarana', function (Blueprint $table) {
            $table->id();
            $table->string('sarana');
            $table->integer('daya_tampung');
            $table->integer('luas_ruang');
            $table->integer('jml_mhs');
            $table->string('jam_lyn');
            $table->text('perangkat');
            $table->unsignedBigInteger('id_pt_unit');
            $table->foreign('id_pt_unit')->references('pk_id_pt_unit')->on('pt_unit')->onDelete('restrict');
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
        Schema::dropIfExists('sarana_prasarana');
    }
};
