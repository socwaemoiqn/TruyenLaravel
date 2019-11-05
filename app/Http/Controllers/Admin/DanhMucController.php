<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Models\DAO\DanhMucDAO;
use App\Models\DanhMuc;
use Illuminate\Routing\Controller as BaseController;

class DanhMucController extends BaseController
{
    public function danhMucPage(){
        $data = DanhMucDAO::getData();
        return view('admin.ql_danh_muc')->with('data',$data);
    }
    public function them(Request $request){
        if(!DanhMucDAO::checkExist($request))
        {

            $danhMuc = DanhMucDAO::them($request);
            session(['mess'=>'Thêm danh mục thành công!']);
        }
        else
            session(['mess'=>'Thêm danh mục không thành công!']);
        return redirect('admin/danh-muc');
    }
    public function ajax(Request $request)
    {
        return DanhMucDAO::getDataById($request);
    }
    public function sua(Request $request)
    {
        if(DanhMucDAO::sua($request))
            $mess = "Sửa danh mục thành công!";
        else      
            $mess = "Sửa danh mục không thành công!"; 
         return $mess;
    }
    public function search(Request $request)
    {
         $data = DanhMucDAO::search($request);
         return view('admin.ql_danh_muc')->with('data',$data); 
    }
}