<?php

namespace App\Services\Profile;

use App\Class\Keys;
use App\Class\Utils;
use App\Models\User;
use App\Repositories\Profile\ProfileRepository;

class ProfileService
{
    protected $userRepository;
    protected $key;
    protected $util;

    public function __construct(ProfileRepository $userRepository, Keys $keys, Utils $utils)
    {
        $this->userRepository = $userRepository;
        $this->key = $keys;
        $this->util = $utils;
    }

    public function fetchProfile(array $data): User
    {
        $user = User::find(1);
        $id = $user->id;
        // get the user id to fetch post
        $user_id = $this->util->clean($data[$this->key->UserID]);

        $result = $id == $user_id ? $id : $user_id;

        return $this->userRepository->fetchProfile([
            $this->key->ID => $id,
            $this->key->UserID => $result,
        ]);
    }

    public function fetchPost(array $data): User
    {
        $user = User::find(1);
        $id = $user->id;
        // get the user id to fetch post
        $user_id = $this->util->clean($data[$this->key->UserID]);

        $result = $id == $user_id ? $id : $user_id;

        return $this->userRepository->fetchPost([
            $this->key->ID => $id,
            $this->key->UserID => $result,
        ]);
    }
}
