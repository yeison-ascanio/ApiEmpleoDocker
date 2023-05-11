<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPost extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table      = 'user_post';
    public $timestamps    = false;
    protected $fillable   = [
        'id_user',
        'id_post'
    ];

    /**
     * This function saves a post user by inserting their ID and the post ID into a database table.
     * 
     * @param data The `` parameter is an array that contains information about the user who is
     * saving the post. It likely includes the user's ID, name, and other relevant details.
     * @param id_post The ID of the post that the user is associated with.
     */
    public function savePostUser($data, $id_post){
        try {
            return $this->insert([
                'id_post' => $id_post,
                'id_user' => $data['data']['id_user']
            ]);
        } catch (\Exception $e) {
            return false;
        }
    }
}
