<?php

namespace App\Http\Controllers\Forgot;

use App\Http\Controllers\Controller;
use App\Http\Requests\Forgot\VerifyCodeRequest;
use App\Services\Forgot\VerifyCodeService;

class VerifyCodeController extends Controller
{
    protected $verifyCodeService;

    public function __construct(VerifyCodeService $verifyCodeService)
    {
        $this->verifyCodeService = $verifyCodeService;
    }

    public function forgotVerifyCode(VerifyCodeRequest $request)
    {
        $user = $this->verifyCodeService->forgotVerifyCode($request->validated());

        return $request->jsonResponse($user);
    }
}
