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
            $table->foreignId('id_thn_akademik')->constrained('tahun_akademik')->cascadeOnUpdate()->cascadeOnDelete();
            $table->double('jumlah_lulusan');
            $table->double('ipk_min');
            $table->double('ipk_rata_rata');
            $table->double('ipk_max');
            $table->foreignId('id_pt_unit')->constrained('pt_unit')->cascadeOnUpdate()->cascadeOnDelete();
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
