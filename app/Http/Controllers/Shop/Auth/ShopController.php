<?php

namespace App\Http\Controllers\Shop\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;



// use App\Post;
// use App\Plan;
// use App\Reserve;

use Illuminate\Support\Facades\DB;



class ShopController extends Controller
{
    public function __construct()
    {
        // farmテーブルに存在するユーザーのみのアクセス
        $this->middleware('auth:shop');
    }
    
    //ログイン後予約リストへ
    public function index(){
        // $plan = new Plan;
        // $all = $plan->all()->toArray();
        
        return view('shops.home',[
            // 'plans' => $all,
        ]);
    }

}
