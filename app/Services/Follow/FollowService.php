<?php

namespace App\Services\Follow;

use App\Class\Keys;
use App\Class\Utils;
use App\Models\Follow;
use App\Repositories\Follow\FollowRepository;
use Illuminate\Support\Facades\Auth;

class FollowService
{
    protected $followRepository;
    protected $key;
    protected $util;

    public function __construct(FollowRepository $followRepository, Keys $keys, Utils $utils)
    {
        $this->followRepository = $followRepository;
        $this->key = $keys;
        $this->util = $utils;
    }

    public function follow(array $data)
    {
        $user = Auth::user();
        $id = $user->id;

        $following_id = $this->util->clean($data[$this->key->FollowingID]);

        return $this->followRepository->follow([
            $this->key->FollowerID => $id,
            $this->key->FollowingID => $following_id,
        ]);
    }

    public function unfollow(array $data)
    {
        $user = Auth::user();
        $id = $user->id;

        $following_id = $this->util->clean($data[$this->key->FollowingID]);

        return $this->followRepository->unfollow([
            $this->key->FollowerID => $id,
            $this->key->FollowingID => $following_id,
        ]);
    }
}