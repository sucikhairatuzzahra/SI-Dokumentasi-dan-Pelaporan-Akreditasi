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
                'role' => 0
            ],
            [
                'name' => 'Kaprodi',
                'email' => 'kaprodi@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 1
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 2
            ]
        ];
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
