<?php

it('can calculate total price', function () {
    $totalPrice = 150;
    expect($totalPrice)->toBe(150)->toBeInt();
});
