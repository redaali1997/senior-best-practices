<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', fn ($user, $id) => (int) $user->id === (int) $id);

Broadcast::private('admin.batch.{batchId}', fn ($user, $batchId) => $user->isAdmin());
