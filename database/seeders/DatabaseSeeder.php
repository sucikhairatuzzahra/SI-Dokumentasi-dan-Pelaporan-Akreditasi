<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CreateJenisLuaranLainSeeder::class,
            CreateJenisLuaranSeeder::class,
            CreateJenjangProgramSeeder::class,
            CreateKategoriDosenSeeder::class,
            CreateLevelPTUnitSeeder::class,
            CreateLevelPendidikanTertinggiSeeder::class,
            CreatePTUnitSeeder::class,
            CreateTahunAkademikSeeder::class,
            CreateUserSeeder::class
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
