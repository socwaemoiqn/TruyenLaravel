<?php

namespace App\Http\Controllers;
use App\Models\DAO\TaiKhoanDAO;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Session;

class HomeController extends BaseController
{
    public function indexPage(){
        return view('index');
    }
    public function login(Request $request){
        if(TaiKhoanDAO::login($request))
            session(['mess'=>'Đăng nhập thành công!']); 
        else
            session(['mess'=>'Đăng nhập không thành công!']);
        return redirect('/');;
    }
    public function logup(Request $request){
        if(TaiKhoanDAO::logup($request))
            session(['mess'=>'Đăng ký thành công!']);
        else
            session(['mess'=>'Đăng ký không thành công!']);
        return redirect('/');;
    }
}