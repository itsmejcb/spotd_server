<?php

namespace App\Http\Controllers\SignUp;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignUp\EmailRequest;
use App\Services\SignUp\UserService;

class EmailController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function email(EmailRequest $request)
    {
        $user = $this->userService->createUser($request->validated());

        $token = $user->createToken('auth_token')->plainTextToken;

        return $request->jsonResponse($user, $token);
    }
}
