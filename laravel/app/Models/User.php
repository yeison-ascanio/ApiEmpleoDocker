<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\Authenticatable;


class User extends Model implements Authenticatable
{
    use HasFactory;
    use HasApiTokens;
    protected $connection = 'mysql';
    protected $table = 'users';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'email',
        'password',
        'last_name',
        'type',
        'image',
        'address'
    ];

    protected $hidden = [
        'password',
    ];

    /**
     * > Get a user by their id
     * 
     * @param id The id of the user you want to get.
     * 
     * @return The user with the id of 
     */
    public function getUserById($id)
    {
        try {
            return $this->where('id', $id)->first();
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * > Get the user by email
     * 
     * @param email email address of the user you want to retrieve.
     * 
     * @return user first user with the email address of .
     */
    public function getUserByEmail($email)
    {
        try {
            return $this->where('email', $email)->first();
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * It takes a user array, and inserts it into the database
     * 
     * @param array user user object that contains the user's information.
     * 
     * @return bool
     */
    public function saveUser($user)
    {
        try {
            return $this->insert([
                'name'       => $user['data']['name'],
                'email'      => $user['data']['email'],
                'password'   => Hash::make($user['data']['password']),
                'last_name'  => $user['data']['last_name'],
                'type'       => $user['data']['type'],
                'image'      => $user['data']['image'],
                'address'    => $user['data']['address']
            ]);
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * It updates the user with the given id with the given user data
     * 
     * @param user The user object that contains the data to be updated.
     * @param id The id of the user you want to update.
     * 
     * @return bool status updated user.
     */
    public function updateUser($user, $id)
    {
        try {
            return $this->where('id', $id)
                ->update([
                    'name'       => $user['data']['name'],
                    'email'      => $user['data']['email'],
                    'password'   => $user['data']['password'],
                    'last_name'  => $user['data']['last_name'],
                    'type'       => $user['data']['type'],
                    'image'      => $user['data']['image'],
                    'address'    => $user['data']['address']
                ]);
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * > Delete a user from the database
     * 
     * @param email The email address of the user to delete.
     * 
     * @return bool status delete
     */
    public function deleteUser($email)
    {
        try {
            return $this->where('email', $email)->delete();
        } catch (\Exception $e) {
            return false;
        }
    }

    //interface methods to use auth

    public function getAuthIdentifierName()
    {
        return 'email';
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    public function getAuthIdentifier()
    {
        return $this->id;
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberTokenName($name)
    {
        $this->rememberTokenName = $name;
    }
}
