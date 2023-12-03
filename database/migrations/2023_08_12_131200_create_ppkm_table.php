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
        Schema::create('ppkm', function (Blueprint $table) {
            $table->id();
            $table->string('tahun');
            $table->string('judul');
            $table->enum('jenis_penelitian_pengabdian', ['penelitian', 'pengabdian']);
            $table->unsignedBigInteger('id_jenis_sumber_pembiayaan');
            $table->foreign('id_jenis_sumber_pembiayaan')->references('id')->on('jenis_sumber_pembiayaan');
            $table->string('sumber_pembiayaan');
            // $table->enum('kerjasama', ['y', 't']);
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
        Schema::dropIfExists('ppkm');
    }
};
