<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Models\DAO\DanhMucDAO;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller as BaseController;

class DanhMucController extends BaseController
{
    public function danhMucPage(){
        $data = DanhMucDAO::getData();
        return view('admin.ql_danh_muc')->with('data',$data);
    }
    public function them(Request $request){
        $ten_danh_muc = 'ten_danh_muc';

        $validator = Validator::make($request->all(),
        [
            $ten_danh_muc => 'unique:tb_danh_muc|required|max:50'
        ],[
            $ten_danh_muc.'.required'=> 'Tên danh mục không được để trống',
            $ten_danh_muc.'.unique' => 'Tên danh mục đã tồn tại',
            $ten_danh_muc.'.max' => 'Độ dài tối đa 50 ký tự'
        ])->validate();
        
         $DanhMuc = DanhMucDAO::them($request);
         session(["mess" => "Thêm danh mục thành công!"]);
         return redirect()->back();;
    }
    public function xoa(Request $request,$id)
    {   
        if(DanhMucDAO::xoa($request))
            $mess = "Xóa danh mục thành công!";
        else      
            $mess = "Xóa danh mục không thành công!"; 
        session(['mess'=>$mess]);
        return redirect()->back();
    }
    public function ajax(Request $request)
    {
        return DanhMucDAO::getDataById($request);
    }
    public function sua(Request $request)
    {
        $ten_danh_muc = 'ten_danh_muc';
        $validator = Validator::make($request->all(), [
            $ten_danh_muc => 'required|max:50'
        ],[
            $ten_danh_muc.'.required' => 'Tên danh mục không được để trống',
            $ten_danh_muc.'.max' => 'Độ dài tối đa 50 ký tự'
        ])->validate();
        $danh_muc = DanhMucDAO::sua($request);
        session(["mess" => "Sửa danh mục thành công!"]);
        return redirect()->back();
    }
    public function search(Request $request)
    {
         $data = DanhMucDAO::search($request);
         return view('admin.ql_danh_muc')->with('data',$data); 
    }
}