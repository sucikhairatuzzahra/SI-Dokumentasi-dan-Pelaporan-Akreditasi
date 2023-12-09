<?php

namespace Database\Seeders;

use App\Models\LuaranLainPPKMDosen;
use Illuminate\Database\Seeder;

class LuaranLainPPKMDosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LuaranLainPPKMDosen::factory()->count(10)->create();
    }
}
