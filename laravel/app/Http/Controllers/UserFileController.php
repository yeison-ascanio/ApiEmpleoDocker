<?php

namespace App\Http\Controllers;

use App\Models\UserFile;
use App\Models\Login;
use App\Models\User;
use Illuminate\Http\Request;

class UserFileController extends Controller
{
    private $login;
    private $user;
    public function __construct()
    {
        $this->login = new Login();
        $this->user = new User();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UserFile $userFile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserFile $userFile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserFile $userFile)
    {
        //
    }
}
