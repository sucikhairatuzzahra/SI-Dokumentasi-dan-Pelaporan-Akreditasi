<?php

namespace Database\Factories;

use App\Models\Dosen;
use App\Models\LuaranLainPPKM;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LuaranLainPPKMDosen>
 */
class LuaranLainPPKMDosenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_luaran_lain_ppkm' => fake()->randomElement(LuaranLainPPKM::all()->modelKeys()),
            'id_dosen' => fake()->randomElement(Dosen::all()->modelKeys()),
        ];
    }
}
