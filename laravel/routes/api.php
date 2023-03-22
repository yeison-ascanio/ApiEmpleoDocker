<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::controller(UsersController::class)->group(function () {
    Route::post('/get_user', 'getUser');
    Route::post('/save_user', 'saveUser');
    Route::post('/update_user', 'updateUser');
    Route::post('/delete_user', 'deleteUser');
});

Route::controller(LoginController::class)->group(function () {
    Route::post('/login', 'index');
});


