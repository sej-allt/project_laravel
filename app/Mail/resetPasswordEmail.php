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
    // public $stu_name;
    public $token;
    public $emailContent;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public function __construct($stu_id, $token,$emailContent)
    {
        //$this->stu_name= $stu_name;
        $this->stu_id = $stu_id;
        $this->token = $token;
        $this->emailContent= $emailContent;
    }
    public function content():Content{
        return new Content(view:'emails.resetpasswordmessage',
                            with: ['stuId' => $this->stu_id,
                                        'body' => $this->emailContent->body,
                                        'link' => $this->emailContent->link,
                                        'conclusion' => $this->emailContent->conclusion]);
    }

    /**
     * Build the message.
     *
     * @return $this
     */

}
