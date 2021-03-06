<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReserveMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $inputs)
    {
        $this->name = $name;
        $this->email = $email;
        $this->inputs = $inputs;

    }

    /**
     * Build the message.
     *
     * @return $this
     */

    public function build()
    {
        return $this->to($this->email)
        ->subject('予約完了しました。')// 件名
        ->view('emails.reserve')  // 本文
        ->with([
            'name' => $this->name,
            'inputs' => $this->inputs
        ]); 
    }

}