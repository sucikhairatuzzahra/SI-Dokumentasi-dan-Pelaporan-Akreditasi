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
        Schema::create('beban_dtpr', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_thn_akademik')->constrained('tahun_akademik')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('id_dosen')->constrained('dosen')->cascadeOnUpdate()->cascadeOnDelete();
            $table->double('pgjrn_ps_sendiri');
            $table->double('pgjrn_ps_lain_pt_sendiri');
            $table->double('pgjrn_pt_lain');
            $table->double('sks_penelitian');
            $table->double('sks_pengabdian');
            $table->double('manajemen_pt_sendiri');
            $table->double('manajemen_pt_lain');
            // $table->foreignId('id_pt_unit')->constrained('pt_unit')->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('beban_dtpr');
    }
};
