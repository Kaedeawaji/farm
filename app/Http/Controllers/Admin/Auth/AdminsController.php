<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Farm;
use App\User;
use App\Plan;
use App\Post;

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

        $user = DB::table('users')->where('del_flg', '0')->paginate(5);

        return view('admins.home',[
            'users' => $user,
    
        ]);
        

    }

    
    // ユーザー一覧表示
    public function UserList(Request $request){
        $keyword = $request->input('keyword');

        $query = User::query();

        if(!empty($keyword)) {
            $query->where('name', 'LIKE', "%{$keyword}%");
        }

        $users = $query->paginate(5);
        // $user = DB::table('users')->where('del_flg', '0')->paginate(5);
        // return view('admins.home',[
        //     'users' => $user,
    
        // ]);
        return view('admins.home', compact('users', 'keyword'));
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

        $user = DB::table('users')->where('del_flg', '0')->paginate(5);

        return view('admins.home',[
            'users' => $user,
        ]);
    
    }

    //ユーザー 論理削除  
    public function updateuser(User $user) {

        //del_flgを１に変更
        $user->del_flg = '1';

        $user->save();

        $user = DB::table('users')->where('del_flg', '0')->paginate(5);

        return view('admins.home',[
            'users' => $user,
        ]);

    }



    
    //事業者リストの表示
    public function ShopList(Request $request){

        $keyword = $request->input('keyword');

        $query = Farm::query();

        if(!empty($keyword)) {
            $query->where('name', 'LIKE', "%{$keyword}%");
        }

        $farms = $query->paginate(5);

        // $farms = $farm->where('del_flg', '0')->paginate(5);
        // return view('admins/shoplist',[
        //     'farms' => $farms,
        // ]);
        return view('farm_list', compact('farms', 'keyword'));

    }



    //事業者詳細画面へ
    public function ShopDetail(Farm $farm){

        $plan = new Plan;

        $plans = $farm->plan()->where('del_flg', '0')->get();
        $posts = $farm->post()->where('del_flg', '0')->paginate(5);
        

        // var_dump($plans);
        return view('admins/shopdetail',[
            'farms' => $farm,
            'plan' => $plans,
            'post' => $posts,

        ]);
    }
    

    // 修正必要


    //プラン 論理削除
    public function deleteplan(Plan $plan) {
        $farm = new Farm;
        // $post = new Post;

        $plan->del_flg = '1';
        $plan->timestamps = false;
        $plan->save();

        $farms = $farm->where('del_flg', '0')->paginate(5);

        
        return view('admins/shoplist',[
            'farms' => $farms,
        ]);

    }



    //プラン 論理削除
    public function deletepost(Post $post) {
        $farm = new Farm;

        $post->del_flg = '1';
        // $plan->timestamps = false;
        $post->save();

        $farms = $farm->where('del_flg', '0')->paginate(5);

        
        return view('admins/shoplist',[
            'farms' => $farms,
        ]);

    }
    // //口コミ　論理削除
    // public function updatepost(Post $post) {

    //     $post->del_flg = '1';

    //     $post->save();

    //     $posts = Auth::user()->post()->where('del_flg', '0')->get();

    //     return view('users/post_list',[
    //         'posts' => $posts,
    //     ]);

    // }









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

        $farm = DB::table('farms')->where('del_flg', '0')->paginate(5);

        return view('admins.shoplist',[
            'farms' => $farm,
        ]);
    
    }

    //事業者 論理削除  
    public function updateshopr(Farm $farm) {

        //del_flgを１に変更
        $farm->del_flg = '1';

        $farm->save();

        $farm = DB::table('farms')->where('del_flg', '0')->paginate(5);

        return view('admins.shoplist',[
            'farms' => $farm,
        ]);

    }
    



}
