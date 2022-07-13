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
    public function index(Farm $farm, Request $request) {
        $keyword = $request->input('keyword');

        $query = Farm::query();

        if(!empty($keyword)) {
            $query->where('name', 'LIKE', "%{$keyword}%");
        }

        $farms = $query->paginate(5);

        // $farms = $farm->where('del_flg', '0')->paginate(5);

        // return view('farm_list',[
        //     'farms' => $farms,
        //     'keyword' => $posts,
        // ]);
        return view('farm_list', compact('farms', 'keyword'));
    }

    
    // 詳細ボタン  IDで受け取った牧場のプランを表示させたい
    public function farm_list(Farm $farm){
        $plan = new Plan;
        $post = new Post;


        $plans = $farm->plan()->where('del_flg', '0')->get();
        $posts = $farm->post()->where('del_flg', '0')->paginate(5);

        // if (is_null($farm)) {
        //     abort(404);
        // }

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


    public function question(){

        return view('question',[
        ]);
    }




}
