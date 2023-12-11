<?php

namespace App\Mail;

use Illuminate\Mail\Mailables\Address;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class VolunteerMail extends Mailable
{
    use Queueable, SerializesModels;
    // public $toMail;
    public $content;
    // public $message;
    // public $projectId;

    /**
     * Create a new message instance.
     */
    public function __construct($content)
    {
        // $this->subject = $subject;
        // $this->message = $message;
        // $this->$projectId = $projectId;
        $this->content = $content;


    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address("pearliciahu@gmail.com", 'XYZ'),
            subject: $this->content->title
        );
    }


    /**
     * Get the message content definition.
     */
    public function content(): Content
    {

        return new Content(
            html: "mail.template",
            with: [
                'messageMail' => $this->content->title,
                'projectId' => $this->content->id,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
