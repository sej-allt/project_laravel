<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;

class RegistrationConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $studentKiId;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($studentKiId)
    {
        $this->studentKiId = $studentKiId;
    }
    public function content():Content{
        return new Content(view:'emails.registrationEmailMessage');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    
}
