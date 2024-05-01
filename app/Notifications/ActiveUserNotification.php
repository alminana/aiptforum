<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ActiveUserNotification extends Notification implements ShouldQueue
{
    use Queueable;
    private $userId;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($userId)
    {
        $this->userId=$userId;
    }


    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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
           'userId'=>$this->userId
        ];
    }
}
