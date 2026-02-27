<?php

namespace App\Domains\User\Controllers;

use App\Domains\User\Requests\UserRequest;
use App\Domains\User\Contracts\UserServiceInterface;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function store(UserRequest $request, UserServiceInterface $userService)
    {
        return $userService->store($request->validated());
    }
}
