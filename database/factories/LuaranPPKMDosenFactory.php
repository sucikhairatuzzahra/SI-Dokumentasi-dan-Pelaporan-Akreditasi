<?php

namespace Database\Factories;

use App\Models\Dosen;
use App\Models\LuaranPPKM;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LuaranPPKMDosen>
 */
class LuaranPPKMDosenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_luaran_ppkm' => fake()->randomElement(LuaranPPKM::all()->modelKeys()),
            'id_dosen' => fake()->randomElement(Dosen::all()->modelKeys()),
        ];
    }
}
