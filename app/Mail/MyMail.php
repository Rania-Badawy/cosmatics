<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $userName;
    public $subject;
    public $userMessage;

    public function __construct($name, $subject, $message)
    {
        $this->userName    = $name;
        $this->subject     = $subject;
        $this->userMessage = $message;
    }

    public function build()
    {
        return $this->view('emails.myemail')
                    ->subject($this->subject)
                    ->with([
                        'name'    => $this->userName,
                        'message' => $this->userMessage
                    ]);
    }
}
