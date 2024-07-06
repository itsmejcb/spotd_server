<?php

namespace App\Http\Controllers\List;

use App\Http\Controllers\Controller;
use App\Http\Requests\List\FollowingRequest;
use App\Services\List\FollowingService;

class FollowingController extends Controller
{
    protected $followingService;

    public function __construct(FollowingService $followingService)
    {
        $this->followingService = $followingService;
    }

    public function listFollower(FollowingRequest $request)
    {
        $user = $this->followingService->listFollowing($request->validated());

        return $request->jsonResponse($user);
    }
}
