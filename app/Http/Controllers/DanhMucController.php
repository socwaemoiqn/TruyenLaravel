<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class DanhMucController extends BaseController
{
    public function danhMucPage()
    {
        return view('danh_muc');
    }
}
