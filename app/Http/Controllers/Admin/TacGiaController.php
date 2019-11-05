<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller as BaseController;

class TacGiaController extends BaseController
{
    public function tacGiaPage(){
        return view('admin.ql_tac_gia');
    }
}