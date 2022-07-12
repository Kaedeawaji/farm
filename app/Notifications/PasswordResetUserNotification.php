<?php

namespace App\Notifications;

use App\Mail\ResetPasswordMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Auth\Notifications\ResetPassword;

use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Mail;

class PasswordResetUserNotification extends ResetPassword
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

    // public function toMail($notifiable)
    // {
        // return (new MailMessage)
            // ->subject('パスワード初期化についてのお知らせ')
            // ->line('パスワード再設定ボタンを押してパスワードを再設定してください。')
            // ->action('パスワード再設定', url('Auth/password/reset'))
            // ->line('このメールに心当たりのない場合は破棄してください。');
    // }

    public function toMail($user)
    {
        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable, $this->token);
        }
        $url = url(route('password.reset',['token' => $this->token,'email' => $user->email],false));
        $mail = new ResetPasswordMail($user,$url);
        return $mail->to($user->email);
    }




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
