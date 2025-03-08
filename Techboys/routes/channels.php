<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Log;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
Broadcast::channel('chat.{chatId}', function ($user = null, $chatId) {
    Log::info('Channel request:', ['user' => $user, 'chatId' => $chatId, 'guest_id' => session()->get('guest_id')]);

    if (Auth::check()) {
        return ['id' => $user->id]; 
    } elseif (session()->has('guest_id')) {
        return ['guest_id' => session()->get('guest_id')];
    }
    return false;
});

