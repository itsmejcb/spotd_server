<?php

namespace App\Http\Controllers\Forgot;

use App\Http\Controllers\Controller;
use App\Http\Requests\Forgot\ChangePasswordRequest;
use App\Services\Forgot\ChangePasswordService;

class ChangePasswordController extends Controller
{
    protected $changePasswordService;

    public function __construct(ChangePasswordService $changePasswordService)
    {
        $this->changePasswordService = $changePasswordService;
    }

    public function forgotChangePassword(ChangePasswordRequest $request)
    {
        $user = $this->changePasswordService->forgotChangePassword($request->validated());

        return $request->jsonResponse($user);
    }
}
