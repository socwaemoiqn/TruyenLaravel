<?php
namespace App\Models\DAO;
use App\Models\IFace\NhomDichThanhVienInterface;
use App\Models\NhomDichThanhVien;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class NhomDichThanhVienDAO implements NhomDichThanhVienInterface{
    public static function getData(){
        $data = DB::table('tb_nhom_dich_thanh_vien')
                    ->join('tb_nhom_dich','tb_nhom_dich.id','=','tb_nhom_dich_thanh_vien.nhom_dich_id')
                    ->join('tb_tai_khoan','tb_tai_khoan.id','=','tb_nhom_dich_thanh_vien.tai_khoan_id')
                    ->join('tb_nhom_dich_vai_tro','tb_nhom_dich_vai_tro.id','=','tb_nhom_dich_thanh_vien.nhom_dich_vai_tro_id')
                    ->select('tb_nhom_dich_thanh_vien.*','tb_nhom_dich.ten_nhom_dich','tb_nhom_dich_vai_tro.ten_vai_tro','tb_tai_khoan.ten_tai_khoan')
                    ->get();
                    return $data;;
    }
    public static function checkExist(Request $request){
    
    }
    public static function them(Request $request){
        $nhom_dich_tv = new NhomDichThanhVien;
        $nhom_dich_tv->tai_khoan_id = 6; // xem lỗi ở đây
        $nhom_dich_tv->nhom_dich_id = $request->nhomDichID;
        $nhom_dich_tv->nhom_dich_vai_tro_id = $request->nhomDichVaiTroID;
        $nhom_dich_tv->trang_thai = 1; 
        $nhom_dich_tv->save();
        return $nhom_dich_tv;
    }
    public static function sua(Request $request){
  
    }   
    public static function xoa(Request $request){
     
    }   
    public static function getDataById(Request $request){
      
    }
    public static function search(Request $request){
     
    }
}