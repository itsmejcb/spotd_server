<?php

namespace App\Services\SignUp;

use App\Class\Keys;
use App\Class\Utils;
use App\Models\User;
use App\Models\UserUsername;
use App\Repositories\SignUp\UsernameRepository;

class UsernameService
{
    protected $userRepository;
    protected $key;
    protected $util;

    public function __construct(UsernameRepository $userRepository, Keys $keys, Utils $utils)
    {
        $this->userRepository = $userRepository;
        $this->key = $keys;
        $this->util = $utils;
    }

    public function createUsername(array $data): UserUsername
    {
        $user = User::find(1);
        $id = $user->id;
        $username = $this->util->clean($data[$this->key->Username]);

        return $this->userRepository->create([
            'user_id' => $id,
            'username' => $username,
        ]);
    }
}
