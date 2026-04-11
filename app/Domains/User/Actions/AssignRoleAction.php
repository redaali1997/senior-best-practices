<?php

namespace App\Domains\User\Actions;

use App\Models\User;

class AssignRoleAction
{
    public function __invoke(User $user, string $role)
    {
        $user->syncRoles($role);
    }
}
