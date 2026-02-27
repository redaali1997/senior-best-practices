<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserService
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
