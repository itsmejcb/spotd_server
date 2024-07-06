<?php

namespace App\Services\List;

use App\Class\Keys;
use App\Class\Utils;
use App\Repositories\List\FollowingRepository;
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

    public function listFollowing(array $data)
    {
        $user = Auth::user();
        $id = $user->id;

        return $this->followingRepository->listFollowing([
            $this->key->UserID => $id,
        ]);
    }
}
