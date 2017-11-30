<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MechanicAcceptMail extends Mailable
{
    use Queueable, SerializesModels;

    public $mechanicName;
    public $customerName;
    public $subject = 'Your reservation has been accepted';

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mechanicName, $customerName)
    {
        $this->mechanicName = $mechanicName;
        $this->customerName = $customerName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.mechanic-accept');
    }
}
