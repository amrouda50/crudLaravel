<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FormMail extends Mailable
{
    use Queueable, SerializesModels;
    public $mailData;
    private $file;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mailData, $file)
    {
        $this->mailData = $mailData;
        $this->file = $file;
       // dd($this->mailData);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.form')->attach($this->file);
    }
}
