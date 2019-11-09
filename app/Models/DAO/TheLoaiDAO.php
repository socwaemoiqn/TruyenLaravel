<?php
namespace App\Models\DAO;
use App\Models\IFace\TheLoaiInterface;
use App\Models\TheLoai;
use Illuminate\Http\Request;

class TheLoaiDAO implements TheLoaiInterface{
    private static $limit = 10;
    private static $ten_the_loai = 'ten_the_loai';
    private static $url = 'admin/the-loai';
    public static function them(Request $request){
        $the_loai = new TheLoai;
        $the_loai->ten_the_loai = $request->ten_the_loai;
        $the_loai->gioi_thieu = $request->gioi_thieu;
        $the_loai->trang_thai = 1;
        $the_loai->save();
        return $the_loai;
    }
    public static function sua(Request $request){
        $the_loai = TheLoai::find($request->id);
        $the_loai->ten_the_loai = $request->ten_the_loai;
        $the_loai->gioi_thieu = $request->gioi_thieu;
        $the_loai->trang_thai = $request->trang_thai;
        $the_loai->save();
        return $the_loai;
    }   
    public static function xoa(Request $request){
        $the_loai = TheLoai::find($request->id);
        return $the_loai->delete();
    }   
    public static function getData(){
        return TheLoai::paginate(TheLoaiDao::$limit);
    }
    public static function getDataById(Request $request){
        return TheLoai::where('id',$request->id)->get();
    }
    public static function search(Request $request){
        if($request->key != "")
        {
            $data = TheLoai::where(TheLoaiDAO::$ten_the_loai,'like','%'.$request->key.'%')->paginate(TheLoaiDAO::$limit);
            $data->withPath(TheLoaiDAO::$url.'/search?key='.$request->key);
            return $data;
        } 
        else
            return TheLoaiDAO::getData();
    }
}