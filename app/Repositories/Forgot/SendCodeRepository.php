<?php

namespace App\Repositories\Forgot;

use App\Class\Keys;
use App\Class\Utils;
use App\Models\ForgotPassword;

class SendCodeRepository
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
    public function forgotSendCode(array $data): ForgotPassword
    {
        // Attempt to create the user
        return ForgotPassword::updateOrCreate(
            [$this->key->UserID => $data[$this->key->UserID]], // Unique key to check existence
            $data // Data to insert or update
        );
    }
}
