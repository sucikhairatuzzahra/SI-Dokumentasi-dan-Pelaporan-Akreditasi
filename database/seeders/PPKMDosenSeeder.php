<?php

namespace Database\Seeders;

use App\Models\PPKMDosen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PPKMDosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PPKMDosen::factory()
            ->count(10)
            ->create();
    }
}
