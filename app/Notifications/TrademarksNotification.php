<?php

namespace App\Notifications;

use App\Models\TradeMarkTicket;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TrademarksNotification extends Notification
{
    use Queueable;
    //$request->Title,$request->discription,$request->date
    private $Title;
    private $discription;
    private $date;
    private $trademarks;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($Title,$discription,$date,$trademarks)
    {
        $this->Title = $Title; 
        $this->discription = $discription; 
        $this->date = $date; 
        $this->trademarks = $trademarks;
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
            'Title' => $this->Title,
            'discription' => $this->discription,
            'date' => $this->date,
            'trademarks' => $this->trademarks,         
        ];
    }
}
