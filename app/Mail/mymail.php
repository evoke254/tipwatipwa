<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class mymail extends Mailable
{
    use Queueable, SerializesModels;

    public $mail_payload;

    public function __construct($mail_payload)
    {
       $this->mail_payload = $mail_payload;
    }

    public function build()
    {   
        $from = $this->mail_payload->get('email');

        $subject = "KEVIN FUNCTIONAL TEST MAIL";
        return $this->replyTo($from)
                    ->subject($subject)
                    ->view('mail');    
    }
}
