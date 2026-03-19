<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;
use Throwable;

class SendWelcomeEmailJob implements ShouldQueue
{
    use Queueable;

    public $tries = 3;
    public $backoff = 120;

    /**
     * Create a new job instance.
     */
    public function __construct(public User $user)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Sending email here
    }

    public function failed(Throwable $throwable) {
        Log::error("Failed to send welcome email to user {$this->user->id}: {$throwable->getMessage()}");
    }
}
