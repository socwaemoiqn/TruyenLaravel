<?php
namespace App\Models\DAO;
use App\Models\IFace\NhomDichVaiTroInterface;
use App\Models\NhomDichVaiTro;
use Illuminate\Http\Request;

class NhomDichVaiTroDAO implements NhomDichVaiTroInterface{
    public static function checkExist(Request $request){
        if(NhomDichVaiTro::where('ten_vai_tro',$request->tenNhomDichVaiTro)->count() > 0)
        {
            return true;
        }
        return false;
    }
    public static function them(Request $request){
        $vai_tro = new NhomDichVaiTro;
        $vai_tro->ten_vai_tro = $request->tenNhomDichVaiTro;
        $vai_tro->gioi_thieu = $request->gioiThieu;
        $vai_tro->trang_thai = 1;
        $vai_tro->save();
        return $vai_tro;
    }
    public static function sua(Request $request){
        $vai_tro = NhomDichVaiTro::where('id',$request->id)->first();
        $vai_tro->ten_vai_tro = $request->tenNhomDichVaiTro;
        $vai_tro->gioi_thieu = $request->gioiThieu;
        $vai_tro->trang_thai = $request->trangThai;
        $vai_tro->save();
        return $vai_tro;
    }   
    public static function xoa(Request $request){
        $vai_tro = NhomDichVaiTro::where('id',$request->id)->first();
        return $vai_tro->delete();
    }   
    public static function getData(){
        return NhomDichVaiTro::get();
    }
    public static function getDataById(Request $request){
        return NhomDichVaiTro::where('id',$request->id)->get();
    }
    public static function search(Request $request){
        if($request->key != "")
            return NhomDichVaiTro::where('ten_vai_tro','like','%'.$request->key.'%')->get();
        else
            return NhomDichVaiTroDAO::getData();
    }
}