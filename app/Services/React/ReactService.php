<?php

namespace App\Services\React;

use App\Class\Keys;
use App\Class\Utils;
use App\Models\PostReact;
use App\Models\User;
use App\Repositories\React\ReactRepository;

class ReactService
{
    protected $userRepository;
    protected $key;
    protected $util;

    public function __construct(ReactRepository $userRepository, Keys $keys, Utils $utils)
    {
        $this->userRepository = $userRepository;
        $this->key = $keys;
        $this->util = $utils;
    }

    public function reactPost(array $data): PostReact
    {
        $user = User::find(1);
        $id = $user->id;
        // get the user id to fetch post
        $post_id = $this->util->clean($data[$this->key->PostID]);

        return $this->userRepository->reactPost([
            $this->key->UserID => $id,
            $this->key->PostID => $post_id,
        ]);
    }

    public function unreactPost(array $data): PostReact
    {
        $user = User::find(1);
        $id = $user->id;
        // get the user id to fetch post
        $post_id = $this->util->clean($data[$this->key->PostID]);

        return $this->userRepository->unreactPost([
            $this->key->UserID => $id,
            $this->key->PostID => $post_id,
        ]);
    }
}
