<?php

namespace App\Mail;

use App\contact;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class ContactDetails extends Mailable
{
    use Queueable, SerializesModels;

    public $contact;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS', 'no-reply@catchmango.com'), env('MAIL_FROM_NAME', 'Catchmango'))
        ->subject("Contact Details - Catchmango")
        ->markdown("emails.contact.details")
        ->with([
             "link" => "http://catchmango.com"
        ]);
    }
}
