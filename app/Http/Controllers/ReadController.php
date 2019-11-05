<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class ReadController extends BaseController
{
    public function readPage(){
        return view('read');
    }
}