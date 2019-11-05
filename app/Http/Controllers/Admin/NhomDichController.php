<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller as BaseController;

class NhomDichController extends BaseController
{
    public function nhomDichPage(){
        return view('admin.ql_nhom_dich');
    }
}