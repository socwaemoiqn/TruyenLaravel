<?php

namespace App\Http\Controllers\Translator;
use Illuminate\Routing\Controller as BaseController;

class HomeController extends BaseController
{
    public function indexPage()
    {
        return view('translator.index');
    }
}
