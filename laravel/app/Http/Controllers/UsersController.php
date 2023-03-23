<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteUserRequest;
use App\Http\Requests\GetUserRequest;
use App\Http\Requests\SaveUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;


class UsersController extends Controller
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
        return $this->user::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function saveUser(SaveUserRequest $request)
    {
        return response()->json(
            [
                "status" => (bool)$this->user->saveUser($request->toArray())
            ],
            200
        );
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

        if (!isset($exists_user)) return response()->json([
            "Status"  => false,
            "Message" => throw new \Exception('This user does not exist.')
        ], 400);

        $update = $this->user->updateUser($request->toArray(), $exists_user['id']);

        if ($update) return response()->json([
            "Status" => (bool)$update
        ], 200);

        return response()->json([
            "Status" => (bool)$update,
            "Message" => "Nothing for update."
        ], 400);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteUser(DeleteUserRequest $request)
    {
        $exists_user = $this->user->getUserByEmail($request->email);

        if (!isset($exists_user)) return response()->json([
            "Status"  => false,
            "Message" => throw new \Exception('This user does not exist.')
        ], 400);

        $delete = $this->user->deleteUser($exists_user['email']);

        if ($delete) return response()->json([
            "Status" => (bool)$delete
        ], 200);

        return response()->json([
            "Status" => (bool)$delete,
            "Message" => "An error occurred while deleting, please try again later."
        ], 400);
    }
}
