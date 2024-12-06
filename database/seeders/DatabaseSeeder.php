<?php

namespace Database\Seeders;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'fullname' => 'Nesa Nurhaliza',
            'name' => 'nesa',
            'email' => 'nnesa9851@gmail.com',
            'phonenumber' => '019288273',
            'password' => bcrypt(12345),
            'as' => 'admin',
            'active' => 1,
        ]);

        $user = User::create([
            'fullname' => 'Nesa Nurhaliza',
            'name' => 'nesa',
            'email' => 'nesa@gmail.com',
            'phonenumber' => '019288273',
            'password' => bcrypt(12345),
            'as' => 'assessor',
            'active' => 1,
        ]);

    }
}
