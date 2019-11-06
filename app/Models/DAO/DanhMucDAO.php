<?php
namespace App\Models\DAO;
use App\Models\IFace\DanhMucInterface;
use App\Models\DanhMuc;
use Illuminate\Http\Request;

class DanhMucDAO implements DanhMucInterface{
    public static function checkExist(Request $request){
        if(DanhMuc::where('ten_danh_muc',$request->tenDanhMuc)->count() > 0)
        {
            return true;
        }
        return false;
    }
    public static function them(Request $request){
        $danh_muc = new DanhMuc;
        $danh_muc->ten_danh_muc = $request->tenDanhMuc;
        $danh_muc->gioi_thieu = $request->gioiThieu;
        $danh_muc->trang_thai = 1;
        $danh_muc->save();
        return $danh_muc;
    }
    public static function sua(Request $request){
        $danh_muc = DanhMuc::where('id',$request->id)->first();
        $danh_muc->ten_danh_muc = $request->tenDanhMuc;
        $danh_muc->gioi_thieu = $request->gioiThieu;
        $danh_muc->trang_thai = $request->trangThai;
        $danh_muc->save();
        return $danh_muc;
    }   
    public static function xoa(Request $request){
        $danh_muc = DanhMuc::where('id',$request->id)->first();
        return $danh_muc->delete();
    }   
    public static function getData(){
        return DanhMuc::get();
    }
    public static function getDataById(Request $request){
        return DanhMuc::where('id',$request->id)->get();
    }
    public static function search(Request $request){
        if($request->key != "")
            return DanhMuc::where('ten_danh_muc','like','%'.$request->key.'%')->get();
        else
            return DanhMucDAO::getData();
    }
}