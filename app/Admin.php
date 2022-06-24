<?php

namespace App;
// namespace App\Http\Controllers\Shop;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;


class Admin extends Authenticatable

{
    use Notifiable;

    protected $table = 'admins'; 


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    // public function reserve(){
    //     return $this->hasMany('App\Reserve');
    // }

    // public function post(){
    //     return $this->hasMany('App\Post');
    // }

}
