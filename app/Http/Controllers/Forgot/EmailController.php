<?php

namespace App\Http\Controllers\Forgot;

use App\Http\Controllers\Controller;
use App\Http\Requests\Forgot\EmailRequest;
use App\Services\Forgot\EmailService;

class EmailController extends Controller
{
    protected $emailService;

    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }

    public function forgotEmail(EmailRequest $request)
    {
        $user = $this->emailService->forgotEmail($request->validated());

        $token = $user->createToken('auth_token')->plainTextToken;

        return $request->jsonResponse($user, $token);
    }
}
