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
        Schema::create('level_pt_unit', function (Blueprint $table) {
            $table->id('pk_id_level_pt_unit');
            $table->string('kode_level_pt_unit');
            $table->string('nama_level_pt_unit');
            $table->integer('induk_level_pt_unit');
            $table->enum('jenis_level_pt_unit', ['pt', 'upps', 'ps', 'non_upps_ps']);
            $table->enum('aktif', ['y', 't']);
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
        Schema::dropIfExists('level_pt_unit');
    }
};
