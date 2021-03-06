<?php

namespace App\Http\Controllers\BackendController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminPanelController extends Controller
{

    public function __construct()
    {
        $this->middleware(['admin']);
    }

    public function adminPanel()
    {
        return view('backend.dashboard');
    }
}
