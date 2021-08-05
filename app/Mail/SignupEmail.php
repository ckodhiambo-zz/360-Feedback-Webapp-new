<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SignupEmail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct($data)
    {
        $this->email_data = $data;
    }

    public function build()
    {
        return $this->subject("Welcome to the 360 Feedback Platform!")
            ->view('mail.signup-email', ['email_data' => $this->email_data]);
    }
}
