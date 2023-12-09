<?php

namespace Database\Seeders;

use App\Models\LuaranPPKMDosen;
use Illuminate\Database\Seeder;

class LuaranPPKMDosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LuaranPPKMDosen::factory()->count(10)->create();
    }
}
