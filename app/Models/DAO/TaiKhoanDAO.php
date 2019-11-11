<?php
namespace App\Models\DAO;
use App\Models\IFace\TaiKhoanInterface;
use App\Models\TaiKhoan;
use App\Models\DAO\TaiKhoanInfoDAO;
use Illuminate\Http\Request;

class TaiKhoanDAO implements TaiKhoanInterface{
    public static function login(Request $request){
            if(TaiKhoan::where('ten_tai_khoan',$request->username)
            ->where('mat_khau',$request->password)->count() != 0)
            {
                return true;
            }
            return false;
        
    }
    public static function logup(Request $request){
        if(TaiKhoan::where('ten_tai_khoan',$request->username)->count()< 1)
        {     
            $tai_khoan = TaiKhoanDAO::them($request);         
            $tai_khoan_info = TaiKhoanInfoDAO::them($tai_khoan,$request);
            return true;
        }
        else
            return false;
    }
    public static function them(Request $request){
        $tai_khoan = new TaiKhoan;
        $tai_khoan->ten_tai_khoan = $request->username;
        $tai_khoan->mat_khau = $request->password;
        $tai_khoan->tai_khoan_vai_tro = 3; // Default Member
        $tai_khoan->save();
        return $tai_khoan;
    }
    public static function getDataByUserName(Request $request)
    {
        return TaiKhoan::where('ten_tai_khoan',$request->ten_tai_khoan)->first();
    }
}