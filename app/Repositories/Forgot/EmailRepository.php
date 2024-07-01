<?php

namespace App\Repositories\Forgot;

use App\Class\Keys;
use App\Class\Utils;
use App\Models\User;
use Illuminate\Database\QueryException;

class EmailRepository
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
     * @return User
     */
    public function forgotEmail(array $data): ?User
    {
        try {
            dump($data[$this->key->Email]);
            return User::where('email', $data[$this->key->Email])
                ->first();
        } catch (QueryException $e) {
            // Handle any database query exceptions if needed
            return null;
        }
    }
}
