<?php

namespace App\Http\Middleware\admin;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class IsLoginAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (request()->is('admin/login')) {
            if(Session::get('admin_id') == null && Session::get('admin_home') == null) {
                return $next($request);
            } else {
                Session::flash('error', "Bạn đã đăng nhập rồi !!");
                return redirect()->route('admin.home');
            }
        }
    }
}
