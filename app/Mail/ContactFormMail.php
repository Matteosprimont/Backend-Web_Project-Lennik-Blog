<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Http\Request;

class ContactFormMail extends Mailable
{
    public $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function build()
    {
        return $this->subject('Nieuw Contactformulier Bericht')
                    ->view('emails.contact');
    }
}
