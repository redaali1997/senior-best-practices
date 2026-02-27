<?php

namespace App\Domains\User\Services;

use App\Domains\User\Contracts\UserServiceInterface;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserService implements UserServiceInterface
{
    public function store(array $data): User
    {
        return DB::transaction(function () use ($data) {
            $user = User::create($data);

            $user->profile()->create();

            return $user;
        });
    }
}
