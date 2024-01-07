<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'admin12345',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456789'), // Ganti 'password' dengan password yang diinginkan
            'role' => 'admin',
        ]);
    }
}
