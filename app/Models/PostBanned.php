<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostBanned extends Model
{
    use HasFactory;

    protected $fillable = ['post_id', 'banned_id', 'report_queue'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
