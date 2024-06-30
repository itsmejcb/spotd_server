<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCredentials extends Model
{
    use HasFactory;

    protected $table = 'user_credentials'; // Set the table name

    protected $fillable = [
        'user_id',
        'first_name',
        'middle_name',
        'last_name',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
