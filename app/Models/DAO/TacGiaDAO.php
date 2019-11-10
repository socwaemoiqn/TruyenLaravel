<?php
namespace App\Models\DAO;
use App\Models\IFace\TacGiaInterface;
use App\Models\TacGia;
use Illuminate\Http\Request;

class TacGiaDAO implements TacGiaInterface{
    private static $limit = 5;
    private static $ten_tac_gia = 'ten_tac_gia';
    public static $url = 'admin/tac-gia';
    public static function them(Request $request){
        $tac_gia = new TacGia;
        $tac_gia->ten_tac_gia = $request->ten_tac_gia;
        $tac_gia->gioi_thieu = $request->gioi_thieu;
        $tac_gia->trang_thai = 1;
        $tac_gia->save();
        return $tac_gia;
    }
    public static function sua(Request $request){
        $tac_gia = TacGia::find($request->id);
        $tac_gia->ten_tac_gia = $request->ten_tac_gia;
        $tac_gia->gioi_thieu = $request->gioi_thieu;
        $tac_gia->trang_thai = $request->trang_thai;
        $tac_gia->save();
        return $tac_gia;
    }   
    public static function xoa(Request $request){
        $tac_gia = TacGia::find($request->id);
        return $tac_gia->delete();
    }   
    public static function getData(){
        return TacGia::paginate(TacGiaDao::$limit);
    }
    public static function getDataById(Request $request){
        return TacGia::find($request->id);
    }
    public static function search(Request $request){
        return TacGia::where(TacGiaDAO::$ten_tac_gia,'like','%'.$request->key.'%')->paginate(TacGiaDAO::$limit);
    }
    public static function updateTrangThai(Request $request)
    {
        $tac_gia = TacGia::find($request->id);
        $tac_gia->trang_thai = $request->trang_thai;
        $tac_gia->save();
        return $tac_gia;
    }
}