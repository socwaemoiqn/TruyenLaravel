<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller as BaseController;

class TruyenController extends BaseController
{
    public function truyenPage(){
        return view('admin.ql_truyen');
    }
}