<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderDetailMail extends Mailable
{
    use Queueable, SerializesModels;

    public $bill;
    public $billDetails;

    public function __construct($bill,$billDetails)
    {
        $this->bill = $bill;
        $this->billDetails = $billDetails;
    }

    public function build()
    {
        return $this->subject('Chi tiết đơn hàng')
            ->view('emails.bill-details')
            ->with([
                'bill' => $this->bill,
                'billDetails' => $this->billDetails ?? []
            ]);
    }
}
