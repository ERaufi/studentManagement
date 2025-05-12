<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});


Broadcast::channel('private-chat.{userId}', function ($user, $userId) {
    // return $user !== null;
    return (int) $user->id === (int) $userId;
});
