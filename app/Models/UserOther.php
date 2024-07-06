<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOther extends Model
{
    use HasFactory;
    protected $table = 'user_other';
    protected $fillable = [
        'user_id',
        'bio',
        'bio_status',
        'verify_status',
        'verify',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
