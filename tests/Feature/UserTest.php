<?php

use App\Domains\User\Actions\CreateUserAction;
use App\Events\UserRegistered;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Storage;

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

test('invalid emails', function ($invalidEmail) {
    User::factory()->create([
        'email' => 'reda@reda.com',
    ]);

    $this->postJson('/api/register', [
        'name' => 'Reda Ali',
        'email' => $invalidEmail,
        'password' => 'password',
    ])->assertInvalid('email');
})->with(['', 'reda@reda.com']);

it('create user with avatar', function () {
    Storage::fake('public');
    $avatar = UploadedFile::fake()->image('avatar.jpg');

    $user = (new CreateUserAction())([
        'name' => 'Reda Ali',
        'email' => 'reda@reda.com',
        'password' => 'password',
        'avatar' => $avatar
    ]);

    $this->assertDatabaseHas('users', [
        'email' => 'reda@reda.com',
    ]);

    Storage::disk('public')->assertExists($user->avatar);
});
