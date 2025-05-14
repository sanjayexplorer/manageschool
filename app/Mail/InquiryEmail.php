<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Queue\SerializesModels;

class InquiryEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $msg;
    public $subject;
    public $senderEmail;

    public function __construct($msg, $subject, $senderEmail)
    {
        $this->msg = $msg;
        $this->subject = $subject;
        $this->senderEmail = $senderEmail;
    }

    public function envelope()
    {
        return new Envelope(
            from: new Address($this->senderEmail),
            subject: $this->subject,
        );
    }

    public function content()
    {
        \Log::info('Rendering the InquiryEmail view', [
            'view' => 'mails.inquiryemail',
            'msg' => $this->msg,
            'subject' => $this->subject,
            'senderEmail' => $this->senderEmail, 
        ]);

        return new Content(
            view: 'mails.inquiryemail',
            with: [
                'msg' => $this->msg,
                'subject' => $this->subject,
                'senderEmail' => $this->senderEmail, 
            ],
        );
    }

    public function attachments()
    {
        return [];
    }
}
