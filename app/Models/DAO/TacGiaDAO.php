<?php
namespace App\Models\DAO;
use App\Models\IFace\TacGiaInterface;
use App\Models\TacGia;
use Illuminate\Http\Request;

class TacGiaDAO implements TacGiaInterface{
    private static $limit = 10;
    private static $ten_tac_gia = 'ten_tac_gia';
    private static $url = 'admin/tac-gia';
    public static function checkExist(Request $request){
        if(TacGia::where(TacGiaDAO::$ten_tac_gia,$request->tenTacGia)->count() > 0)
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
        $tac_gia = TacGia::find($request->id);
        $tac_gia->ten_tac_gia = $request->tenTacGia;
        $tac_gia->gioi_thieu = $request->gioiThieu;
        $tac_gia->trang_thai = $request->trangThai;
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
        return TacGia::where('id',$request->id)->get();
    }
    public static function search(Request $request){
        if($request->key != "")
        {
            $data = TacGia::where(TacGiaDAO::$ten_tac_gia,'like','%'.$request->key.'%')->paginate(TacGiaDAO::$limit);
            $data->withPath(TacGiaDAO::$url.'/search?key='.$request->key);
            return $data;
        } 
        else
            return TacGiaDAO::getData();
    }
}