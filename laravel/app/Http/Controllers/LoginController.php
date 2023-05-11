<?php

namespace App\Http\Controllers;

use App\Http\Helper\Helper;
use App\Http\Requests\Login\LoginRequest;
use App\Models\Login;
use App\Models\UserLogin;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    private $helper;
    private $login;
    private $user_login;
    private $error;
    private $sucess;
    private $unauthorized;

    public function __construct()
    {
        $this->helper       = new Helper();
        $this->login        = new Login();
        $this->user_login   = new UserLogin();
        $this->unauthorized = 401;
        $this->error        = 400;
        $this->sucess       = 200;
    }

    /**
     * The function takes a LoginRequest object as a parameter, which is a form request object that
     * validates the request data. If the request data is valid, the function attempts to authenticate
     * the user using the email and password fields. If the authentication is successful, the function
     * creates a token for the user and returns the token and a status of true. If the authentication
     * is unsuccessful, the function returns a status of false and a null data field
     * 
     * @param LoginRequest request The request object.
     * @return A JSON response with a token and a status.
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {

            $user     = Auth::user();
            $token    = $user->createToken('token')->plainTextToken;
            $cookie   = cookie('cookie_token', $token, 60 * 24);
            $id_login = $this->login->saveLogin($token);

            $this->user_login->saveLoginUser($user->id, $id_login);

            return $this->helper->response(true, $this->sucess, $token)->withOutCookie($cookie);
            
        } else {
            return $this->helper->response(false, $this->unauthorized, null, "Invalid credentials.");
        }
    }
}
