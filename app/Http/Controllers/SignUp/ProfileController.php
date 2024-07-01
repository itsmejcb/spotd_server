<?php

namespace App\Http\Controllers\SignUp;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignUp\ProfileRequest;
use App\Services\SignUp\ProfileService;

class ProfileController extends Controller
{
    protected $profileService;

    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }

    public function profile(ProfileRequest $request)
    {
        $user = $this->profileService->createProfile($request->validated());

        return $request->jsonResponse($user);
    }
}
