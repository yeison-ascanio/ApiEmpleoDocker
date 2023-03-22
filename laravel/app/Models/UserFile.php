<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFile extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'login';

    protected $fillable = [
        'id',
        'token',
        'attempt',
    ];

}
