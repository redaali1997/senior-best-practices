<?php

namespace App\Domains\User\Controllers;

use App\Domains\User\Actions\CreateUserAction;
use App\Domains\User\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return User::with('profile:user_id,bio')->get();
    }

    public function store(UserRequest $request, CreateUserAction $createUserAction)
    {
        return $createUserAction($request->validated());
    }
}
