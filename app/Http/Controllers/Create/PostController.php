<?php

namespace App\Http\Controllers\Create;

use App\Http\Controllers\Controller;
use App\Http\Requests\Create\PostRequest;
use App\Services\Create\PostService;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function post(PostRequest $request)
    {
        // $user = User::find(1);
        // $id = $user->id;
        // dump($id);

        $post = $this->postService->createPost($request->validated());

        return $request->jsonResponse($post);
    }
}
