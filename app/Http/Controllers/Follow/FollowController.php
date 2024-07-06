<?php

namespace App\Http\Controllers\Follow;

use App\Http\Controllers\Controller;
use App\Http\Requests\Follow\FollowRequest;
use App\Services\Follow\FollowService;

class FollowController extends Controller
{
    protected $followService;

    public function __construct(FollowService $followService)
    {
        $this->followService = $followService;
    }

    public function follow(FollowRequest $request)
    {
        $user = $this->followService->follow($request->validated());

        return $request->jsonResponse($user);
    }

    public function unfollow(FollowRequest $request)
    {
        $user = $this->followService->unfollow($request->validated());

        return $request->jsonResponse($user);
    }
}
