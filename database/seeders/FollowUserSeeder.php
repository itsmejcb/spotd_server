<?php

namespace Database\Seeders;

use App\Models\Follow;
use Illuminate\Database\Seeder;

class FollowUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Follow::create([
            'follower_id' => 1,
            'following_id' => 4,
        ]);

        Follow::create([
            'follower_id' => 1,
            'following_id' => 3,
        ]);

    }
}
