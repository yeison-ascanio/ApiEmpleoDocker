<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'login';
    public $timestamps    = false;

    protected $fillable = [
        'id',
        'token',
        'attempt',
        'last_login'
    ];

    /**
     * The function saves a login token with an attempt count and timestamp in a database table.
     * 
     * @param token The token parameter is a string that represents a unique identifier for a user's
     * login session. It is likely generated using a secure algorithm and is used to authenticate the
     * user's subsequent requests to the system.
     * 
     * @return the ID of the newly inserted record in the database table.
     */
    public function saveLogin($token){
        try {
            return $this->insertGetId([
                'token'      => $token,
                'attempt'    => 1,
                'last_login' => now()
            ]);
        } catch (\Exception $e) {
            return false;
        }
    }
}
