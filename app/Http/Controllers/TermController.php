<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class TermController extends BaseController
{
    public function termPage()
    {
        return view('term');
    }
}