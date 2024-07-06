<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PostRequest;
use App\Services\Post\PostService;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }
    // to view the profile info
    public function fetchPost(PostRequest $request)
    {
        $user = $this->postService->fetchPost($request->validated());

        return $request->jsonResponse($user);
    }
}
