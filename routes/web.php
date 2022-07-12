<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DisplayController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\Shop\Auth\ShopController;
use App\Http\Controllers\Admin\Auth\AdminsController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

// 全員見れるページ
Route::get('/', [DisplayController::class, 'index'])->name('home');
Route::get('/farm_list/{farm}', [DisplayController::class, 'farm_list'])->name('detail.plan'); //一覧から詳細へ
Route::get('/question', [DisplayController::class, 'question'])->name('question'); //質問画面へ


Route::group(['middleware' => ['auth', 'can:user-higher']], function () {
    //GETで来たときはフォームを表示する
    //POST（フォーム送信）されたらDBへの登録処理

    //予約関連
    //詳細から予約フォームへ
    Route::get('/farm/{plan}detail', [DisplayController::class, 'farm_detail'])->name('farm.detail');
    Route::get('/reserve_form{plan}', [UsersController::class, 'reserveForm'])->name('reserve.form'); //予約フォームアクセス
    Route::post('/reserve_form{plan}', [UsersController::class, 'reserve']); //フォーム送信があったとき
    //user予約listを表示　navバーから
    Route::get('/reserve', [UsersController::class, 'resList'])->name('reslist'); //戻る

    //予約キャンセル 論理削除
    Route::get('/update_res/{reserve}', [UsersController::class, 'updatereserve'])->name('update.reserve');
    

    //口コミ関連
    // 投稿
    Route::get('/post_form/{plan}', [UsersController::class, 'postForm'])->name('post.form'); //投稿フォームアクセス
    Route::post('/post_form/{plan}', [UsersController::class, 'post']); //フォーム送信があったとき
    // 編集
    Route::get('/edit_form/{post}', [UsersController::class, 'editPostForm'])->name('edit.post');  //編集表示
    Route::post('/edit_form/{post}', [UsersController::class, 'editPost']);    
    // 論理削除
    Route::get('/update_pos/{post}', [UsersController::class, 'updatepost'])->name('update.post'); 
    // 一覧画面へ　listを表示
    Route::get('/post_list', [UsersController::class, 'postList'])->name('post.list'); //予約一覧画面へ


    // 登録情報編集
    // 表示
    Route::get('/user_edit_form', [UsersController::class, 'UserEditForm'])->name('user_edit.form'); //投稿フォームアクセス
    Route::post('/user_edit_form', [UsersController::class, 'UserEdit']); //フォーム送信があったとき


});





//事業者専用
// Route::group(['middleware' => ['auth', 'can:shop-higher']], function () {
    Route::prefix('shop')->namespace('shop')->name('shop.')->group (function() {
        Auth::routes();
        
    // ログイン後
    Route::get('/home', 'Auth\ShopController@index')->name('shop_home'); 

    // 予約一覧画面へ　listを表示
    Route::get('/res_list', [ShopController::class, 'ReserveList'])->name('res_list'); //予約一覧画面へ
    // 予約 論理削除
    Route::get('/update_res/{reserve}', [ShopController::class, 'updateres'])->name('update.res'); 
    
    // プラン一覧画面へ　listを表示
    Route::get('/plan_list', [ShopController::class, 'PlanList'])->name('plan_list'); //プラン一覧画面へ
    // 登録情報編集
    Route::get('/shop_edit_form', [ShopController::class, 'ShopEditForm'])->name('shop_edit_form');
    Route::post('/shop_edit_form', [ShopController::class, 'ShopEdit']); //フォーム送信があったとき

    // プラン追加
    Route::get('/add_plan', [ShopController::class, 'AddPlan'])->name('add_plan'); 
    Route::post('/add_plan', [ShopController::class, 'AddPlanFprm'])->name('plan_form'); 
    // 論理削除
    Route::get('/update_plan/{plan}', [ShopController::class, 'updateplan'])->name('update.plan'); 



    });
// });





// 管理者専用
Route::prefix('admin')->namespace('admin')->name('admin.')->group (function() {
    Auth::routes();
    // ログイン後
    Route::get('/home', 'Auth\AdminsController@index')->name('admin_home'); 

});
Route::prefix('admin')->group (function() {
// ユーザー一覧表示
Route::get('/user_list', [AdminsController::class, 'UserList'])->name('user_list'); 
// ユーザー情報編集
Route::get('/user_edit{user}', [AdminsController::class, 'usereditform'])->name('user_edit');
Route::post('/user_edit{user}', [AdminsController::class, 'useredit']); //フォーム送信があったとき
//ユーザー 論理削除
Route::get('/up_user/{user}', [AdminsController::class, 'updateuser'])->name('update.user');


// 事業者一覧表示
Route::get('/shop_list', [AdminsController::class, 'ShopList'])->name('shop_list');
Route::get('/shop_detail{farm}', [AdminsController::class, 'ShopDetail'])->name('shop_detail');
// 事業者情報編集
Route::get('/shop_edit{farm}', [AdminsController::class, 'shopeditform'])->name('shop_edit');
Route::post('/shop_edit{farm}', [AdminsController::class, 'shopedit']); //フォーム送信があったとき
// 事業者 論理削除
Route::get('/up_shop/{farm}', [AdminsController::class, 'updateshopr'])->name('update.shop');
// プラン 論理削除
Route::get('/plan/{plan}', [AdminsController::class, 'deleteplan'])->name('delete.plan'); 
// 口コミ 論理削除
Route::get('/post/{post}', [AdminsController::class, 'deletepost'])->name('delete.post'); 

});

// });




