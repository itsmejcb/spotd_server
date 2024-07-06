<?php

namespace App\Repositories\Search;

use App\Class\Keys;
use App\Models\User;
use Illuminate\Database\QueryException;

class SearchRepository
{
    protected $key;

    public function __construct(Keys $keys)
    {
        $this->key = $keys;
    }

    /**
     * Search user such as post user or hashtag.
     *
     * @param array $data
     * @return @UserUsername
     */
    public function search(array $data): ?User
    {
        try {
            // Attempt to create the user
            return null;
        } catch (QueryException $e) {
            // Handle any database query exceptions if needed
            return null;
        }
    }
}
