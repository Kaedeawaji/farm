<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        // ログインしてない状態でhomeにアクセスするとログイン画面に移動
        if (! $request->expectsJson()) {
            if($request->is('shop/*')) return route('shop.login');
            return route('login');
        }
    }
}
