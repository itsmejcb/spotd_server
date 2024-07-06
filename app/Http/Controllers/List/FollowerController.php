<?php

namespace App\Http\Controllers\List;

use App\Http\Controllers\Controller;
use App\Http\Requests\List\FollowerRequest;
use App\Services\List\FollowerService;

class FollowerController extends Controller
{
    protected $followerService;

    public function __construct(FollowerService $followerService)
    {
        $this->followerService = $followerService;
    }

    public function listFollower(FollowerRequest $request)
    {
        $user = $this->followerService->listFollower($request->validated());

        return $request->jsonResponse($user);
    }

}
