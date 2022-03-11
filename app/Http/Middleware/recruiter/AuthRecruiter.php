<?php

namespace App\Http\Middleware\recruiter;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;

class AuthRecruiter
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
        if (request()->is('recruiter/*') || request()->is('recruiter')) {
            if(Session::get('recruiter_id') == null && Session::get('recruiter_name') == null) {
                return redirect()->route('recruiter.login');
            } else {
                return $next($request);
            }
        }
    }
}
