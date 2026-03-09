<?php

use App\Models\User;

it('update user', function () {
    $user = User::factory()->create([
        'name' => "Omar"
    ]);
    $response = $this->putJson('/api/users/' . $user->id, [
        'name' => 'Reda'
    ]);

    $response->assertOk();

    $this->assertDatabaseHas('users', [
        'name' => 'Reda'
    ]);
});
