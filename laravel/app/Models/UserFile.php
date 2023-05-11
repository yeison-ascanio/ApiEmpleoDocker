<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFile extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table      = 'user_files';
    public $timestamps    = false;
    protected $fillable   = [
        'id',
        'id_user',
        'id_file',
    ];

    public function saveUserFile($id_user, $id_file){
        try {
            return $this->insert([
                'id_user' => $id_user['data']['id_user'],
                'id_file' => $id_file
            ]);
        } catch (\Exception $e) {
            return false;
        }
    }
}
