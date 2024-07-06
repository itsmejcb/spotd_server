<?php

namespace App\Repository\Notification;

use App\Class\Keys;
use App\Models\UserNotification;
use Illuminate\Database\QueryException;

class NotificationRepository
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
     * @return UserNotification
     */
    public function fetchNotification(array $data): ?UserNotification
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
