<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class resetPasswordEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
     use Queueable, SerializesModels;

    public $stu_id;
    public $token;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public function __construct($stu_id, $token)
    {
        $this->stu_id = $stu_id;
        $this->token = $token;
    }
    public function content():Content{
        return new Content(view:'emails.resetpasswordmessage');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    
}
