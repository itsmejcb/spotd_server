<?php

namespace App\Repository\Notification;

use App\Class\Keys;
use App\Models\UserNotification;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

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
            // First query
            $query1 = DB::table('notification as nt')
                ->select(DB::raw("
            DISTINCT nt.id,
            nt.following_id,
            NULL AS post,
            uu.username,
            CASE
                WHEN uc.middle_name IS NOT NULL THEN CONCAT(uc.first_name, ' ', uc.middle_name, ' ', uc.last_name)
                ELSE CONCAT(uc.first_name, ' ', uc.last_name)
            END AS full_name,
            CONCAT(u.uid, up.ms, up.extension) AS profile,
            nt.status,
            nt.type
            "))
                ->leftJoin('users as u', 'nt.following_id', '=', 'u.id')
                ->leftJoin('user_credentials as uc', 'nt.following_id', '=', 'uc.user_id')
                ->leftJoin('user_username as uu', 'nt.following_id', '=', 'uu.user_id')
                ->leftJoin('user_profile as up', 'nt.following_id', '=', 'up.user_id')
                ->where('nt.user_id', $data[$this->key->UserID]);

            // Second query
            $query2 = DB::table('notification as nt')
                ->select(DB::raw("
            DISTINCT nt.id,
            NULL AS following_id,
            nt.post_id,
            uu.username,
            CASE
                WHEN uc.middle_name IS NOT NULL THEN CONCAT(uc.first_name, ' ', uc.middle_name, ' ', uc.last_name)
                ELSE CONCAT(uc.first_name, ' ', uc.last_name)
            END AS full_name,
            CONCAT(u.uid, up.ms, up.extension) AS profile,
            nt.status,
            nt.type
            "))
                ->leftJoin('posts as pt', 'nt.post_id', '=', 'pt.id')
                ->leftJoin('users as u', 'nt.following_id', '=', 'u.id')
                ->leftJoin('user_credentials as uc', 'nt.following_id', '=', 'uc.user_id')
                ->leftJoin('user_username as uu', 'nt.following_id', '=', 'uu.user_id')
                ->leftJoin('user_profile as up', 'nt.following_id', '=', 'up.user_id')
                ->where('nt.user_id', $data[$this->key->UserID]);

            // Union the queries
            $results = $query1->unionAll($query2)->get();

            // You can limit the results if needed
            return $results->slice(0, 10);

        } catch (QueryException $e) {
            // Handle any database query exceptions if needed
            return null;
        }
    }
}
