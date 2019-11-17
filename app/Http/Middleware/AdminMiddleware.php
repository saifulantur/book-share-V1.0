<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class AdminMiddleware
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
        if(Auth::check()) {
            if (Auth::user()->userType == 'admin') {
                return $next($request);
            }
            else{
                return redirect('/')->with('status', 'You are not allowed to admin site');
            }
        }
        else{
            return redirect('/')->with('status', 'You are not allowed to admin site');
        }


    }
}
