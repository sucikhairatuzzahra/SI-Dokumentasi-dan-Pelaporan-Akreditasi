<?php

namespace Database\Seeders;

use App\Models\LuaranLainPPKM;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LuaranLainPPKMSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LuaranLainPPKM::factory()->count(10)->create();
    }
}
