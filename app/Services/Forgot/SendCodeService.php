<?php

namespace App\Services\Forgot;

use App\Class\Keys;
use App\Class\Utils;
use App\Mail\ForgotPassword;
use App\Models\User;
use App\Repositories\Forgot\SendCodeRepository;
use Illuminate\Support\Facades\Mail;
use Ramsey\Uuid\Uuid;

class SendCodeService
{
    protected $sendRepository;
    protected $key;
    protected $util;

    public function __construct(SendCodeRepository $sendRepository, Keys $keys, Utils $utils)
    {
        $this->sendRepository = $sendRepository;
        $this->key = $keys;
        $this->util = $utils;
    }

    public function forgotSendCode(array $data)
    {
        $user = User::find(1);
        $id = $user->id;
        $email = $user->email;

        $code = $this->util->clean($this->util->getOTP());

        $send = Mail::to($email)->send(new ForgotPassword($code));

        $this->mailResponse($send);
        $token = $this->util->clean(Uuid::uuid4());

        return $this->sendRepository->forgotSendCode([
            $this->key->UserID => $id,
            $this->key->Token => $token,
            $this->key->Code => $code,
        ]);
    }

    public function mailResponse($result)
    {
        if (!$result) {
            return response()->json([
                $this->key->Status => $this->key->Conflict,
            ]);
        }
    }
}
