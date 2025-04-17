<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserUpdatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $username;
    public $changes;

    public function __construct($user, $username, $changes)
    {
        $this->user = $user;
        $this->username = $username;
        $this->changes = $changes;
    }

    public function build()
    {
        return $this->subject('Thông báo cập nhật tài khoản tại TechBoys')
                   ->view('emails.user-updated')
                   ->with([
                       'user' => $this->user,
                       'username' => $this->username,
                       'changes' => $this->changes
                   ]);
    }
}   