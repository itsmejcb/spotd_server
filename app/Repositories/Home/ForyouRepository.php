<?php

namespace App\Repositories\Home;

use App\Class\Keys;
use App\Class\Utils;
use App\Models\Post;
use Illuminate\Database\QueryException;

class ForyouRepository
{
    protected $key;
    protected $util;

    public function __construct(Keys $keys, Utils $utils)
    {
        $this->key = $keys;
        $this->util = $utils;
    }
    /**
     * Create a new user.
     *
     * @param array $data
     * @return Post
     */
    public function homeForyou(array $data): Post
    {
        try {
            dump($data[$this->key->Email]);
            return Post::where('email', $data[$this->key->Email])
                ->first();
        } catch (QueryException $e) {
            // Handle any database query exceptions if needed
            return null;
        }

    }
}
