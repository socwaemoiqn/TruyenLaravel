<?php
namespace App\Models\DAO;
use App\Models\IFace\DanhMucInterface;
use App\Models\DanhMuc;
use Illuminate\Http\Request;

class DanhMucDAO implements DanhMucInterface{
    private static $limit = 5;
    private static $ten_danh_muc = 'ten_danh_muc';
    public static $url = 'admin/danh-muc';
    public static function them(Request $request){
        $danh_muc = new DanhMuc;
        $danh_muc->ten_danh_muc = $request->ten_danh_muc;
        $danh_muc->gioi_thieu = $request->gioi_thieu;
        $danh_muc->trang_thai = 1;
        $danh_muc->save();
        return $danh_muc;
    }
    public static function sua(Request $request){
        $danh_muc = DanhMuc::find($request->id);
        $danh_muc->ten_danh_muc = $request->ten_danh_muc;
        $danh_muc->gioi_thieu = $request->gioi_thieu;
        $danh_muc->trang_thai = $request->trang_thai;
        $danh_muc->save();
        return $danh_muc;
    }   
    public static function xoa(Request $request){
        $danh_muc = DanhMuc::find($request->id);
        return $danh_muc->delete();
    }   
    public static function getData(){
        return DanhMuc::paginate(DanhMucDao::$limit);
    }
    public static function getDataById(Request $request){
        return DanhMuc::find($request->id);
    }
    public static function search(Request $request){
        return DanhMuc::where(DanhMucDAO::$ten_danh_muc,'like','%'.$request->key.'%')->paginate(DanhMucDAO::$limit);
    }
    public static function updateTrangThai(Request $request)
    {
        $danh_muc = DanhMuc::find($request->id);
        $danh_muc->trang_thai = $request->trang_thai;
        $danh_muc->save();
        return $danh_muc;
    }
}