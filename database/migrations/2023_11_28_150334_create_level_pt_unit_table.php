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
            $table->id();
            $table->string('kode_level_pt_unit');
            $table->string('nama_level_pt_unit');
            $table->integer('induk_level_pt_unit');
            $table->string('jenis_level_pt_unit');
            $table->enum('aktif',['y','t']);
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
