<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class TheLoaiController extends BaseController
{
    public function theLoaiPage()
    {
        return view('the_loai');
    }
}
