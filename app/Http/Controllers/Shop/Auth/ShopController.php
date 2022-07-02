<?php

namespace App\Http\Controllers\Shop\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Farm;
use App\Post;
use App\Plan;
use App\Reserve;

use Illuminate\Support\Facades\DB;



class ShopController extends Controller
{
    public function __construct()
    {
        // farmテーブルに存在するユーザーのみのアクセス
        $this->middleware('auth:shop');
    }
    

    // 予約一覧表示　
    public function index(){
        $reserve = new Reserve;

        // 予約リストの取得
        $reserve = Auth::user()->reserve()->where('del_flg', '0')->paginate(5);
        
        // var_dump($reserve);
        return view('shops.home',[
            'reserves' => $reserve,
        ]);
    }

    // プラン一覧表示
    public function PlanList(){
        $farm = new Farm;

        // $farms = $farm->plan()->where('del_flg', '0')->get();
        $plans = Auth::user()->plan()->where('del_flg', '0')->paginate(5);
        $with = $farm->with('plan')->where('del_flg', '0')->get();

        // var_dump($plans);
        return view('shops.plan_list',[
            'plan' => $plans
        ]);
    }


    // プラン追加表示
    public function AddPlan() {

        // $plans = Auth::user()->plan()->where('del_flg', '0')->get();
        // var_dump($plans);
        return view('shops.add_plan',[
            // 'plan' => $plans
        ]);
    }    

    // プラン追加
    public function AddPlanFprm(Request $request) {

        $plan = new Plan;

        $columns = ['name','price','detail'];

        foreach($columns as $column){
            $plan->$column = $request->$column;
        }
        //ログインしたユーザーのIDも登録してあげる
        $plan->farm_id = Auth::user()->id;
        $plan->timestamps = false;        
        $plan->save(); //saveを実行

        $plans = Auth::user()->plan()->where('del_flg', '0')->get();

        return view('shops.plan_list',[
            'plan' => $plans,
        ]);

    }    
    

    //プラン　論理削除
    public function updateplan(Plan $plan) {

        $plan->del_flg = '1';
        $plan->timestamps = false;
        $plan->save();

        $plans = Auth::user()->plan()->where('del_flg', '0')->get();

        return view('shops.plan_list',[
            'plan' => $plans,
        ]);

    }
    
    



    // 登録情報編集　元の情報表示
    public function ShopEditForm() {
        
        return view('shops.shop_edit', [
            'user' => Auth::user()
        ]);
    }
    

// 一覧表示修正必要

    // 登録情報編集　update 保存
    public function ShopEdit(Request $request) {
        $farm = new Farm;
        $plan = new Plan;
        $reserve = new Reserve;


        $user_form = $request->all();
        $user = Auth::user();
        //不要な「_token」の削除
        unset($user_form['_token']);
        //保存
        $user->fill($user_form)->save();   


        $reserve = Auth::user()->plan()->where('del_flg', '0')->paginate(5);

        return view('shops.home',[
            'reserves' => $reserve,
        ]);
    }
        

}
