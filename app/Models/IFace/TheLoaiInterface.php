<?php
namespace App\Models\IFace;

use Illuminate\Http\Request;
interface TheLoaiInterface{
    public static function them(Request $request); // Thêm 1 record
    public static function sua(Request $request); // Sửa 1 record
    public static function xoa(Request $request); // Xóa 1 record
    public static function checkExist(Request $request); // Kiểm tra record tồn tại
    public static function getData(); // Lấy toàn bộ record
    public static function getDataById(Request $request); // Lấy 1 record theo id
    public static function search(Request $request); // Tìm kiếm record theo key

}