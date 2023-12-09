<?php

namespace Database\Factories;

use App\Models\JenisLuaranLain;
use App\Models\PPKM;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LuaranLainPPKM>
 */
class LuaranLainPPKMFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'tahun' => fake()->year(),
            'id_ppkm' => fake()->randomElement(PPKM::all()->modelKeys()),
            'id_jenis_luaran_lain' => fake()->randomElement(JenisLuaranLain::all()->modelKeys()),
            'judul_luaran_lain' => fake()->sentence(3),
            'keterangan' => fake()->numerify('EE########'),
            'jumlah_sitasi' => fake()->numberBetween(0, 100),
        ];
    }
}
