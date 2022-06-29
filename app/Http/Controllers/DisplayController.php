<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Plan;
use App\Farm;
use App\Post;


use Illuminate\Support\Facades\DB;

class DisplayController extends Controller
{
    // 牧場一覧表示
    public function index(Farm $farm) {
        $plan = new Plan;


        $plans = $plan->where('del_flg', '0')->get();
        $farms = $farm->where('del_flg', '0')->get();
        $farm_with_plan = $farm->with('plan')->where('del_flg', '0')->get();

        $employees = $plan
            ->join('farms','plans.farm_id','=','farms.id')
            ->where('plans.del_flg', '0')
            ->get();
            

        return view('farm_list',[
            'farms' => $farms,
        ]);
    }

    
    // 詳細ボタン  IDで受け取った牧場のプランを表示させたい
    public function farm_list(Farm $farm){
        $plan = new Plan;
        $post = new Post;


        $plans = $farm->plan()->where('del_flg', '0')->get();
        $posts = $farm->post()->where('del_flg', '0')->get();

// var_dump($posts);
        return view('farm_detail',[
            'farms' => $farm,
            'plan' => $plans,
            'post' => $posts,

        ]);
    }

    public function shop_login(){

        return view('shop_login',[

        ]);
    }






}
