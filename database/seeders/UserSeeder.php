<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Hotel',
            'username' => 'admin',
            'email' => 'admin@hotel.com',
            'password' => 'password', // HARUS di-hash
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'User Biasa',
            'username' => 'user1',
            'email' => 'user1@hotel.com',
            'password' => 'user123',
            'role' => 'user',
        ]);
    }
}
