<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'id_post'
    ];
    protected $connection = 'mysql';
    protected $table      = 'user_posts';
}
