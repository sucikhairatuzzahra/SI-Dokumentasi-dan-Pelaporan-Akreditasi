<?php

namespace Database\Factories;

use App\Models\PPKM;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PPKM>
 */
class PPKMFactory extends Factory
{
    protected $model = PPKM::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'tahun' => fake()->year(),
            'judul' => fake()->sentence(3),
            'id_jenis_sumber_pembiayaan' => fake()->numberBetween(1, 4),
            'sumber_pembiayaan' =>  fake()->randomElement(['Mandiri', 'Dana DIPA', 'Politeknik Negeri Padang', 'Kemdikbud', 'Semen Padang']),
            'jenis_penelitian_pengabdian' => fake()->randomElement(['Penelitian', 'Pengabdian']),
        ];
    }
}
