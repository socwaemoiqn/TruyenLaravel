<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class HomeController extends BaseController
{
     public function __construct()
        {
            $this->middleware('auth');
        }
    public function indexPage(Request $request){
        $request->session()->forget('email');
        return view('admin.index');
    }
}
