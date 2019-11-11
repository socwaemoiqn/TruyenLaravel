<?php
namespace App\Models\DAO;
use App\Models\IFace\NhomDichInterface;
use App\Models\NhomDich;
use Illuminate\Http\Request;

class NhomDichDAO implements NhomDichInterface{
    private static $limit = 5;
    private static $ten_nhom_dich = 'ten_nhom_dich';
    public static $url = 'admin/nhom-dich';
    public static function them(Request $request){
        $nhom_dich = new NhomDich;
        $nhom_dich->ten_nhom_dich = $request->ten_nhom_dich;
        $nhom_dich->gioi_thieu = $request->gioi_thieu;
        $nhom_dich->trang_thai = 1;
        $nhom_dich->save();
        return $nhom_dich;
    }
    public static function sua(Request $request){
        $nhom_dich = NhomDich::find($request->id);
        $nhom_dich->ten_nhom_dich = $request->ten_nhom_dich;
        $nhom_dich->gioi_thieu = $request->gioi_thieu;
        $nhom_dich->trang_thai = $request->trang_thai;
        $nhom_dich->save();
        return $nhom_dich;
    }   
    public static function xoa(Request $request){
        $nhom_dich = NhomDich::find($request->id);
        return $nhom_dich->delete();
    }   
    public static function getData(){
        return NhomDich::paginate(NhomDichDao::$limit);
    }
    public static function getDataById(Request $request){
        return NhomDich::find($request->id);
    }
    public static function search(Request $request){
        return NhomDich::where(NhomDichDAO::$ten_nhom_dich,'like','%'.$request->key.'%')->paginate(NhomDichDAO::$limit);
    }
    public static function updateTrangThai(Request $request)
    {
        $nhom_dich = NhomDich::find($request->id);
        $nhom_dich->trang_thai = $request->trang_thai;
        $nhom_dich->save();
        return $nhom_dich;
    }
}