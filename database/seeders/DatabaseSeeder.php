<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Admin Account
        User::create([
            'name' => 'Admin Fun Coding',
            'email' => 'adminfuncoding@gmail.com',
            'password' => Hash::make('FunCoding2025'),
            'email_verified_at' => now(),
        ]);

        $this->call([
            ContactSeeder::class,
            HomeSeeder::class,
            AboutSeeder::class,
        ]);

        $this->call([
            FotoGaleriSeeder::class,
        ]);

        $this->call([
            VideoGaleriSeeder::class
        ]);
    }
}
