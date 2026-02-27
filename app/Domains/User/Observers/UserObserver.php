<?php

namespace App\Domains\User\Observers;

use App\Models\Log;
use App\Models\User;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        //
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        $changes = collect($user->getChanges())->except('updated_at');
        $logs = [];

        foreach ($changes as $key => $value) {
            $logs[] = [
                'user_id' => $user->id,
                'action' => 'updated',
                'field' => $key,
                'old_value' => $user->getOriginal($key),
                'new_value' => $value,
            ];
        }

        if ($changes->isNotEmpty()) {
            Log::insert($logs);
        }
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        //
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
