<?php

namespace App\Services\Home;

use App\Class\Keys;
use App\Class\Utils;
use App\Repositories\Home\FollowingRepository;
use Illuminate\Support\Facades\Auth;

class FollowingService
{
    protected $followingRepository;
    protected $key;
    protected $util;

    public function __construct(FollowingRepository $followingRepository, Keys $keys, Utils $utils)
    {
        $this->followingRepository = $followingRepository;
        $this->key = $keys;
        $this->util = $utils;
    }

    public function homeFollowing(array $data)
    {
        $user = Auth::user();
        $id = $user->id;

        return $this->followingRepository->homeFollowing([
            $this->key->UserID => $id,
        ]);
    }
}