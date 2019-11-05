<?php
namespace App\Models\IFace;
use Illuminate\Http\Request;

interface TaiKhoanInterface{
    public static function login(Request $request); // Xử lí đăng nhập
    public static function logup(Request $request); // Xử lí đăng ký
    public static function them(Request $request); // Thêm 1 record
}