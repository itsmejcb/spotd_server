<?php

namespace App\Repositories\Profile;

use App\Class\Keys;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class ProfileRepository
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
     * @return User
     */
    public function fetchProfile(array $data): User
    {
        try {
            // Attempt to create the user
            // TODO: add a bio,list of follower,list of following,list of post, if protected
            return User::select([
                'users.id',
                'user_username.username as username',
                DB::raw("CASE
                    WHEN user_credentials.middle_name IS NOT NULL THEN CONCAT(user_credentials.first_name, ' ', user_credentials.middle_name, ' ', user_credentials.last_name)
                    ELSE CONCAT(user_credentials.first_name, ' ', user_credentials.last_name)
                END AS full_name"),
                DB::raw("CONCAT(users.uid, user_profile.ms, user_profile.extension) AS profile"),
            ])
                ->leftJoin('user_credentials', 'users.id', '=', 'user_credentials.user_id')
                ->leftJoin('user_username', 'users.id', '=', 'user_username.user_id')
                ->leftJoin('user_profile', 'users.id', '=', 'user_profile.user_id')
                ->where('users.id', $data[$this->key->ID])
                ->first();

        } catch (QueryException $e) {
            // Handle any database query exceptions if needed
            return null;
        }
    }

    /**
     * Create a new user.
     *
     * @param array $data
     * @return User
     */
    public function fetchPost(array $data): User
    {
        try {
            // Attempt to create the user
            return Post::select([
                'posts.author_id',
                'posts.id',
                'post_image.image',
                'post_setting.post_type',
                'post_image.status AS censored',
                DB::raw('COUNT(post_image.image) AS total_count'),
                'posts.created_at',
            ])
                ->leftJoin('post_image', 'posts.id', '=', 'post_image.post_id')
                ->leftJoin('post_setting', 'posts.id', '=', 'post_setting.post_id')
                ->where('posts.author_id', $data[$this->key->ID])
                ->groupBy('posts.author_id', 'posts.id')
                ->orderBy('posts.created_at', 'DESC')
                ->get();

        } catch (QueryException $e) {
            // Handle any database query exceptions if needed
            return null;
        }
    }
}