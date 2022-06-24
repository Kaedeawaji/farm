<?php

namespace App;


// use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = ['name','price','detail','del_flg'];
    //このカラムは書き換えOKという指定。（エラーが出る）  
    
    protected $table = 'plans'; 


    public function reserve(){
        return $this->hasMany('App\Reserve');
    }


    public function post() {
        return $this->hasMany('App\Post');
    }


    public function farm(){
        return $this->belongsTo('App\Farm','farm_id','id');
    }


}
