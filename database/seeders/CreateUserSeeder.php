<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Jurusan',
                'email' => 'user@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 0,
                'id_pt_unit' => 3,
                'kode_pt_unit' => 'JUR.TI'
            ],
            [
                'name' => 'Kaprodi trpl',
                'email' => 'kaproditrpl@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 1,
                'id_pt_unit' => 4,
                'kode_pt_unit' => 'D4 TRPL'
            ],
            [
                'name' => 'Kaprodi mi',
                'email' => 'kaprodimi@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 1,
                'id_pt_unit' => 5,
                'kode_pt_unit' => 'D3 MI'
            ],
            [
                'name' => 'Kaprodi tk',
                'email' => 'kaproditk@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 1,
                'id_pt_unit' => 6,
                'kode_pt_unit' => 'D3 TK'
            ],
            [
                'name' => 'Adm Prodi trpl',
                'email' => 'admproditrpl@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 2,
                'id_pt_unit' => 4,
                'kode_pt_unit' => 'D4 TRPL'
            ],
            [
                'name' => 'Adm Prodi mi',
                'email' => 'admprodimi@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 2,
                'id_pt_unit' => 5,
                'kode_pt_unit' => 'D3 MI'
            ],
            [
                'name' => 'Adm Prodi tk',
                'email' => 'admproditk@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 2,
                'id_pt_unit' => 6,
                'kode_pt_unit' => 'D3 TK'
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 3,
                'id_pt_unit' => 3,
                'kode_pt_unit' => 'JUR.TI'
            ]
        ];
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
