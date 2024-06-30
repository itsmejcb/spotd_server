<?php

namespace App\Repositories\SignUp;

use App\Models\UserProfile;
use Illuminate\Database\QueryException;

class ProfileRepository
{
    /**
     * Create a new user.
     *
     * @param array $data
     * @return UserProfile
     */
    public function create(array $data): UserProfile
    {
        try {
            // Attempt to create the user
            return UserProfile::updateOrCreate(
                ['user_id' => $data['user_id']], // Unique key to check existence
                $data // Data to insert or update
            );
        } catch (QueryException $e) {
            // Handle any database query exceptions if needed
            return null;
        }
    }
}
