<?php

namespace App\Http\Controllers\FrontendController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

//    public function __construct()
//    {
//        $this->middleware(['auth' => 'verified']);
//    }

    public function dashboard()
    {
        return view('frontend.index');
    }

    public function test(){
        return view('test');
    }
}
