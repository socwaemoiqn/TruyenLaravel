<?php
namespace App\Models\DAO;
use App\Models\IFace\NhomDichThanhVienInterface;
use App\Models\NhomDichThanhVien;
use App\Models\NhomDich;
use Illuminate\Http\Request;


class NhomDichThanhVienDAO implements NhomDichThanhVienInterface{
    private static $limit = 5;
    private static $ten_tai_khoan = 'ten_tai_khoan';
    private static $ten_nhom_dich = 'ten_nhom_dich';
    public static $url = 'admin/nhom-dich/thanh-vien';
    public static function getData(){
        $data = NhomDichThanhVien::
                    join('tb_nhom_dich','tb_nhom_dich.id','=','tb_nhom_dich_thanh_vien.nhom_dich_id')
                    ->join('tb_tai_khoan','tb_tai_khoan.id','=','tb_nhom_dich_thanh_vien.tai_khoan_id')
                    ->join('tb_nhom_dich_vai_tro','tb_nhom_dich_vai_tro.id','=','tb_nhom_dich_thanh_vien.nhom_dich_vai_tro_id')
                    ->select('tb_nhom_dich_thanh_vien.*','tb_nhom_dich.ten_nhom_dich','tb_nhom_dich_vai_tro.ten_vai_tro','tb_tai_khoan.ten_tai_khoan')
                    ->paginate(NhomDichThanhVienDAO::$limit);
                    return $data;;
    }
    public static function them(Request $request){
        $nhom_dich_tv = new NhomDichThanhVien;
        $nhom_dich_tv->tai_khoan_id = $request->tai_khoan_id;
        $nhom_dich_tv->nhom_dich_id = $request->nhom_dich_id;
        $nhom_dich_tv->nhom_dich_vai_tro_id = 2; // Mặc định là thành viên
        $nhom_dich_tv->trang_thai = 1; 
        $nhom_dich_tv->save();
        return $nhom_dich_tv;
    }
    public static function sua(Request $request){
        $nhom_dich_tv = NhomDichThanhVien::find($request->id);
        $nhom_dich_tv->tai_khoan_id = $request->tai_khoan_id;
        $nhom_dich_tv->nhom_dich_id = $request->nhom_dich_id;
        // Thiếu mã vai trò
        $nhom_dich_tv->trang_thai = $request->trang_thai; 
        $nhom_dich_tv->save();
        return $nhom_dich_tv;
    }   
    public static function xoa(Request $request){
        $nhom_dich_tv = NhomDichThanhVien::find($request->id);
        return $nhom_dich_tv->delete();
    }   
    public static function getDataById(Request $request){
        $data = NhomDichThanhVien::
                    join('tb_nhom_dich','tb_nhom_dich.id','=','tb_nhom_dich_thanh_vien.nhom_dich_id')
                    ->join('tb_tai_khoan','tb_tai_khoan.id','=','tb_nhom_dich_thanh_vien.tai_khoan_id')
                    ->join('tb_nhom_dich_vai_tro','tb_nhom_dich_vai_tro.id','=','tb_nhom_dich_thanh_vien.nhom_dich_vai_tro_id')
                    ->select('tb_nhom_dich_thanh_vien.*','tb_nhom_dich.ten_nhom_dich','tb_nhom_dich_vai_tro.ten_vai_tro','tb_tai_khoan.ten_tai_khoan')
                    ->find($request->id);
        return $data;
    }
    public static function search(Request $request){
        $data = NhomDichThanhVien::
        join('tb_nhom_dich','tb_nhom_dich.id','=','tb_nhom_dich_thanh_vien.nhom_dich_id')
        ->join('tb_tai_khoan','tb_tai_khoan.id','=','tb_nhom_dich_thanh_vien.tai_khoan_id')
        ->join('tb_nhom_dich_vai_tro','tb_nhom_dich_vai_tro.id','=','tb_nhom_dich_thanh_vien.nhom_dich_vai_tro_id')
        ->select('tb_nhom_dich_thanh_vien.*','tb_nhom_dich.ten_nhom_dich','tb_nhom_dich_vai_tro.ten_vai_tro','tb_tai_khoan.ten_tai_khoan')
        ->where(NhomDichThanhVienDAO::$ten_nhom_dich,'like','%'.$request->key.'%')
        ->paginate(NhomDichThanhVienDAO::$limit);
        return $data;
    }
    public static function updateTrangThai(Request $request)
    {
        $nhom_dich_tv = NhomDichThanhVien::find($request->id);
        $nhom_dich_tv->trang_thai = $request->trang_thai;
        $nhom_dich_tv->save();
        return $nhom_dich_tv;
    }
    public static function countByNhomDich(Request $request)
    {
        $nhom_dich = NhomDich::find($request->nhom_dich_id);
        return $nhom_dich->nhomDichThanhVien()->count();
    }
}