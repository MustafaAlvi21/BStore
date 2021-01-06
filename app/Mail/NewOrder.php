<?php

namespace App\Mail;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Session;

class NewOrder extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        
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
        ->markdown("emails.orders.new")
        ->with([
             "order_id" => "#".Session::get("order_id")
            , "link" => "http://catchmango.com"
        ]);
    }
}
