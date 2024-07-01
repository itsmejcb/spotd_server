<?php

namespace App\Http\Controllers\SignUp;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignUp\UsernameRequest;
use App\Services\SignUp\UsernameService;

class UsernameController extends Controller
{
    protected $usernameService;

    public function __construct(UsernameService $usernameService)
    {
        $this->usernameService = $usernameService;
    }

    public function username(UsernameRequest $request)
    {
        $user = $this->usernameService->createUsername($request->validated());

        return $request->jsonResponse($user);
    }
}
