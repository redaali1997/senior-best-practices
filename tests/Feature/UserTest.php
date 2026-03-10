<?php

use App\Models\User;

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
