<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Contact;

class SendMailContact extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contact)
    {
        //
        $this->contact = $contact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //$contacts = Contact::all();
        $contact = $this->contact;
        
        return $this->view('welcome')
        ->cc([
            'linkhashimoto@hotmail.com'
        ])
        ->subject('Scarsphoto - Nova Mensagem')
        ->with(
            compact('contact')
        );
    }
}
