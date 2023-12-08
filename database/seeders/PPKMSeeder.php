<?php

namespace Database\Seeders;

use App\Models\PPKM;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PPKMSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PPKM::factory()->count(10)->create();
    }
}
