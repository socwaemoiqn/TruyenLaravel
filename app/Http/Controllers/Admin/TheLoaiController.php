<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller as BaseController;

class TheLoaiController extends BaseController
{
    public function theLoaiPage(){
        return view('admin.ql_the_loai');
    }
}