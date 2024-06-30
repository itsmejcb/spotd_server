<?php

namespace App\Repositories\SignUp;

use App\Models\User;

class UserRepository
{

    /**
     * Create a new user.
     *
     * @param array $data
     * @return User
     */
    public function create(array $data): User
    {
        return User::create($data);
    }
}