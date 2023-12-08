<?php

namespace Database\Factories;

use App\Models\Dosen;
use App\Models\KategoriDosen;
use App\Models\Pegawai;
use App\Models\PTUnit;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dosen>
 */
class DosenFactory extends Factory
{
    protected $model = Dosen::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nomor_induk_dosen' => fake()->numberBetween('0019177619', '9999999999'),
            'jenis_nomor_induk_dosen' => fake()->randomElement(['NIDN', 'NIDK']),
            'id_level_pendidikan_tertinggi' => fake()->numberBetween(1, 6),
            'pendidikan_magister' => fake()->randomElement(['Informatika', 'Sistem Informasi', 'Kecerdasan Buatan', 'Matematika']),
            'bidang_keahlian' => fake()->jobTitle(),
            'id_pegawai' => Pegawai::factory(),
            'id_pt_unit' => fake()->numberBetween(1, 8),
            'id_kategori_dosen' => fake()->numberBetween(1, 3),
        ];
    }
}
