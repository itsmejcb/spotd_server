<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Home\FollowingRequest;
use App\Services\Home\FollowingService;

class FollowingController extends Controller
{
    protected $followingService;

    public function __construct(FollowingService $followingService)
    {
        $this->followingService = $followingService;
    }

    public function homeFollowing(FollowingRequest $request)
    {
        $user = $this->followingService->homeFollowing($request->validated());

        return $request->jsonResponse($user);
    }
}
