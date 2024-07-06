<?php

namespace App\Services\List;

use App\Class\Keys;
use App\Class\Utils;
use App\Repositories\List\FollowerRepository;
use Illuminate\Support\Facades\Auth;

class FollowerService
{
    protected $followerRepository;
    protected $key;
    protected $util;

    public function __construct(FollowerRepository $followerRepository, Keys $keys, Utils $utils)
    {
        $this->followerRepository = $followerRepository;
        $this->key = $keys;
        $this->util = $utils;
    }

    public function listFollower(array $data)
    {
        $user = Auth::user();
        $id = $user->id;

        return $this->followerRepository->listFollower([
            $this->key->UserID => $id,
        ]);
    }
}
