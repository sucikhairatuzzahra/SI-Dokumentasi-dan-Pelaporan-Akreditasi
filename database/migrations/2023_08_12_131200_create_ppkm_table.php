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
            $table->year('tahun');
            $table->string('judul');
            $table->foreignId('id_jenis_sumber_pembiayaan')->constrained('jenis_sumber_pembiayaan')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('sumber_pembiayaan');
            $table->enum('jenis_penelitian_pengabdian', ['Penelitian', 'Pengabdian']);
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
