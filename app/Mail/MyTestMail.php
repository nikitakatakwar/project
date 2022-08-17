<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MyTestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $Candidate;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($Candidate)
    {
        $this->Candidate = $Candidate;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Mail from nikitakatakwar165@gmail.com')
                    ->view('emails.myTestMail');
    }
}
