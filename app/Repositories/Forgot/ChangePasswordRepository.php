<?php

namespace App\Repositories\Forgot;

use App\Class\Keys;
use App\Class\Utils;
use App\Models\User;

class ChangePasswordRepository
{
    protected $key;
    protected $util;

    public function __construct(Keys $keys, Utils $utils)
    {
        $this->key = $keys;
        $this->util = $utils;
    }
    /**
     * Create a new user.
     *
     * @param array $data
     * @return UserUsername
     */
    public function forgotChangePassword(array $data): User
    {
        $user = User::updateOrCreate(
            [$this->key->ID => $data[$this->key->UserID]], // Unique key to check existence
            $data // Data to insert or update
        );

        // Attempt to clear current user token
        $user->tokens()->delete();

        return $user;
    }
}
