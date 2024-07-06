<?php

namespace App\Repositories\Follow;

use App\Class\Keys;
use App\Class\Utils;
use App\Models\Follow;
use App\Models\User;
use Illuminate\Database\QueryException;

class FollowRepository
{
    protected $key;
    protected $util;

    public function __construct(Keys $keys, Utils $utils)
    {
        $this->key = $keys;
        $this->util = $utils;
    }

    /**
     * Follow new user.
     *
     * @param array $data
     * @return Follow
     */
    public function follow(array $data): Follow
    {
        try {
            return Follow::Create($data);

        } catch (QueryException $e) {
            // Handle any database query exceptions if needed
            return null;
        }

    }
    /**
     * Unfollow user.
     *
     * @param array $data
     * @return Follow
     */
    public function unfollow(array $data): Follow
    {
        try {
            return Follow::where($this->key->FollowerID, $data[$this->key->FollowerID])
                ->where($this->key->FollowingID, $data[$this->key->FollowingID])->delete();

        } catch (QueryException $e) {
            // Handle any database query exceptions if needed
            return null;
        }

    }
}