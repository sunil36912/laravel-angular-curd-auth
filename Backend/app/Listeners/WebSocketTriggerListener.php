<?php

namespace App\Listeners;

use App\Events\MyEvent;
use App\Events\SomeEvent;
use App\Events\WebSocketTriggerEvent;
use App\Mail\UserRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class WebSocketTriggerListener
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
     * @param  WebSocketTriggerEvent  $event
     * @return void
     */
    public function handle(SomeEvent $event)
    {
        //Mail::to($event->user->email)->send(new UserRegistered($event));
    }
}
