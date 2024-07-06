<?php

namespace App\Repositories\List;

use App\Class\Keys;
use App\Class\Utils;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class FollowerRepository
{
    protected $key;
    protected $util;

    public function __construct(Keys $keys, Utils $utils)
    {
        $this->key = $keys;
        $this->util = $utils;
    }
    /**
     * Create a new user.
     *
     * @param array $data
     * @return User
     */
    public function listFollower(array $data): User
    {
        try {
            return User::select(
                'users.id',
                'user_username.username',
                DB::raw("CASE
                            WHEN user_credentials.middle_name IS NOT NULL THEN
                                user_credentials.first_name || ' ' || user_credentials.middle_name || ' ' || user_credentials.last_name
                            ELSE
                                user_credentials.first_name || ' ' || user_credentials.last_name
                        END AS full_name
                        "),
                DB::raw("users.uid || user_profile.ms || user_profile.extension AS profile")
            )
                ->leftJoin('user_credentials', 'users.id', '=', 'user_credentials.user_id')
                ->leftJoin('user_username', 'users.id', '=', 'user_username.user_id')
                ->leftJoin('user_profile', 'users.id', '=', 'user_profile.user_id')
                ->join('follows', 'users.id', '=', 'follows.following_id')
                ->where('follows.follower_id', $data[$this->key->UserID])
                ->get();

        } catch (QueryException $e) {
            // Handle any database query exceptions if needed
            return null;
        }

    }
}
