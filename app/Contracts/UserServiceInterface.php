<?php

namespace App\Contracts;

use App\Models\User;

interface UserServiceInterface {
    public function store(array $data): User;
}