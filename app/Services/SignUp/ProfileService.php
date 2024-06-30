<?php

namespace App\Services\SignUp;

use App\Class\Keys;
use App\Class\Utils;
use App\Models\User;
use App\Models\UserProfile;
use App\Repositories\SignUp\ProfileRepository;

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

    public function createProfile(array $data): UserProfile
    {
        $user = User::find(1);
        $id = $user->id;
        $ms = $this->util->clean($this->util->getMS());
        $extension = $this->util->clean($data[$this->key->Extension]);

        return $this->userRepository->create([
            'user_id' => $id,
            'ms' => $ms,
            'extension' => $extension,
        ]);
    }
}
