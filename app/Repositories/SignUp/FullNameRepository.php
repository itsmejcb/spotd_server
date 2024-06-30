<?php

namespace App\Repositories\SignUp;

use App\Class\Keys;
use App\Class\Utils;
use App\Models\UserCredentials;
use Illuminate\Database\QueryException;

class FullNameRepository
{
    protected $key;
    protected $util;

    public function __construct(Keys $keys, Utils $utils)
    {
        $this->key = $keys;
        $this->util = $utils;
    }

    /**
     * Create a new user or update if conditions are met.
     *
     * @param array $data
     * @return UserCredentials|null
     */
    public function create(array $data): ?UserCredentials
    {
        try {
            // Retrieve the existing user by user_id
            $existingUser = UserCredentials::where('user_id', $data['user_id'])->first();

            if (!$existingUser) {
                // If no existing user, create a new one
                return UserCredentials::create($data);
            }

            $timestamp_created = $this->util->datetimeToMilliseconds($existingUser->updated_at);
            $current_timestamp = $this->util->getMS();
            $diff_seconds = ($current_timestamp - $timestamp_created) / 1000;
            $days_difference = $diff_seconds / (60 * 60 * 24);

            if ($days_difference > 5) {
                // Update user if last update was more than 5 days ago
                $existingUser->update($data);
            }

            // Return the existing user
            return $existingUser;

        } catch (QueryException $e) {
            // Handle any database query exceptions if needed
            return null;
        }
    }
}
