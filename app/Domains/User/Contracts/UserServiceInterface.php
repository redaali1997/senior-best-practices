<?php

namespace App\Domains\User\Contracts;

use App\Models\User;

interface UserServiceInterface
{
    public function store(array $data): User;
}
