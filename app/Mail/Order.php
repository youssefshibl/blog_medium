<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Order extends Mailable
{
    use Queueable, SerializesModels;


    public $key;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($key)
    {
        //
        $this->key = $key ;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.verify_email')->subject('verify your email')->with('key' , $this->key);
    }
}
