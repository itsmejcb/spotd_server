<?php

namespace App\Repositories\Profile;

use App\Class\Keys;
use App\Models\UserCredentials;
use App\Models\UserProfile;
use App\Models\UserUsername;
use Illuminate\Database\QueryException;

class EditRepository
{
    protected $key;

    public function __construct(Keys $keys)
    {
        $this->key = $keys;
    }
    /**
     * edit user username.
     *
     * @param array $data
     * @return UserUsername
     */
    public function editUsername(array $data): UserUsername
    {
        try {
            // Attempt to create the user
            return UserUsername::updateOrCreate(
                [$this->key->UserID => $data[$this->key->UserID]], // Unique key to check existence
                $data // Data to insert or update
            );
        } catch (QueryException $e) {
            // Handle any database query exceptions if needed
            return null;
        }
    }

    /**
     * edit credentials such as first_name, middle_name and last_name.
     *
     * @param array $data
     * @return UserCredentials
     */
    public function editCredentials(array $data): UserCredentials
    {
        try {
            // Attempt to create the user
            return UserCredentials::updateOrCreate(
                [$this->key->UserID => $data[$this->key->UserID]], // Unique key to check existence
                $data // Data to insert or update
            );
        } catch (QueryException $e) {
            // Handle any database query exceptions if needed
            return null;
        }
    }
    /**
     * edit profile picture.
     *
     * @param array $data
     * @return UserProfile
     */
    public function editProfile(array $data): UserProfile
    {
        try {
            // Attempt to create the user
            return UserProfile::updateOrCreate(
                [$this->key->UserID => $data[$this->key->UserID]], // Unique key to check existence
                $data // Data to insert or update
            );
        } catch (QueryException $e) {
            // Handle any database query exceptions if needed
            return null;
        }
    }
}
