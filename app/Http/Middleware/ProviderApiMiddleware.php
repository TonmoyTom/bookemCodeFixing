<?php

namespace App\Http\Middleware;
use Auth;

use Closure;

class ProviderApiMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        // if(Auth::check() && Auth::user()->status == 0){
        //     // Auth::logout();
        //     abort(500, 'Your Account is Deactive, Please Contact with Admin!');
        // }

        if(Auth::check() && Auth::user()->role == 2 && Auth::user()->usertype == 1){
            return $next($request);
        }else{
            abort(500, 'Something went to be wrong. Please contact with admin');
        }
    }
}
