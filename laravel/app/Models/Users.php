<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Users extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'users';

    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'last_name',
        'type',
        'last_login',
        'image',
        'address'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getUserById($id)
    {
        return $this->where('id', $id)->get();
    }

    public function getUserByEmail($email)
    {
        return $this->where('email', $email)->first();
    }

    public function saveUser($user)
    {
        return $this->insert([
            'name'       => $user['name'],
            'email'      => $user['email'],
            'password'   => $user['password'],
            'last_name'  => $user['last_name'],
            'type'       => $user['type'],
            'last_login' => $user['last_login'],
            'image'      => $user['image'],
            'address'    => $user['address']
        ]);
    }

    public function updateUser($user, $id)
    {
        return $this->where('id', $id)
            ->update([
                'name'       => $user['name'],
                'email'      => $user['email'],
                'password'   => $user['password'],
                'last_name'  => $user['last_name'],
                'type'       => $user['type'],
                'last_login' => $user['last_login'],
                'image'      => $user['image'],
                'address'    => $user['address']
            ]);
    }
}
