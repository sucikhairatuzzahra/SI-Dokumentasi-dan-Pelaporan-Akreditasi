<?php

namespace Database\Seeders;

use App\Models\LuaranLainPPKM;
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
            CreateLevelPTUnitSeeder::class,
            CreatePTUnitSeeder::class,
            CreateTahunAkademikSeeder::class,
            CreateUserSeeder::class,
            CreateJenisSumberPembiayaanSeeder::class,
            CreateKategoriDosenSeeder::class,
            CreateLevelPendidikanTertinggiSeeder::class,
            MhsBaruSeed::class,
            TenagaKependidikanSeed::class,
            KelulusanTepatWaktuSeed::class,
            // IPKLulusanSeed::class,
            KepuasanPenggunaSeed::class,
            // MasaTungguLulusanSeed::class,
            // BidangKerjaLulusanSeed::class,
            // PPKMDariDTPRSeed::class,
            SaranaSeed::class,
            PendanaanSeed::class,
            // PegawaiSeeder::class,
            // DosenSeeder::class,
            // PPKMSeeder::class,
            PPKMDosenSeeder::class,
            LuaranLainPPKMSeeder::class,
            LuaranLainPPKMDosenSeeder::class,
            LuaranPPKMSeeder::class,
            LuaranPPKMDosenSeeder::class
        ]);
    }
}
