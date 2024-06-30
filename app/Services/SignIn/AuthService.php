<?php

namespace App\Services\SignIn;

use App\Class\Keys;
use App\Class\Utils;
use App\Repositories\SignIn\AuthRepository;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    protected $userRepository;
    protected $key;
    protected $util;

    public function __construct(AuthRepository $userRepository, Keys $keys, Utils $utils)
    {
        $this->userRepository = $userRepository;
        $this->key = $keys;
        $this->util = $utils;
    }

    public function authenticate(array $data)
    {
        $email = $data[$this->key->Email] ?? null;
        $password = $data[$this->key->Password] ?? null;

        return $this->userRepository->auth([
            'email' => $email,
            'password' => $password,
        ]);

    }

    public function generateAccessToken($user)
    {
        return $user->createToken('auth_token')->plainTextToken;
    }

    public function logout($user)
    {
        $user->tokens()->delete();
    }
}
