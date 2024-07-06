<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\ProfileRequest;
use App\Services\Profile\ProfileService;

class ProfileController extends Controller
{
    protected $profileService;

    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }
    public function fetchProfile(ProfileRequest $request)
    {
        $user = $this->profileService->fetchProfile($request->validated());

        return $request->jsonResponse($user);
    }
    public function fetchPost(ProfileRequest $request)
    {
        $user = $this->profileService->fetchPost($request->validated());

        return $request->jsonResponse($user);
    }
}
