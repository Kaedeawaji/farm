<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    public $timestamps = false;

    protected $table = 'reserves'; 
    
    protected $fillable = ['day', 'time', 'body', 'del_flg'];




    public function farm(){
        return $this->belongsTo('App\Farm','farm_id','id');
    }

    public function plan(){
        return $this->belongsTo('App\Plan','plan_id','id');
    }

    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }


}
