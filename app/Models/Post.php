<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'push_key',
        // 'title',
        'content',
        'author_id',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function images()
    {
        return $this->hasMany(PostImage::class, 'post_id');
    }

    public function reacts()
    {
        return $this->hasMany(PostReact::class);
    }

    public function comments()
    {
        return $this->hasMany(PostComment::class);
    }

    public function settings()
    {
        return $this->hasOne(PostSetting::class, 'post_id');
    }

    public function savedByUsers()
    {
        return $this->belongsToMany(User::class, 'post_saved', 'post_id', 'user_id')
            ->withTimestamps();
    }

    public function views()
    {
        return $this->hasMany(PostView::class);
    }

    public function hiddenByUsers()
    {
        return $this->belongsToMany(User::class, 'post_hide', 'post_id', 'user_id')
            ->withTimestamps();
    }

    public function reports()
    {
        return $this->hasMany(PostReport::class);
    }

    public function bannedUsers()
    {
        return $this->hasMany(PostBanned::class);
    }

}
