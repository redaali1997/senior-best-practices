<?php

namespace App\Services;

use App\Domains\User\Contracts\SmsProviderInterface;

class TwilioSmsService implements SmsProviderInterface
{
    public function send(string $phoneNumber, string $message): bool
    {
        // TODO: Implement Twilio SMS sending logic
        return true;
    }
}
