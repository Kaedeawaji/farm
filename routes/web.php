<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DisplayController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\Shop\ShopController;
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



Route::group(['middleware' => ['auth', 'can:user-higher']], function () {
    //GETで来たときはフォームを表示する
    //POST（フォーム送信）されたらDBへの登録処理


    //予約関連
    //詳細から予約フォームへ
    Route::get('/farm/{plan}detail', [DisplayController::class, 'farm_detail'])->name('farm.detail');
    Route::get('/reserve_form', [UsersController::class, 'reserveForm'])->name('reserve.form'); //予約フォームアクセス
    Route::post('/reserve_form', [UsersController::class, 'reserve']); //フォーム送信があったとき
    //user予約listを表示
    Route::get('/reserve_form_comp', [UsersController::class, 'reserveFormComp'])->name('reserve_comp.form'); //戻る
    //予約キャンセル 論理削除
    Route::get('/update_res/{reserve}', [UsersController::class, 'updatereserve'])->name('update.reserve');
    //user予約listを表示
    // Route::get('/update_comp', [UsersController::class, 'update_Comp']) //戻る

    

    //口コミ関連
    // 投稿
    Route::get('/post_form/{farm}', [UsersController::class, 'postForm'])->name('post.form'); //投稿フォームアクセス
    Route::post('/post_form/{farm}', [UsersController::class, 'post']); //フォーム送信があったとき
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


});













//パスワードリセット
Route::prefix('password')->group (function() {

    Route::get('/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

    


});


