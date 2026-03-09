<?php

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

Route::post('login', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);
    
    return response()->json([
        'status' => 'success',
        'message' => 'Login successful',
    ]);
});