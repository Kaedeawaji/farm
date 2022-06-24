<?php

namespace App\Http\Controllers\Shop\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Farm;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::SHOP_HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:shop')->except('logout');
    }

    public function showLoginForm()
    {
        return view('shops.auth.login');
    }

    protected function guard(){
        return Auth::guard('shop');
    }



    
    public function logout(Request $request)
    {
        Auth::guard('shop')->logout();  //変更
        $request->session()->flush();
        $request->session()->regenerate();
 
        return redirect('/shop/login');  //変更
    }




    
}

