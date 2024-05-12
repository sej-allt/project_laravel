<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use App\Models\EmailContent;

class RegistrationConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $studentName;
    public $studentKiId;
    public $emailContent;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($studentKaNamm,$studentKiId,$emailContent)
    {
        $this->studentName= $studentKaNamm;
        $this->studentKiId = $studentKiId;
        $this->emailContent= $emailContent;
    }
    public function content():Content{
         // Retrieve email content from the database
         //$emailContent = EmailContent::where('type', 'welcome')->first();
         return new Content(
            view: 'emails.registrationEmailMessage',
            with: [
                'studentName' => $this->studentName,
                'body' => $this->emailContent->body,
                'link' => $this->emailContent->link,
                'conclusion' => $this->emailContent->conclusion,
            ]
        );
    }

    /**
     * Build the message.
     *
     * @return $this
     */

}
