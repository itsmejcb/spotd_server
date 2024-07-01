<?php

namespace App\Repositories\Create;

use App\Class\Keys;
use App\Models\Post;

// use Illuminate\Database\QueryException;

class PostRepository
{
    protected $key;

    public function __construct(Keys $keys)
    {
        $this->key = $keys;
    }

    /**
     * Create a new post.
     *
     * @param array $data
     * @return Post
     */
    public function create(array $data): Post
    {

        return Post::updateOrCreate(
            [$this->key->PushKey => $data[$this->key->PushKey]], // Unique key to check existence
            $data // Data to insert or update
        );
    }
}
