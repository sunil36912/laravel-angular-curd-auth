<?php

namespace App\Listeners;

use App\Events\SomeEvent;
use App\Notifications\UserRegisterNotification;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class UserRegisterListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SomeEvent  $event
     * @return void
     */
    public function handle(SomeEvent $event)
    {
        /*  $user = $event->user;
        $users = User::all();
        Notification::send($users, new UserRegisterNotification($user));
        */
    }
}
