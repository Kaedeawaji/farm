<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Mail\ShopResetPasswordMail;
use Illuminate\Auth\Notifications\ResetPassword as ResetPasswordNotification;

use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Mail;


class ShopPasswordResetNotification extends ResetPassword
{
    use Queueable;

    public $token;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable, $this->token);
        }
        $url = url(route('shop.password.reset',['token' => $this->token,'email' => $notifiable->email],false));
        $mail = new ShopResetPasswordMail($notifiable,$url);
        return $mail->to($notifiable->email);
    }

    // public function toMail($shop)
    // {
    //     if (static::$toMailCallback) {
    //         return call_user_func(static::$toMailCallback, $notifiable, $this->token);
    //     }
    //     $url = url(route('password.reset',['token' => $this->token,'email' => $shop->email],false));
    //     $mail = new ShopResetPasswordMail($shop,$url);
    //     return $mail->to($shop->email);
    // }





        // return (new MailMessage)
        //     ->line('You are receiving this email because we received a password reset request for your account.')
        //     ->action('Reset Password', url(config('app.url').route('shop.password.reset', $this->token, false)))
        //     ->line('If you did not request a password reset, no further action is required.');
    // }



    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
