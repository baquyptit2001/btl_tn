<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMessage extends Mailable
{
    use Queueable, SerializesModels;

    public mixed $message;
    public mixed $content;

    /**
     * Create a new message instance.
     */
    public function __construct($message)
    {
        $this->message = $message;
        $this->content = $message['message'];
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $name = $this->message['name'];
        $email = $this->message['email'];
        return new Envelope(
            from: "$email",
            subject: $this->message['subject'],
        );
    }

/**
     * Build the message.
     */
    public function build() {
        return $this->view('emails.contact');
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
