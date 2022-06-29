<?php

namespace App\Http\Controllers\Admin\Auth;

// use Illuminate\Support\Facades\Shop\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Farm;
use App\User;
use App\Plan;


class AdminsController extends Controller
{
/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // トップページ
    public function index(){

        $user = DB::table('users')->where('del_flg', '0')->get();

        return view('admins.home',[
            'users' => $user,
    
        ]);
        

    }

    
    // ユーザー一覧表示
    public function UserList(){

        $user = DB::table('users')->where('del_flg', '0')->get();

        return view('admins.home',[
            'users' => $user,
    
        ]);
    }


    //ユーザーの編集ボタンクリック
    public function usereditform(User $user) {

        return view('admins/ad_user_edit',[
            'user' => $user,
        ]);
    }
        
    // 登録情報編集　update 保存
    public function useredit(Request $request, User $user) {

        $columns = ['name', 'email', 'tel'];
        foreach($columns as $column) {
            $user->$column = $request->$column;
        }

        //不要な「_token」の削除
        unset($columns['_token']);

        //保存
        $user->fill($columns)->save();   

        $user = DB::table('users')->where('del_flg', '0')->get();

        return view('admins.home',[
            'users' => $user,
        ]);
    
    }

    //ユーザー 論理削除  
    public function updateuser(User $user) {

        //del_flgを１に変更
        $user->del_flg = '1';

        $user->save();

        $user = DB::table('users')->where('del_flg', '0')->get();

        return view('admins.home',[
            'users' => $user,
        ]);

    }



    
    //事業者リストの表示
    public function ShopList(){
        $farm = new Farm;

        $farms = $farm->where('del_flg', '0')->get();
        return view('admins/shoplist',[
            'farms' => $farms,
    
        ]);
    }



    //事業者詳細画面へ
    public function ShopDetail(Farm $farm){

        $plan = new Plan;

        $plans = $farm->plan()->where('del_flg', '0')->get();
        $posts = $farm->post()->where('del_flg', '0')->get();
        

        // var_dump($plans);
        return view('admins/shopdetail',[
            'farms' => $farm,
            'plan' => $plans,
            'post' => $posts,

        ]);
    }
    




// 



    //事業者の編集ボタンクリック
    public function shopeditform(Farm $farm) {

        return view('admins/ad_shop_edit',[
            'farm' => $farm,
        ]);
    }
        
    // 事業者登録情報編集　update 保存
    public function shopedit(Request $request, Farm $farm) {

        $columns = ['name', 'email', 'tel', 'address'];
        foreach($columns as $column) {
            $farm->$column = $request->$column;
        }

        //不要な「_token」の削除
        unset($columns['_token']);

        //保存
        $farm->fill($columns)->save();   

        $farm = DB::table('farms')->where('del_flg', '0')->get();

        return view('admins.shoplist',[
            'farms' => $farm,
        ]);
    
    }

    //事業者 論理削除  
    public function updateshopr(Farm $farm) {

        //del_flgを１に変更
        $farm->del_flg = '1';

        $farm->save();

        $farm = DB::table('farms')->where('del_flg', '0')->get();

        return view('admins.shoplist',[
            'farms' => $farm,
        ]);

    }
    


}
