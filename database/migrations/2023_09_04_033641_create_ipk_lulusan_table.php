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
        Schema::create('ipk_lulusan', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun_lulus');
            $table->double('jumlah_lulusan');
            $table->double('ipk_min');
            $table->double('ipk_rata_rata');
            $table->double('ipk_max');
            $table->string('pt_unit');
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
        Schema::dropIfExists('ipk_lulusan');
    }
};
