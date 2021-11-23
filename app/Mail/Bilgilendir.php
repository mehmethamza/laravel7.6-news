<?php

namespace App\Mail;

use App\Models\Author;
use App\Models\Contents;
use App\Models\Subscribers;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Bilgilendir extends Mailable
{
    use Queueable, SerializesModels;
    public $content;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Contents $contents)
    {
        $this-> content = $contents;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this
        ->from("bilgilendir@news.com")
        ->subject("Yeni İçerik")
        ->view('emails.bilgilendir');
    }
}
