<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth ;
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

// Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
//     return (int) $user->id === (int) $id;
// });

Broadcast::channel('blog.channel.{user_id}', function ($user ,$user_id) {
    //return true ;
    return (int) $user->id === (int) $user_id;
});



Broadcast::channel('online', function ($user) {

    return [
        'id' => $user->id,
        'name' => $user->name,
        'email' => $user->email,
        'image' => $user->image->path ?? asset('image/me.jpg'),

    ];
});


Broadcast::channel('chat.channel.{user_id}', function ($user ,$user_id) {
     return true ;
    // return (int) $user->id === (int) $user_id;
});
