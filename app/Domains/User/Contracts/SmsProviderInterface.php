<?php

namespace App\Domains\User\Contracts;

interface SmsProviderInterface
{
    public function send(string $phoneNumber, string $message): bool;
}