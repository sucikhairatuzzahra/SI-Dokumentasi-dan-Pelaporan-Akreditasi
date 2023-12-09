<?php

namespace Database\Seeders;

use App\Models\LuaranPPKM;
use Illuminate\Database\Seeder;

class LuaranPPKMSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LuaranPPKM::factory()->count(10)->create();
    }
}
