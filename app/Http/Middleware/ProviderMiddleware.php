<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class ProviderMiddleware
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
        if (Auth::user()->usertype == 1) {

            return $next($request);
        } else {
            return redirect()->route('login');
        }
    }
}
