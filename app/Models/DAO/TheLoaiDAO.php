<?php
namespace App\Models\DAO;
use App\Models\IFace\TheLoaiInterface;
use App\Models\TheLoai;
use Illuminate\Http\Request;

class TheLoaiDAO implements TheLoaiInterface{
    public static function checkExist(Request $request){
        if(TheLoai::where('ten_the_loai',$request->tenTheLoai)->count() > 0)
        {
            return true;
        }
        return false;
    }
    public static function them(Request $request){
        $the_loai = new TheLoai;
        $the_loai->ten_the_loai = $request->tenTheLoai;
        $the_loai->gioi_thieu = $request->gioiThieu;
        $the_loai->trang_thai = 1;
        $the_loai->save();
        return $the_loai;
    }
    public static function sua(Request $request){
        $the_loai = TheLoai::where('id',$request->id)->first();
        $the_loai->ten_the_loai = $request->tenTheLoai;
        $the_loai->gioi_thieu = $request->gioiThieu;
        $the_loai->trang_thai = $request->trangThai;
        $the_loai->save();
        return $the_loai;
    }   
    public static function xoa(Request $request){
        $the_loai = TheLoai::where('id',$request->id)->first();
        return $the_loai->delete();
    }   
    public static function getData(){
        return TheLoai::get();
    }
    public static function getDataById(Request $request){
        return TheLoai::where('id',$request->id)->get();
    }
    public static function search(Request $request){
        if($request->key != "")
            return TheLoai::where('ten_the_loai','like','%'.$request->key.'%')->get();
        else
            return TheLoaiDAO::getData();
    }
}