<?php
namespace App\Models\IFace;
use Illuminate\Http\Request;

interface NhomDichVaiTroInterface{
    public static function them(Request $request); // Thêm 1 record
    public static function sua(Request $request); // Sửa 1 record
    public static function xoa(Request $request); // Xóa 1 record
    public static function getData(); // Lấy toàn bộ record
    public static function getDataById(Request $request); // Lấy 1 record theo id
    public static function search(Request $request); // Tìm kiếm record theo key
    public static function updateTrangThai(Request $request); // update trạng thái 
}