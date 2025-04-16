<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PasswordChangedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $username;
    public $newPassword;
    public $email;

    /**
     * Create a new message instance.
     */
    public function __construct($username, $newPassword, $email)
    {
        $this->username = $username;
        $this->newPassword = $newPassword;
        $this->email = $email;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Thông báo thay đổi mật khẩu - TechBoys',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.password_changed',
            with: [
                'username' => $this->username,
                'newPassword' => $this->newPassword,
                'email' => $this->email
            ]
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [];
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->to($this->email)
                   ->subject('Thông báo thay đổi mật khẩu - TechBoys')
                   ->view('emails.password_changed')
                   ->with([
                       'username' => $this->username,
                       'newPassword' => $this->newPassword,
                       'email' => $this->email
                   ]);
    }
}