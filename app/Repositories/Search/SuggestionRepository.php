<?php

namespace App\Repositories\Search;

use App\Class\Keys;
use App\Models\Post;
use Illuminate\Database\QueryException;

class SuggestionRepository
{
    protected $key;

    public function __construct(Keys $keys)
    {
        $this->key = $keys;
    }

    /**
     * fetch user suggestion based on user interest.
     *
     * @param array $data
     * @return @UserUsername
     */
    public function searchSuggestion(array $data): ?Post
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
