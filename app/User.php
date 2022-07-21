<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPassword; 
use App\Notifications\PasswordResetUserNotification;
use Illuminate\Support\Facades\Hash;

use Illuminate\Auth\Passwords\CanResetPassword;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users'; 


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'tel', 'del_flg'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function reserve(){
        return $this->hasMany('App\Reserve');
    }

    public function post(){
        return $this->hasMany('App\Post');
    }




       /**
    * パスワードリセット通知の送信
    *
    * @param  string  $token
    * @return void
    */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PasswordResetUserNotification($token));
        
    }



}

