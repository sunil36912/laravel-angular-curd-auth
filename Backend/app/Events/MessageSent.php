<?php

namespace App\Events;

use App\User;
use App\Message;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * User that sent the message
     *
     * @var User
     */
    public $user;

    /**
     * Message details
     *
     * @var Message
     */
    public $message;
    public $resptent;
    public $id;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, $message,   $resptent)
    {
        $this->user = $user;
        $this->message = $message;
        $this->id = $resptent['id'];
        $this->resptent = $resptent;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('chat.' . $this->id);
    }
}
