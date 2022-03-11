<?php

namespace App\Http\Middleware\jobseeker;

use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class AuthJobseeker
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
        if (request()->is('jobseeker') || request()->is('jobseeker/*')){
            if (Session::get('js_name') == null && Session::get('js_id') == null){
                return redirect()->route('js_getLogin');
            }
            else{
                return $next($request);
            }
        }

        if (request()->is('js_auth') || request()->is('js_auth/*')){
            if (Session::get('js_name') != null && Session::get('js_id') != null){
                return redirect()->route('Home');
            }
            else{
                return $next($request);
            }
        }
    }
}
