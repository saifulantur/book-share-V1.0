<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
//    protected $redirectTo = '/';

    protected function redirectTO(){

        if (Auth::user()->userType == 'admin'){
            return 'admin/panel';
        }else{
            return '/';
        }

    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function showLoginForm()
    {
        return view('frontend.sign-in');
    }



//    public function __construct()
//    {
//        $this->middleware('guest')->except('logout');
//    }
}
