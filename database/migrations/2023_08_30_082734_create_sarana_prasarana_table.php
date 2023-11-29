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
            $table->integer('id_pt_unit');
            $table->string('kode_pt_unit');
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
