<?php

namespace App\Listeners;

use App\Domains\User\Contracts\SmsProviderInterface;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendWelcomeSms
{
    /**
     * Create the event listener.
     */
    public function __construct(private SmsProviderInterface $smsService)
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $this->smsService->send($event->user->phone, 'مرحباً بك في نظامنا!');
    }
}
