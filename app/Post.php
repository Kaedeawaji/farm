<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $timestamps = false;

    protected $table = 'posts'; 

    protected $fillable = ['title','star','body', 'img', 'del_flg', 'user_id','farm_id','plan_id' ];
    //このカラムは書き換えOKという指定。（エラーが出る）     



    
    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }
    

    public function farm(){
        return $this->belongsTo('App\Farm','farm_id','id');
    }


    public function plan(){
        return $this->belongsTo('App\Plan','plan_id','id');
    }


}
