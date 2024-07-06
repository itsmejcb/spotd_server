<?php

namespace App\Repositories\Search;

use App\Class\Keys;
use App\Models\UserHistory;
use Illuminate\Database\QueryException;

class HistoryRepository
{
    protected $key;

    public function __construct(Keys $keys)
    {
        $this->key = $keys;
    }

    /**
     * fetch user history.
     *
     * @param array $data
     * @return @UserUsername
     */
    public function searchHistory(array $data): ?UserHistory
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
