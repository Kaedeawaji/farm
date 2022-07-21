<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ShopResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = 'パスワード変更のご案内';

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($shop,$url)
    {
        $this->shop = $shop;
        $this->url = $url;    
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $result =  $this->view('emails.shop_reset_password',[
            'shop'=>$this->shop,
            'url'=>$this->url
        ]);
        return $result;
    }
}

