<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserCredentials;
use App\Models\UserProfile;
use App\Models\UserUsername;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory(10)->create([
            // 'name' => 'Test User',
            // 'uid' => rand(100000000000000, 999999999999999),
            // 'email' => 'test@example.com',
        ]);

        UserCredentials::create([
            // 'user_id' =>,
            'first_name' => 'Jayson',
            'middle_name' => 'Caño',
            'last_name' => 'Bauloy']);

        UserUsername::create([
            // 'user_id' => $user->id,
            'username' => 'SpotdDev',
        ]);

        UserProfile::create([
            // 'user_id' => $user->id,
            'extension' => '.jpeg',
        ]);

    }
}
