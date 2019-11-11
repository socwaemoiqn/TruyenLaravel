<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Models\DAO\NhomDichDAO;
use App\Models\DAO\TaiKhoanDAO;
use App\Models\DAO\NhomDichThanhVienDAO;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller as BaseController;

class NhomDichController extends BaseController
{
    public function nhomDichPage(){
        $data = NhomDichDAO::getData();
        return view('admin.ql_nhom_dich')->with('data',$data);
    }
    public function them(Request $request){
        $ten_nhom_dich = 'ten_nhom_dich';
        $validator = Validator::make($request->all(),
        [
            $ten_nhom_dich => 'unique:tb_nhom_dich|required|max:50'
        ],[
            $ten_nhom_dich.'.unique'=> 'Tên nhóm dịch đã tồn tại',
            $ten_nhom_dich.'.required'=> 'Tên nhóm dịch không được để trống',
            $ten_nhom_dich.'.max' => 'Độ dài tối đa 50 ký tự'
        ])->validate();
         $tai_khoan = TaiKhoanDAO::getDataByUserName($request);
         $nhom_dich= NhomDichDAO::them($request);
         $request->request->set('tai_khoan_id',$tai_khoan->id);
         $request->request->set('nhom_dich_id',$nhom_dich->id);
         $request->request->set('nhom_dich_vai_tro_id',2);
         $nhom_dich_thanh_vien = NhomDichThanhVienDAO::them($request);
         $request->session()->flash('mess', ['status'=>"Thêm nhóm dịch thành công",'name'=>'Nhóm dịch vừa được thêm: '.$nhom_dich->ten_nhom_dich]);
         return redirect()->back();
    }
    public function xoa(Request $request)
    {
        if(NhomDichDAO::xoa($request))
            $mess = "Xóa nhóm dịch thành công!";
        else      
            $mess = "Xóa nhóm dịch không thành công!"; 
         return $mess;
    }
    public function ajax(Request $request)
    {
        return NhomDichDAO::getDataById($request);
    }
    public function sua(Request $request)
    {
        if(NhomDichDAO::sua($request))
            $mess = "Sửa nhóm dịch thành công!";
        else      
            $mess = "Sửa nhóm dịch không thành công!"; 
         return $mess;
    }
    public function search(Request $request)
    {
         $data = NhomDichDAO::search($request);
         return view('admin.ql_nhom_dich')->with('data',$data); 
    }
}