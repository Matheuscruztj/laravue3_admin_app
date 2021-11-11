<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RolesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('users', [UserController::class, 'index']);
// Route::get('users/{id}', [UserController::class, 'show']);
// Route::post('users', [UserController::class, 'store']);
// Route::put('users/{id}', [UserController::class, 'update']);
// Route::delete('users/{id}', [UserController::class, 'destroy']);

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('user', [UserController::class, 'user']);
    Route::put('users/info', [UserController::class, 'updateInfo']);
    Route::put('user/password', [UserController::class, 'updatePassword']);

    Route::apiResource('users', UserController::class);
    Route::apiResource('roles', RolesController::class);
});
