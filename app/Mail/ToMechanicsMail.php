<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ToMechanicsMail extends Mailable
{
    use Queueable, SerializesModels;

    public $location;
    public $subject = "New Reservation Request";

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($location)
    {
        $this->location = $location;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.to-mechanics');
    }
}
