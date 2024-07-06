<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostSetting extends Model
{
    use HasFactory;

    protected $table = 'post_setting';

    protected $fillable = [
        'post_id',
        'post_type',
        'react_type',
        'comment_type',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}