<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MailEnvia extends Mailable
{
    use Queueable, SerializesModels;
    private $name;

    /**
     * Create a new message instance.
     */
    public function __construct(string $name)
    {
        $this->name= $name;
    }

    /** Contruir a mensagem */
    public function build()
    {
        return $this->subject('My Test Email')
                    ->view('email.myHtmlEmail')
                    ->width([
                        'name'=> $this->name,
                    ]);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('ati.prip@usp.br','Informática PRIP'),
            subject: 'Mail Envia',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'view.name',
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
