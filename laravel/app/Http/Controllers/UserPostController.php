<?php

namespace App\Http\Controllers;

use App\Models\UserPost;
use App\Http\Requests\DeleteUserRequest;
use App\Http\Requests\GetUserRequest;
use App\Http\Requests\SaveUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserPostController extends Controller
{
    private $user;

    public function __construct()
    {
        $this->user = new User();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

}
