<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserUpdatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $username;
    public $changes;

    public function __construct($name, $username, $changes)
    {
        $this->name = $name;
        $this->username = $username;
        $this->changes = $changes;
    }

    public function build()
{
    return $this->subject('Thông báo cập nhật tài khoản tại TechBoys')
               ->view('emails.user-updated') 
               ->with([
                   'name' => $this->name,
                   'username' => $this->username,
                   'changes' => $this->changes
               ]);
}
}