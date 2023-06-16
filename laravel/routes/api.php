<?php

use App\Http\Controllers\FileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
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
    Route::post('/get_all_user', 'getAllUsers');
    Route::post('/save_user', 'saveUser');
    Route::post('/update_user', 'updateUser');
    Route::post('/delete_user', 'deleteUser');
});

Route::controller(LoginController::class)->group(function () {
    Route::post('/login', 'login');
});

Route::controller(PostController::class)->group(function () {
    Route::post('/get_all_post', 'getAllPosts');
    Route::post('/get_post', 'getPost');
    Route::post('/update_post', 'updatePost');
    Route::post('/delete_post', 'deletePost');
    Route::post('/save_post', 'savePost');
});

Route::controller(FileController::class)->group( function(){
    Route::post('/save_file', 'saveFile');
    Route::post('/update_file', 'updateFile');
    Route::post('/get_file', 'getFile');
});