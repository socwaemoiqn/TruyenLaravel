<?php
namespace App\Models\DAO;
use App\Models\IFace\NhomDichInterface;
use App\Models\NhomDich;
use Illuminate\Http\Request;

class NhomDichDAO implements NhomDichInterface{
    public static function checkExist(Request $request){
        if(NhomDich::where('ten_nhom_dich',$request->tenNhomDich)->count() > 0)
        {
            return true;
        }
        return false;
    }
    public static function them(Request $request){
        $nhom_dich = new NhomDich;
        $nhom_dich->ten_nhom_dich = $request->tenNhomDich;
        $nhom_dich->trang_thai = 1;
        $nhom_dich->gioi_thieu = $request->gioiThieu;
        $nhom_dich->save();
        return $nhom_dich;
    }
    public static function sua(Request $request){
       
        $nhom_dich = NhomDich::where('id',$request->id)->first();
        $nhom_dich->ten_nhom_dich = $request->tenNhomDich;
        $nhom_dich->gioi_thieu = $request->gioiThieu;
        $nhom_dich->trang_thai = $request->trangThai;
        $nhom_dich->save();
      
        return $nhom_dich;
    }   
    public static function xoa(Request $request){
        $nhom_dich = NhomDich::where('id',$request->id)->first();
        return $nhom_dich->delete();
    }   
    public static function getData(){
        return NhomDich::get();
    }
    public static function getDataById(Request $request){
        return NhomDich::where('id',$request->id)->get();
    }
    public static function search(Request $request){
        if($request->key != "")
            return NhomDich::where('ten_nhom_dich','like','%'.$request->key.'%')->get();
        else
            return NhomDichDAO::getData();
    }
}