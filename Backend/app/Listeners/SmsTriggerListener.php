<?php

namespace App\Listeners;

use App\Events\MyEvent;
use App\Events\SomeEvent;
use App\Events\WebSocketTriggerEvent;
use App\Notifications\SmsNotification;
use App\User;
use Facade\FlareClient\Http\Exceptions\NotFound;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class SmsTriggerListener
{
    public $user;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Handle the event.
     *
     * @param  WebSocketTriggerEvent  $event
     * @return void
     */
    public function handle(SomeEvent $event)
    {


        /* $user = $event->user;
        $user->notify(new SmsNotification($user));*/
    }
}
