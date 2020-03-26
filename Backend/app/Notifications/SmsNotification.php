<?php

namespace App\Notifications;

use App\User;
use Tzsk\Sms\SmsBuilder;
use Illuminate\Bus\Queueable;
use Tzsk\Sms\Channels\SmsChannel;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;

class SmsNotification extends Notification
{
    use Queueable;
    public $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [SmsChannel::class];
    }

    /**
     * Get the repicients and body of the notification.
     *
     * @param  mixed  $notifiable
     * @return SmsBuilder
     */
    public function toSms($notifiable)
    {

        return (new SmsBuilder) # via() is Optional
            ->send('this message by sunil')
            ->to([$notifiable->phone, +919467863431]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
