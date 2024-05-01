<?php

namespace App\Listeners;
use App\Models\TradeMarkTicket;
use Illuminate\Support\Facades\Notification;
use App\Notifications\TrademarksNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendTradeMarkNotification
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
     * @param  object  $event
     * @return void
     */
    public function handle($trademark)
    {
        $admins = DB::table('messages')->whereNull('is_read')->get();
    Notification::send($admins, new TrademarksNotification($trademark->user));

    }
}
