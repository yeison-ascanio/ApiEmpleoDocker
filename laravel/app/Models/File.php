<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    public $timestamps    = false;
    protected $connection = 'mysql';
    protected $table      = 'files';
    protected $fillable   = [
        'name',
        'route',
        'created_at',
        'updated_at'
    ];

    /**
     * The function saves a file by inserting its name, route, and creation time into a database table.
     * 
     * @param file The parameter `` is likely an array that contains information about a file that
     * needs to be saved. It probably has a structure similar to this:
     * 
     * @return If an exception is caught, the function will return `false`. If no exception is caught,
     * the function will not return anything explicitly, but it will execute the `insertGetId` method
     * on the object and save the file data to the database.
     */
    public function saveFile($file)
    {
        try {
            return $this->insertGetId([
                'name'       => $file['data']['name'],
                'route'      => $file['data']['route'],
                'created_at' => now()
            ]);
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * This function updates a file's name, route, and updated_at timestamp in a database table
     * based on its ID.
     * 
     * @param file The `` parameter is likely an array that contains information about a file,
     * such as its name and route. It is used to update a record in a database table that corresponds
     * to the file's ID.
     * @param id The parameter "id" is the identifier of the file that needs to be updated. It is used
     * to locate the file in the database and update its information.
     * 
     * @return the result of the update query, which is either the number of rows affected or false if
     * an exception is caught.
     */
    public function updateFile($file, $id)
    {
        try {
            return $this->where('id', $id)
                ->update([
                    'name'       => $file['data']['name'],
                    'route'      => $file['data']['route'],
                    'updated_at' => now()
                ]);
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * This function retrieves a file by its ID and returns it, or returns false if an exception
     * occurs.
     * 
     * @param id The parameter "id" is the identifier of a file that is being searched for in a
     * database. The function "getFile" is used to retrieve a file record from the database based on
     * its unique identifier.
     * 
     * @return the file with the given ID if it exists in the database, and if not, it returns false.
     */
    public function getFile($id)
    {
        try {
            return $this->where('id', $id)->first();
        } catch (\Exception $e) {
            return false;
        }
    }
}
