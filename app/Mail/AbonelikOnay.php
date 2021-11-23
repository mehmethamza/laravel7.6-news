<?php

namespace App\Mail;

use App\Models\Subscribers;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AbonelikOnay extends Mailable
{
    use Queueable, SerializesModels;
    public $subscribers;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Subscribers $subscriber)
    {
        //
        $this -> subscribers = $subscriber;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->from("check@news.com")
        ->subject("Abonelik Onay Maili")
        ->view('emails.subscriber_onay');
    }
}
