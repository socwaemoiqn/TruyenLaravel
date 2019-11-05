<?php
namespace App\Models\DAO;
use App\Models\IFace\TaiKhoanInfoInterface;
use App\Models\TaiKhoanInfo;
use Illuminate\Http\Request;

class TaiKhoanInfoDAO implements TaiKhoanInfoInterface{
    public static function them($tai_khoan,Request $request){
        $tai_khoan_info = new TaiKhoanInfo;
        $tai_khoan_info->tai_khoan_id = $tai_khoan->id;
        $tai_khoan_info->email = $request->email;
        $tai_khoan_info->save();
        return $tai_khoan_info;
    }
}