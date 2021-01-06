<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class OrderDetails extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS', 'no-reply@catchmango.com'), env('MAIL_FROM_NAME', 'Catchmango'))
        ->subject("Order Details - Catchmango")
        ->markdown("emails.orders.details")
        ->with([
              "name" => Auth::user()->name
            , "order_id" => "#".Session::get("order_id")
            , "link" => "http://catchmango.com"
        ]);
    }
}
