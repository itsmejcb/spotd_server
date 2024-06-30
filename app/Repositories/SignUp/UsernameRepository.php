<?php

namespace App\Repositories\SignUp;

use App\Models\UserUsername;
use Illuminate\Database\QueryException;

class UsernameRepository
{
    /**
     * Create a new user.
     *
     * @param array $data
     * @return UserUsername
     */
    public function create(array $data): UserUsername
    {
        try {
            // Attempt to create the user
            return UserUsername::updateOrCreate(
                ['user_id' => $data['user_id']], // Unique key to check existence
                $data // Data to insert or update
            );
        } catch (QueryException $e) {
            // Handle any database query exceptions if needed
            return null;
        }
    }
}
