<?php

namespace App;
// namespace App\Http\Controllers\Shop;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Farm extends Authenticatable

{
    use Notifiable;

    protected $table = 'farms'; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','address', 'tel', 'del_flg'
        // farm_id追加
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

    
    public function plan(){
        return $this->hasMany('App\Plan');
    }

    public function post(){
        return $this->hasMany('App\Post');
    }

    public function reserve() {
        return $this->hasMany('App\Reserve');
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPassword($token));
    }

}
