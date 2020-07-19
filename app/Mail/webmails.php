<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class webmails extends Mailable
{
    use Queueable, SerializesModels;

    public $mail_payload;

    public function __construct($mail_payload)
    {
       $this->mail_payload = $mail_payload;
    }

    public function build()
    {        

       
        $subject = "KEVIN FUNCTIONAL TEST MAIL";
        return $this->subject($subject)
                    ->view('mail_to_client');
    }
}
