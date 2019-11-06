<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Models\DAO\TheLoaiDAO;

class TheLoaiController extends BaseController
{
    public function theLoaiPage(){
        $data = TheLoaiDAO::getData();
        return view('admin.ql_the_loai')->with('data',$data);
    }
    public function them(Request $request){
        if(!TheLoaiDAO::checkExist($request))
        {

            $theLoai = TheLoaiDAO::them($request);
            session(['mess'=>'Thêm thể loại thành công!']);
        }
        else
            session(['mess'=>'Thêm thể loại không thành công!']);
        return redirect('admin/the-loai');
    }
    public function xoa(Request $request)
    {
        if(TheLoaiDAO::xoa($request))
            $mess = "Xóa thể loại thành công!";
        else      
            $mess = "Xóa thể loại không thành công!"; 
         return $mess;
    }
    public function ajax(Request $request)
    {
        return TheLoaiDAO::getDataById($request);
    }
    public function sua(Request $request)
    {
        if(TheLoaiDAO::sua($request))
            $mess = "Sửa thể loại thành công!";
        else      
            $mess = "Sửa thể loại không thành công!"; 
         return $mess;
    }
    public function search(Request $request)
    {
         $data = TheLoaiDAO::search($request);
         return view('admin.ql_the_loai')->with('data',$data); 
    }
}