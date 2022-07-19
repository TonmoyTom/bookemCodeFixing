<?php

namespace App\Http\Middleware;
use Auth;

use Closure;

class UserMiddleware
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

        // if(Auth::check() && Auth::user()->status){
        //     $banned = Auth::user()->status == '0';
        //     Auth::logout();
        //     if($banned == 0){
        //         $message = 'Your Account is Deactive, Please Contact with Admin!';
        //         if ($request->expectsJson()) {
        //             abort(500, 'Your Account is Deactive, Please Contact with Admin!');
        //         }
        //     }
        //     return redirect()->back()->with('status', $message)->withErrors(['email' => "Your Account is Deactive, Please Contact with Admin!"]);
        // }

        if(Auth::check() && Auth::user()->role == 2){

            return $next($request);
        }else{
            // if ($request->expectsJson()) {
            //     abort(500, 'Your Account is Deactive, Please Contact with Admin!');
            // }
            return redirect()->route('login');
        }
    }
}
