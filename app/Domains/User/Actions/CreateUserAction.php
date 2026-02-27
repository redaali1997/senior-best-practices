<?php
namespace App\Domains\User\Actions;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class CreateUserAction {
    public function __construct(
        private AssignRoleAction $assignRoleAction
    ) {}

    public function __invoke(array $data): User {
        return DB::transaction(function () use ($data) {
            $user = User::create($data);

            ($this->assignRoleAction)($user, $data['role']);

            return $user;
        });
    }
}