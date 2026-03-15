<?php

namespace App\Domains\User\Actions;

use App\Events\UserRegistered;
use App\Jobs\SendWelcomeEmailJob;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CreateUserAction
{
    public function __invoke(array $data): User
    {
        return DB::transaction(function () use ($data) {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);

            // 3. Upload Avatar
            if (isset($data['avatar']) && is_file($data['avatar'])) {
                $path = $data['avatar']->store('avatars', 'public');
                $user->update(['avatar' => $path]);
            }

            UserRegistered::dispatch($user);

            return $user;
        });
    }
}
