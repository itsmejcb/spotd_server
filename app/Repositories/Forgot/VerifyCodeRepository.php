<?php

namespace App\Repositories\Forgot;

use App\Class\Keys;
use App\Class\Utils;
use App\Models\ForgotPassword;

class VerifyCodeRepository
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
     * @return ForgotPassword
     */
    public function forgotVerifyCode(array $data): ForgotPassword
    {
        return ForgotPassword::where($this->key->Code, $data[$this->key->Code])
            ->where($this->key->UserID, $data[$this->key->UserID])
            ->first();

    }
}
