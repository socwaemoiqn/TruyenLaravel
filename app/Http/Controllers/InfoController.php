<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class InfoController extends BaseController
{
    public function infoPage(){
        return view('info');
    }
}