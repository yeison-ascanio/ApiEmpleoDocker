<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table      = 'posts';
    public $timestamps    = false;

    protected $fillable   = [
        'title',
        'content',
        'location',
        'job_mission',
        'functions_position',
        'state',
        'created_at',
        'updated_at'
    ];

    /**
     * This function retrieves a post by its ID and returns it, or returns false if an exception
     * occurs.
     * 
     * @param id The parameter "id" is the unique identifier of a post that is being retrieved from the
     * database.
     * 
     * @return the result of a database query that retrieves a post with the specified ID. If the query
     * is successful, it will return the post data. If there is an error, it will return false.
     */
    public function getPost($id){
        try {
            return $this->where('id', $id)->first();
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * The function saves a post by inserting its title, content, and creation date into a database
     * table.
     * 
     * @param post The parameter `` is an array that contains the data of a post to be saved. It
     * should have a key named `data` which is also an array containing the `title`, `content`, and
     * `created_at` values of the post.
     * 
     * @return If an exception is caught, the function will return `false`. If the insertion is
     * successful, the function will not return anything.
     */
    public function savePost($post){
        try {
            return $this->insert([
                'title'              => $post['data']['title'],
                'content'            => $post['data']['content'],
                'location'           => $post['data']['location'],
                'job_mission'        => $post['data']['job_mission'],
                'functions_position' => $post['data']['functions_position'],
                'state'              => $post['data']['state'],
                'created_at'         => now(),
            ]);
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * This function deletes a post with a given ID and returns true if successful, false otherwise.
     * 
     * @param id The parameter "id" is the unique identifier of the post that needs to be deleted from
     * the database. The function uses this parameter to locate the post in the database and delete it.
     * 
     * @return the result of the delete operation on the database table where the 'id' column matches
     * the provided  parameter. If the delete operation is successful, it will return true. If there
     * is an error, it will catch the exception and return false.
     */
    public function deletePost($id){
        try {
            return $this->where('id', $id)->delete();
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * This PHP function updates a post in a database with new title, content, and updated_at values.
     * 
     * @param post The  parameter is an array that contains the updated data for a post. It has a
     * 'data' key that holds another array with the 'title' and 'content' keys, which respectively hold
     * the updated title and content of the post.
     * @param id The ID of the post that needs to be updated.
     * 
     * @return the result of the update query, which could be the number of rows affected by the update
     * operation. If the update operation fails, the function returns false.
     */
    public function updatePost($post, $id){
        try {
            return $this->where('id', $id)
            ->update([
                'title'              => $post['data']['title'],
                'content'            => $post['data']['content'],
                'location'           => $post['data']['location'],
                'job_mission'        => $post['data']['job_mission'],
                'functions_position' => $post['data']['functions_position'],
                'state'              => $post['data']['state'],
                'updated_at'         => now()
            ]);
        } catch (\Exception $e) {
            return false;
        }
    }
}
