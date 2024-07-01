<?php

namespace App\Http\Controllers\Forgot;

use App\Http\Controllers\Controller;
use App\Http\Requests\Forgot\SendCodeRequest;
use App\Services\Forgot\SendCodeService;

class SendCodeController extends Controller
{
    protected $sendCodeService;

    public function __construct(SendCodeService $sendCodeService)
    {
        $this->sendCodeService = $sendCodeService;
    }

    public function forgotSendCode(SendCodeRequest $request)
    {
        $user = $this->sendCodeService->forgotSendCode($request->validated());

        return $request->jsonResponse($user);
    }

}
