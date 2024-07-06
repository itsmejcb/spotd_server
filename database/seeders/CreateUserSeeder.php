<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = User::create([
            'uid' => '000000000000004',
            'email' => 'jaysonbualoy26987@gmail.com',
            'password' => Hash::make('@Reyshel_'),
        ]);

        $user1->credentials()->create([
            'first_name' => 'Jayson',
            'middle_name' => 'Caño',
            'last_name' => 'Bauloy']);

        $user1->username()->create([
            'username' => 'SpotdDev',
        ]);

        $user1->profile()->create([
            'extension' => '.jpeg',
        ]);

// Create user2
        $user2 = User::create([
            'uid' => '000000000000002',
            'email' => 'reyshel.d26987@gmail.com',
            'password' => Hash::make('@Reyshel_'),
        ]);

        $user2->credentials()->create([
            'first_name' => 'Reyshel',
            'middle_name' => 'Aguirre',
            'last_name' => 'Daguinod ']);

        $user2->username()->create([
            'username' => 'CoFounderSpotd',
        ]);

        $user2->profile()->create([
            'extension' => '.jpeg',
        ]);

        // $user1->following()->create([
        //     'follower_id' => $user1->id,
        //     'following_id' => $user2->id,
        // ]);

        // $user2->following()->create([
        //     'follower_id' => $user2->id,
        //     'following_id' => $user1->id,
        // ]);

    }
}
