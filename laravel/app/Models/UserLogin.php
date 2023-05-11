<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLogin extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table      = 'user_login';
    public $timestamps    = false;
    protected $fillable   = [
        'id_user',
        'id_login'
    ];


    /**
     * This function saves the ID of a user and their login information to a database.
     * 
     * @param id_user The ID of the user who is logging in.
     * @param id_login The parameter `id_login` is likely an identifier for a user's login session or
     * credentials. It is being passed as an argument to the `saveLoginUser` function along with the
     * `id_user` parameter, which is likely the identifier for the user associated with the login
     * session. The function then
     * 
     * @return The `saveLoginUser` function is returning the result of the `insert` method, which is
     * likely a boolean value indicating whether the insertion was successful or not.
     */
    public function saveLoginUser($id_user, $id_login){
        try {
            return $this->insert([
                'id_user'  => $id_user,
                'id_login' => $id_login
            ]);
        } catch (\Exception $e) {
            return false;
        }
    }
}
