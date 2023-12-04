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
        Schema::create('ppkm_dosen', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_ppkm')->constrained('ppkm')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('id_dosen')->constrained('dosen')->cascadeOnUpdate()->cascadeOnDelete();
            $table->enum('ketua', ['ya', 'tidak']);
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
        Schema::dropIfExists('ppkm_dosen');
    }
};
