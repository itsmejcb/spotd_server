<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostImage extends Model
{
    use HasFactory;

    protected $table = 'post_image';

    protected $fillable = [
        'post_id',
        'image',
        'status',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
