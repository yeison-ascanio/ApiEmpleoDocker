<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

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
            $user = Auth::user();
            $token = $user->createToken('token')->plainTextToken;
            $cookie = cookie('cookie_token', $token, 60 * 24);
            return response()->json([
                "token" => $token,
                "status" => true
            ])->withOutCookie($cookie);
        } else {
            return response()->json([
                "status" => false,
                "data" => null,
                "message" => "Invalid credentials."
            ], 401);
        }
    }
}
