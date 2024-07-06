<?php

namespace App\Repositories\Post;

use App\Class\Keys;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class PostRepository
{
    protected $key;

    public function __construct(Keys $keys)
    {
        $this->key = $keys;
    }

    /**
     * fetch user post viewed.
     *
     * @param array $data
     * @return Post
     */
    public function fetchPost(array $data): Post
    {
        try {
            // Attempt to create the user
            // TODO: add a bio,list of follower,list of following,list of post, if protected
            return Post::select([
                'posts.id',
                'user_username.username',
                DB::raw('CASE
            WHEN user_credentials.middle_name IS NOT NULL THEN CONCAT(user_credentials.first_name, " ", user_credentials.middle_name, " ", user_credentials.last_name)
            ELSE CONCAT(user_credentials.first_name, " ", user_credentials.last_name)
        END AS full_name'),
                DB::raw('CONCAT(users.uid, user_profile.ms, user_profile.extension) as profile'),
                'posts.content',
                DB::raw('GROUP_CONCAT(JSON_OBJECT("image", post_images.image, "status", post_images.status)) as images'),
                DB::raw('IFNULL(post_settings.post_type, "0") AS post_type'),
                DB::raw('IFNULL(post_settings.react_type, "0") AS react_type'),
                DB::raw('IFNULL(post_settings.comment_type, "0") AS comment_type'),
                DB::raw('IFNULL(pr.tl, "0") AS total_likes'),
                DB::raw('IFNULL(pc.tc, "0") AS total_comment'),
            ])
                ->leftJoin('users', 'posts.author_id', '=', 'users.id')
                ->leftJoin('user_credentials', 'posts.author_id', '=', 'user_credentials.user_id')
                ->leftJoin('user_username', 'posts.author_id', '=', 'user_username.user_id')
                ->leftJoin('user_profile', 'posts.author_id', '=', 'user_profile.user_id')
                ->leftJoin('post_images', 'posts.id', '=', 'post_images.post_id')
                ->leftJoin('post_settings', 'posts.id', '=', 'post_settings.post_id')
                ->leftJoin('post_tags', 'posts.id', '=', 'post_tags.post_id')
                ->leftJoin(DB::raw('(SELECT post_id, SUM(post_id) AS tl FROM post_reacts GROUP BY post_id) pr'), 'posts.id', '=', 'pr.post_id')
                ->leftJoin(DB::raw('(SELECT post_id, SUM(post_id) AS tc FROM post_comments GROUP BY post_id) pc'), 'posts.id', '=', 'pc.post_id')
                ->join('follows', 'follows.follower_id', '=', 'posts.author_id')
                ->where('posts.id', 1)
                ->groupBy('posts.id', 'user_username.username', 'full_name', 'posts.content', 'users.uid', 'user_profile.ms', 'user_profile.extension')
                ->limit(1)
                ->get();

        } catch (QueryException $e) {
            // Handle any database query exceptions if needed
            return null;
        }
    }
}
