<?php

namespace Database\Factories;

use App\Models\Pegawai;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pegawai>
 */
class PegawaiFactory extends Factory
{
    protected $model = Pegawai::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_pegawai' => fake()->name(),
            'tanggal_lahir' => fake()->date(),
            'nip' => fake()->numberBetween(111111111111111111, 999999999999999999) . '',
            'aktif' => 'ya'
        ];
    }
}
