<?php

namespace App\Http\Controllers\SignUp;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignUp\UsernameRequest;
use App\Services\SignUp\UsernameService;

class UsernameController extends Controller
{
    protected $userService;

    public function __construct(UsernameService $userService)
    {
        $this->userService = $userService;
    }

    public function username(UsernameRequest $request)
    {
        $user = $this->userService->createUsername($request->validated());

        return $request->jsonResponse($user);
    }
}
