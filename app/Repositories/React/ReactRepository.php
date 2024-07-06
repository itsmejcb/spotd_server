<?php

namespace App\Repositories\React;

use App\Class\Keys;
use App\Models\PostReact;
use Illuminate\Database\QueryException;

class ReactRepository
{
    protected $key;

    public function __construct(Keys $keys)
    {
        $this->key = $keys;
    }

    /**
     * Create a new user.
     *
     * @param array $data
     * @return PostReact
     */
    public function reactPost(array $data): PostReact
    {
        try {
            // Attempt to create the user
            return PostReact::create(
                $data // Data to insert or update
            );

        } catch (QueryException $e) {
            // Handle any database query exceptions if needed
            return null;
        }
    }

    /**
     * Delete a user react in post.
     *
     * @param array $data
     * @return PostReact
     */
    public function unreactPost(array $data): PostReact
    {
        try {
            // Attempt to create the user
            return PostReact::where($this->key->PostID, $data[$this->key->PostID])
                ->where($this->key->UserID, $data[$this->key->UserID])->delete();

        } catch (QueryException $e) {
            // Handle any database query exceptions if needed
            return null;
        }
    }
}