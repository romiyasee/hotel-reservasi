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
    \App\Models\User::create([
    'name' => 'testuser',
    'username' => 'testuser',
    'email' => 'test@example.com',
    'password' => 'test123',
    'role' => 'user',
    ]);

    $this->call(UserSeeder::class);
}

}
