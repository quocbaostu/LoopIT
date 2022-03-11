<?php

namespace App\Http\Middleware\recruiter;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class IsLoginRecruiter
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
        if (request()->is('recruiter/login') || request()->is('recruiter/register')
        || request()->is('recruiter/actived/*/*') || request()->is('recruiter/verify-mail')
        || request()->is('recruiter/forget-password') || request()->is('recruiter/change-password')
        || request()->is('recruiter/change-password/*/*')) {
            if(Session::get('recruiter_id') == null && Session::get('recruiter_name') == null) {
                return $next($request);
            } else {
                Session::flash('error', "Bạn đã đăng nhập rồi !!");
                return redirect()->route('recruiter.home');
            }
        }
    }
}
