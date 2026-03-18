<?php

use App\Domains\User\Controllers\UserController;
use App\Events\UserRegistered;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// edit user
Route::put('users/{user}', function (Request $request, User $user) {
    $user->update($request->all());
    
    return response()->json([
        'status' => 'success',
        'message' => 'User updated successfully',
        'user' => $user
    ]);
});

Route::post('login', [AuthController::class, 'login'])->middleware('throttle:5,1');

// register user
Route::post('register', [UserController::class, 'store']);

Route::get('/health', function () {
    return response()->json([
        'status' => 'healthy',
    ]);
});