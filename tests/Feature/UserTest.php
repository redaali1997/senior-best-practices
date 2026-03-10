<?php

use App\Events\UserRegistered;
use App\Models\User;
use Illuminate\Support\Facades\Event;

it('update user', function () {
    $user = User::factory()->create([
        'name' => 'Omar',
    ]);
    $response = $this->putJson('/api/users/'.$user->id, [
        'name' => 'Reda',
    ]);

    $response->assertOk();

    $this->assertDatabaseHas('users', [
        'name' => 'Reda',
    ]);
});

it('validates password field in login', function ($invalidPassword) {
    User::factory()->create([
        'email' => 'reda@reda.com',
    ]);

    $response = $this->postJson('/api/login', [
        'email' => 'reda@reda.com',
        'password' => $invalidPassword,
    ]);

    $response->assertStatus(422);
})->with(['', '123', '    ']);

it('trigger UserRegistered event', function () {
    Event::fake();

    $this->postJson('/api/register', [
        'name' => 'Omar',
        'email' => 'omar@omar.com',
        'password' => 'password',
    ]);

    Event::assertDispatched(UserRegistered::class);
});