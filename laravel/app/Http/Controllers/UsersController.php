<?php

namespace App\Http\Controllers;

use App\Http\Helper\Helper;
use App\Http\Requests\Users\DeleteUserRequest;
use App\Http\Requests\Users\GetUserRequest;
use App\Http\Requests\Users\SaveUserRequest;
use App\Http\Requests\Users\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class UsersController extends Controller
{
    private $user;
    private $helper;
    private $error;
    private $sucess;

    public function __construct()
    {
        $this->user   = new User();
        $this->helper = new Helper;
        $this->error  = 400;
        $this->sucess = 200;
    }

    /**
     * Display a listing of the resource.
     */
    public function getAllUsers()
    {
        try {
            return $this->user::all();
        } catch (\Exception $e) {
            return $this->helper->response(false, $this->error);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function saveUser(SaveUserRequest $request)
    {
        $state_save = (bool)$this->user->saveUser($request->toArray());

        if ($state_save) return $this->helper->response($state_save, $this->sucess);

        return $this->helper->response((bool)$state_save, $this->error);
    }

    /**
     * Display the specified resource.
     */
    public function getUser(GetUserRequest $request)
    {
        $state = $this->user->getUserById($request->id);

        if ($state) return $this->helper->response((bool)$state, $this->sucess, $state);

        return $this->helper->response((bool)$state, $this->error);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateUser(UpdateUserRequest $request)
    {
        $exist_user = $this->user->getUserByEmail($request->data['email']);

        if (!isset($exist_user)) return $this->helper->response(!(bool)$exist_user, $this->error, null, "This user doesn't exist.");

        $update = $this->user->updateUser($request->toArray(), $exist_user['id']);

        if ($update) return $this->helper->response((bool)$update, $this->sucess, null, "User updated successfully.");

        return $this->helper->response((bool)$update, $this->error, null, "Nothing for update");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteUser(DeleteUserRequest $request)
    {
        $exist_user = $this->user->getUserByEmail($request->email);

        if (!isset($exist_user)) return $this->helper->response((bool)$exist_user, $this->error, null, "This user doesn't exist.");

        $delete = $this->user->deleteUser($exist_user['email']);

        if ($delete) return $this->helper->response((bool)$delete, $this->sucess, null, "User deleted successfully");

        return $this->helper->response((bool)$delete, $this->error, null, "An error occurred while deleting, please try again later.");
    }
}
