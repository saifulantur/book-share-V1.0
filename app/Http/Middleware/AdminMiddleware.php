<?php

namespace App\Http\Middleware;

use Session;
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
                Session::flash('updated','You are not allowed to admin site');
                return redirect('/');
//                return redirect('/')->with('status', 'You are not allowed to admin site');
            }
        }
        else{
            Session::flash('updated','You are not allowed to admin site');
            return redirect('/');
//            return redirect('/')->with('status', 'You are not allowed to admin site');
        }


    }
}
