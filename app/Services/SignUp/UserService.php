<?php

namespace App\Services\SignUp;

use App\Class\Keys;
use App\Class\Utils;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Repositories\SignUp\UserRepository;

class UserService
{
    protected $userRepository;
    protected $key;
    protected $util;

    public function __construct(UserRepository $userRepository, Keys $keys, Utils $utils)
    {
        $this->userRepository = $userRepository;
        $this->key = $keys;
        $this->util = $utils;
    }

    public function createUser(array $data): User
    {
        $uid = $this->util->clean($this->util->generateUID());
        $email = $this->util->clean($data[$this->key->Email]);
        $password = $this->util->clean(Hash::make($data[$this->key->Password]));

        return $this->userRepository->create([
            'uid' => $uid,
            'email' => $email,
            'password' => $password,
        ]);
    }
}