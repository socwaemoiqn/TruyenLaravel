<?php
namespace App\Models\DAO;
use App\Models\IFace\NhomDichInterface;
use App\Models\NhomDich;
use App\Models\NhomDichThanhVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $nhom_dich->nhomDichThanhVien()->delete(); // Xóa tất cả thành viên thuộc nhóm dịch này
        return $nhom_dich->delete();
    }   
    public static function getData(){
        $countData = NhomDichThanhVien::select('tb_nhom_dich_thanh_vien.nhom_dich_id',DB::raw('count(*) as nhom_dich_count'))
        ->groupBy('tb_nhom_dich_thanh_vien.nhom_dich_id');
        $data = NhomDich::leftJoinSub($countData,'countData',function($join){
            $join->on('tb_nhom_dich.id','=','countData.nhom_dich_id');
        })
        ->select('tb_nhom_dich.*','countData.nhom_dich_count')
         // Admin
        ->paginate(NhomDichDAO::$limit);
        return $data;
    }
    public static function getDataById(Request $request){
        return NhomDich:: find($request->id);
    }
    public static function search(Request $request){
        $countData = NhomDichThanhVien::select('tb_nhom_dich_thanh_vien.nhom_dich_id',DB::raw('count(*) as nhom_dich_count'))
        ->groupBy('tb_nhom_dich_thanh_vien.nhom_dich_id');
        $data = NhomDich::leftJoinSub($countData,'countData',function($join){
            $join->on('tb_nhom_dich.id','=','countData.nhom_dich_id');
        })
        ->select('tb_nhom_dich.*','countData.nhom_dich_count')
        ->where(NhomDichDAO::$ten_nhom_dich,'like','%'.$request->key.'%')
        ->select('tb_nhom_dich.*','countData.nhom_dich_count')
        ->paginate(NhomDichDAO::$limit);
        return $data;
    }
    public static function getDataByName(Request $request)
    {
        return NhomDich::where('ten_nhom_dich',$request->ten_nhom_dich)->first();
    }
    public static function updateTrangThai(Request $request)
    {
        $nhom_dich = NhomDich::find($request->id);
        $nhom_dich->trang_thai = $request->trang_thai;
        $nhom_dich->save();
        return $nhom_dich;
    }
}