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
        Schema::create('jenjang_program', function (Blueprint $table) {
            $table->id('pk_id_jenjang_program');
            $table->string('kode_jenjang_program');
            $table->string('nama_jenjang_program');
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
        Schema::dropIfExists('jenjang_program');
    }
};
