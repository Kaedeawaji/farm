<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\User;
use App\Farm;
use App\Post;
use App\Plan;
use App\Reserve;
// use App\Http\Requests\CreateData;

use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    // 予約フォーム表示
    public function reserveForm(){

        return view('users/reserve',[
        ]);
    }

    // フォーム送信があった時POST
    public function reserve(Request $request, Plan $plan){
        $reserve = new Reserve;
        // $plan = new Plan;
        $farm = new Farm;


        $colums = ['day', 'time', 'body'];
        foreach($colums as $colum){
            $reserve->$colum = $request->$colum;
        }
        // とりあえずIDを指定している。そのプランのIDを渡せるように
        $reserve->plan_id = $plan->id;
        $reserve->farm_id = $plan->farm_id;

        $reserve->user_id = Auth::user()->id;


        Auth::user()->reserve()->save($reserve);

        return view('users/reserve_comp',[
        ]);
    }

    // 戻る→予約一覧画面へ 予約フォーム表示
    public function reserveList(){
        $plan = new Plan;

        $all = $plan->all()->toArray();
        $farmall = $farm->all()->toArray();

        // 予約リストの取得
        $reserve = Auth::user()->reserve()->where('del_flg', '0')->paginate(5);
        $farms = $farm->plan()->where('del_flg', '0')->get();

        return view('users/user_reslist',[
            'reserves' => $reserve,
            'plan' => $all,
            'farm' => $farmall
        ]);
    }

    // 予約 論理削除  update  
    public function updatereserve(Reserve $reserve) {

        $reserve->del_flg = '1';

        $reserve->save();

        $reserve = Auth::user()->reserve()->where('del_flg', '0')->get();

        return view('users/user_reslist',[
            'reserves' => $reserve,
        ]);


    }





    

// 口コミ投稿一覧表示
    public function postlist(){
        $posts = Auth::user()->post()->where('del_flg', '0')->paginate(5);

        return view('users/post_list',[
            'posts' => $posts,
        ]);
    }

    
    // 口コミフォーム表示リスト
    public function postForm(Post $post, Farm $farm){

        $post = Auth::user()->post()->where('del_flg', '0')->get();

        return view('users/post',[
            'posts' => $post

        ]);
    }

    // 口コミ投稿 post
    public function post(Request $request, Plan $plan){
        $post = new Post;
        $farm = new Farm;
        $reserve = new Reserve;

        $colums = ['star', 'title', 'img', 'body'];
        foreach($colums as $colum){
            $post->$colum = $request->$colum;
        }

        $post->farm_id = $plan->farm_id;
        $post->plan_id = $plan->id;

        Auth::user()->reserve()->save($post);

        $posts = Auth::user()->post()->where('del_flg', '0')->paginate(5);

        return view('users/post_list',[
            'posts' => $posts,
        ]);


    }



    //口コミ編集　元の情報表示
    public function editPostForm(Post $post) {

        $all = $post->where('del_flg', '0')->get();

        $posts = Auth::user()->post()->where('del_flg', '0')->get();

        return view('users/post_edit',[
            'result' => $post,
            'post' => $posts,
        ]);
    }



    //口コミ編集
    public function editpost(Post $post, Request $request) {

        $columns = ['star', 'title', 'img', 'body'];

        foreach($columns as $column){
            $post->$column = $request->$column;
        }
        //ログインしたユーザーのIDも登録してあげる
        $post->user_id = Auth::user()->id;

        $post->save(); //saveを実行

        $posts = Auth::user()->post()->where('del_flg', '0')->paginate(5);

        return view('users/post_list',[
            'posts' => $posts,
        ]);


    }

    //口コミ　論理削除
    public function updatepost(Post $post) {

        $post->del_flg = '1';

        $post->save();

        $posts = Auth::user()->post()->where('del_flg', '0')->paginate(5);

        return view('users/post_list',[
            'posts' => $posts,
        ]);

    }







    // 登録情報編集　元の情報表示
    public function UserEditForm() {

// var_dump($result); 

        return view('users/user_edit', [
            'user' => Auth::user()
        ]);
    }

    // 登録情報編集　update 保存
    public function UserEdit(Request $request) {

        $user_form = $request->all();
        $user = Auth::user();
        //不要な「_token」の削除
        unset($user_form['_token']);
        //保存
        $user->fill($user_form)->save();   

        return redirect('/');    
    }
        
        
        

}
