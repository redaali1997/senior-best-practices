<?php

it('can login', function () {
    $response = $this->postJson('api/login', [
        'email' => 'reda@reda.com',
        'password' => 'password',
    ]);

    $response->assertStatus(200)->assertJson([
        'status' => 'success',
        'message' => 'Login successful',
    ]);
});
