<?php

namespace App\Http\Controllers\SignUp;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignUp\ProfileRequest;
use App\Services\SignUp\ProfileService;

class ProfileController extends Controller
{
    protected $userService;

    public function __construct(ProfileService $userService)
    {
        $this->userService = $userService;
    }

    public function profile(ProfileRequest $request)
    {
        $user = $this->userService->createProfile($request->validated());

        return $request->jsonResponse($user);
    }
}
