<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Admin User
        User::create([
            'username' => 'admin',
            'name' => 'AIS Cafe Admin',
            'email' => 'admin@aiscafe.com',
            'password' => Hash::make('combucha'), 
            'telp' => '08123456789',
            'role' => 'admin',
        ]);
    }
}
