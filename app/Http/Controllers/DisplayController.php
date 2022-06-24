<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Plan;
use App\Farm;

use Illuminate\Support\Facades\DB;

class DisplayController extends Controller
{
    // 牧場一覧表示
    public function index(Farm $farm) {
        $plan = new Plan;

        // $all = $farm->all()->toArray();

        $plans = $plan->where('del_flg', '0')->get();
        $farms = $farm->where('del_flg', '0')->get();
        $farm_with_plan = $farm->with('plan')->where('del_flg', '0')->get();

        // $all = $farm->all()->toArray();
        
        $user_contacts = \DB::table('farms')
            // ->select('farms.id', 'plans.name', 'farms.name')
            ->join('plans', 'farms.id', '=', 'plans.farm_id')
            ->get();

        // $employees = $plan
        //     ->join('farms','plans.farm_id','=','farms.id')
        //     ->get();

            
// var_dump($farms);

        return view('farm_list',[
            'farms' => $farm_with_plan,
        ]);
    }

    
    // 詳細ボタン  IDで受け取り
    public function farm_list(Farm $farm){
        // var_dump($farm);

        return view('farm_detail',[
            'farms' => $farm,
        ]);
    }

    public function shop_login(){

        return view('shop_login',[

        ]);
    }






}
