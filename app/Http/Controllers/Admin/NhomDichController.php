<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Models\DAO\NhomDichDAO;
use App\Models\DAO\TaiKhoanDAO;
use App\Models\DAO\NhomDichThanhVienDAO;
use Illuminate\Routing\Controller as BaseController;

class NhomDichController extends BaseController
{
    public function nhomDichPage(){
        $data = NhomDichDAO::getData();
        return view('admin.ql_nhom_dich')->with('data',$data);
    }
    public function them(Request $request){
        if(!NhomDichDAO::checkExist($request))
        {
             $nhom_dich = NhomDichDAO::them($request);

             $tai_khoan_id = TaiKhoanDAO::getDataByUserName($request->tenTaiKhoan);
             $request->request->set('taiKhoanID', $tai_khoan_id); // xem lại ở đây là trả về 1 mảng các đổi tượng $tk[0]->tai_khoan_id)
             $request->request->set('nhomDichID', $nhom_dich->id);
             $request->request->set('nhomDichVaiTroID', 1);
             $nhom_dich_tv = NhomDichThanhVienDAO::them($request);
            session(['mess'=>'Thêm nhóm dịch thành công!']);
        }
        else
            session(['mess'=>'Thêm nhóm dịch không thành công!']);
        return redirect('admin/nhom-dich');
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