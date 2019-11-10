<?php
namespace App\Models\IFace;
use Illuminate\Http\Request;

interface TaiKhoanInfoInterface{
    public static function them($tai_khoan,Request $request); // Thêm 1 record
}