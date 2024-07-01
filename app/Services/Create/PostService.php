<?php

namespace App\Services\Create;

use App\Class\Keys;
use App\Class\Utils;
use App\Models\Post;
use App\Models\User;
use App\Repositories\Create\PostRepository;

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

    public function createPost(array $data): Post
    {
        $user = User::find(1);
        $id = $user->id;

        $push_key = $this->util->clean($this->util->generatePushKey());
        $content = $this->util->clean($data[$this->key->Content] ?? null); // Default value if key is not present
        // $post_status = $this->util->clean($data[$this->key->PostStatus] ?? null); // Default value if key is not present
        // $react_status = $this->util->clean($data[$this->key->ReactStatus] ?? null); // Default value if key is not present
        // $comment_status = $this->util->clean($data[$this->key->CommentStatus] ?? null); // Default value if key is not present

        $post = $this->postRepository->create([
            $this->key->PushKey => $push_key,
            $this->key->Content => $content,
            $this->key->AuthorId => $id,
        ]);

        $post_status = $this->util->clean($data[$this->key->PostStatus] ?? null); // Default value if key is not present
        $react_status = $this->util->clean($data[$this->key->ReactStatus] ?? null); // Default value if key is not present
        $comment_status = $this->util->clean($data[$this->key->CommentStatus] ?? null); // Default value if key is not present

        $post->settings()->create([
            $this->key->PostID => $post->id,
            $this->key->PostStatus => $post_status,
            $this->key->ReactStatus => $react_status,
            $this->key->CommentStatus => $comment_status,
        ]);

        $image_names = $data[$this->key->ImageName] ?? [];
        $image_statuses = $data[$this->key->ImageStatus] ?? [];

        foreach ($image_names as $index => $image_name) {
            $clean_image_name = $this->util->clean($image_name);
            $clean_image_status = $this->util->clean($image_statuses[$index] ?? 'sfw');

            // Check if the post relationship with images is correctly defined and data structure is correct
            $post->images()->create([
                $this->key->PostID => $post->id,
                $this->key->Image => $clean_image_name,
                $this->key->Status => $clean_image_status,
            ]);
        }

        return $post;
    }
}