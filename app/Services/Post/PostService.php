<?php

namespace App\Services\Post;

use App\Class\Keys;
use App\Class\Utils;
use App\Models\Post;
use App\Models\User;
use App\Repositories\Post\PostRepository;

class PostService
{
    protected $postRepository;
    protected $key;
    protected $util;

    public function __construct(PostRepository $postRepository, Keys $keys, Utils $utils)
    {
        $this->postRepository = $postRepository;
        $this->key = $keys;
        $this->util = $utils;
    }

    public function fetchPost(array $data): Post
    {
        $user = User::find(1);
        $id = $user->id;
        // get the user id to fetch post
        $post_id = $this->util->clean($data[$this->key->PostID]);

        // $result = $id == $user_id ? $id : $user_id;

        return $this->postRepository->fetchPost([
            $this->key->UserID => $id,
            $this->key->PostID => $post_id,
        ]);
    }
}
