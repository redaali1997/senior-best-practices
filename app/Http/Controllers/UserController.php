<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Contracts\UserServiceInterface;

class UserController extends Controller
{
    public function store(UserRequest $request, UserServiceInterface $userService)
    {
        return $userService->store($request->validated());
    }
}
