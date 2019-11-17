<?php

namespace App\Http\Middleware;

use Closure;
use Session;
class CheckUserBlockedMiddleware
{
    public function handle($request, Closure $next) {

        if (auth()->check())
        {
            if (date('Y-m-d H:i:s') < auth()->user()->blocked_date) {
                $blocked_days = now()->diffInDays(auth()->user()->blocked_date);
                // $message = 'Your account has been blocked. It will be unblocked after '.$blocked_days.' '.str_plural('day', $blocked_days);
                //change added
                if ($blocked_days > 14) {
                    $message = 'Your account has been suspended. Please contact administrator.';
                    Session::flash('error',$message);
                } else {
                    $message = 'Your account has been suspended for '.$blocked_days.' ' .str_plural('day', $blocked_days).'. Please contact administrator.';
                    Session::flash('updated',$message);
                }
                //end change added

                auth()->logout();
                return redirect()->route('login')->withMessage($message);
            }
        }
        return $next($request);
    }
}

