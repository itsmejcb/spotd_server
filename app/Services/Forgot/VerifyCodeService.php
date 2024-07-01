<?php

namespace App\Services\Forgot;

use App\Class\Keys;
use App\Class\Utils;
use App\Models\ForgotPassword;
use App\Repositories\Forgot\VerifyCodeRepository;
use Illuminate\Support\Facades\Auth;

class VerifyCodeService
{
    protected $verifyCodeRepository;
    protected $key;
    protected $util;

    public function __construct(VerifyCodeRepository $verifyCodeRepository, Keys $keys, Utils $utils)
    {
        $this->verifyCodeRepository = $verifyCodeRepository;
        $this->key = $keys;
        $this->util = $utils;
    }

    public function forgotVerifyCode(array $data): ForgotPassword
    {
        $user = Auth::user();
        $id = $user->id;

        $code = $this->util->clean($data[$this->key->Code]);

        return $this->verifyCodeRepository->forgotVerifyCode([
            $this->key->UserID => $id,
            $this->key->Code => $code,
        ]);
    }
}
