<?php
namespace App\Models\DAO;
use App\Models\IFace\NhomDichVaiTroInterface;
use App\Models\NhomDichVaiTro;
use Illuminate\Http\Request;

class NhomDichVaiTroDAO implements NhomDichVaiTroInterface{
    private static $limit = 5;
    private static $ten_vai_tro = 'ten_vai_tro';
    public static $url = 'admin/nhom-dich/vai-tro';
    public static function them(Request $request){
        $vai_tro = new NhomDichVaiTro;
        $vai_tro->ten_vai_tro = $request->ten_vai_tro;
        $vai_tro->gioi_thieu = $request->gioi_thieu;
        $vai_tro->trang_thai = 1;
        $vai_tro->save();
        return $vai_tro;
    }
    public static function sua(Request $request){
        $vai_tro = NhomDichVaiTro::where('id',$request->id)->first();
        $vai_tro->ten_vai_tro = $request->ten_vai_tro;
        $vai_tro->gioi_thieu = $request->gioi_thieu;
        $vai_tro->trang_thai = $request->trang_thai;
        $vai_tro->save();
        return $vai_tro;
    }   
    public static function xoa(Request $request){
        $vai_tro = NhomDichVaiTro::where('id',$request->id)->first();
        return $vai_tro->delete();
    }   
    public static function getData(){
        return NhomDichVaiTro::paginate(NhomDichVaiTroDAO::$limit);
    }
    public static function getDataById(Request $request){
        return NhomDichVaiTro::find($request->id);
    }
    public static function search(Request $request){
            return NhomDichVaiTro::where('ten_vai_tro','like','%'.$request->key.'%')->paginate(NhomDichVaiTroDAO::$limit);
    }
    public static function updateTrangThai(Request $request){
        $vai_tro = NhomDichVaiTro::find($request->id);
        $vai_tro->trang_thai = $request->trang_thai;
        $vai_tro->save();
        return $vai_tro;
    }
}