<?php

namespace Database\Factories;

use App\Models\PPKMDosen;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PPKMDosen>
 */
class PPKMDosenFactory extends Factory
{
    protected $model = PPKMDosen::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'ketua' => fake()->randomElement(['ya', 'tidak']),
        ];
    }
}
