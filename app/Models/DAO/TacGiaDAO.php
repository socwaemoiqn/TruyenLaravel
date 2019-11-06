<?php
namespace App\Models\DAO;
use App\Models\IFace\TacGiaInterface;
use App\Models\TacGia;
use Illuminate\Http\Request;

class TacGiaDAO implements TacGiaInterface{
    public static function checkExist(Request $request){
        if(TacGia::where('ten_tac_gia',$request->tenTacGia)->count() > 0)
        {
            return true;
        }
        return false;
    }
    public static function them(Request $request){
        $tac_gia = new TacGia;
        $tac_gia->ten_tac_gia = $request->tenTacGia;
        $tac_gia->gioi_thieu = $request->gioiThieu;
        $tac_gia->trang_thai = 1;
        $tac_gia->save();
        return $tac_gia;
    }
    public static function sua(Request $request){
        $tac_gia = TacGia::where('id',$request->id)->first();
        $tac_gia->ten_tac_gia = $request->tenTacGia;
        $tac_gia->gioi_thieu = $request->gioiThieu;
        $tac_gia->trang_thai = $request->trangThai;
        $tac_gia->save();
        return $tac_gia;
    }   
    public static function xoa(Request $request){
        $tac_gia = TacGia::where('id',$request->id)->first();
        return $tac_gia->delete();
    }   
    public static function getData(){
        return TacGia::get();
    }
    public static function getDataById(Request $request){
        return TacGia::where('id',$request->id)->get();
    }
    public static function search(Request $request){
        if($request->key != "")
            return TacGia::where('ten_tac_gia','like','%'.$request->key.'%')->get();
        else
            return TacGiaDAO::getData();
    }
}