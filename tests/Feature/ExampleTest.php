<?php

test('invoice is paid', function () {
    $invoice = (object) ['status' => 'paid'];
    expect($invoice)->toBePaid();
});
