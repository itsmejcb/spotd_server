<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'push_key',
        'content',
        'author_id',
    ];

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->hasMany(PostImage::class);
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
        return $this->hasOne(PostSetting::class);
    }

    public function savedByUsers()
    {
        return $this->hasMany(PostSaved::class);
    }

    public function views()
    {
        return $this->hasMany(PostView::class);
    }

    public function hiddenByUsers()
    {
        return $this->hasMany(PostHide::class);
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
