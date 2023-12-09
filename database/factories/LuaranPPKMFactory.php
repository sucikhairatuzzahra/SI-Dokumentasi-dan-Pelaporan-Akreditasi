<?php

namespace Database\Factories;

use App\Models\JenisLuaran;
use App\Models\PPKM;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LuaranPPKM>
 */
class LuaranPPKMFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_ppkm' => fake()->randomElement(PPKM::all()->modelKeys()),
            'judul_luaran_ppkm' => fake()->sentence(3),
            'id_jenis_luaran' => fake()->randomElement(JenisLuaran::all()->modelKeys()),
            'tahun' => fake()->year(),
            'jumlah_sitasi' => fake()->numberBetween(0, 100)
        ];
    }
}
