<?php

namespace App\Repositories\SignIn;

use App\Class\Keys;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthRepository
{
    protected $key;

    public function __construct(Keys $keys)
    {
        $this->key = $keys;
    }

    /**
     * Authenticate user based on email and password.
     *
     * @param array $data
     * @return User|null
     */
    public function auth(array $data)
    {
        $user = User::where('email', $data['email'])
            ->first();

        if (!$user || !Hash::check($data['password'], $user['password'])) {
            return false;
        }
        $user->tokens()->delete();
        return $user;
    }
}
