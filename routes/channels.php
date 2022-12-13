<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('draft_entry', function ($user, $orderId) {
//    return $user->id === Order::findOrNew($orderId)->user_id;
    return true;
});

Broadcast::channel('scanner', function ($user, $orderId) {
//    return $user->id === Order::findOrNew($orderId)->user_id;
    return true;
});

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
