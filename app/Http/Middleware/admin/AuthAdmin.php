<?php

namespace App\Http\Middleware\admin;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthAdmin
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
        if (request()->is('admin/*') || request()->is('admin')) {
            if(Session::get('admin_id') == null && Session::get('admin_name') == null) {
                return redirect()->route('admin.login');
            } else {
                return $next($request);
            }
        }
    }
}
