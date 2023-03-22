<?php

namespace App\Http\Controllers;

use App\Models\UserPost;
use App\Http\Requests\DeleteUserRequest;
use App\Http\Requests\GetUserRequest;
use App\Http\Requests\SaveUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Users;
use Illuminate\Http\Request;

class UserPostController extends Controller
{
    private $user;

    public function __construct()
    {
        $this->user = new Users();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function saveUser(SaveUserRequest $request)
    {
        $exists_user = $this->user->getUserByEmail($request->email);

        if (isset($exists_user)) return response()->json(throw new \Exception('This user already exist.'), 400);

        return response()->json($this->user->saveUser($request->toArray()), 200);
    }

    /**
     * Display the specified resource.
     */

    public function getUser(GetUserRequest $request)
    {
        return response()->json($this->user->getUserById($request->id));
    }

    /**
     * Update the specified resource in storage.
     */

    public function updateUser(UpdateUserRequest $request)
    {
        $exists_user = $this->user->getUserByEmail($request->email);

        if (!isset($exists_user)) return response()->json(throw new \Exception('This user does not exist.'), 400);

        return response()->json($this->user->updateUser($request->toArray(), $exists_user['id']), 200);

    }

    /**
     * Remove the specified resource from storage.
     */

    public function deleteUser(DeleteUserRequest $users)
    {
        //
    }
}
