<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Models\DAO\TacGiaDAO;
use Illuminate\Routing\Controller as BaseController;

class TacGiaController extends BaseController
{
    public function tacGiaPage(){
        $data = TacGiaDAO::getData();
        return view('admin.ql_tac_gia')->with('data',$data);
    }
    public function them(Request $request){
        if(!TacGiaDAO::checkExist($request))
        {

            $TacGia = TacGiaDAO::them($request);
            session(['mess'=>'Thêm tác giả thành công!']);
        }
        else
            session(['mess'=>'Thêm tác giả không thành công!']);
        return redirect('admin/tac-gia');
    }
    public function xoa(Request $request)
    {
        if(TacGiaDAO::xoa($request))
            $mess = "Xóa tác giả thành công!";
        else      
            $mess = "Xóa tác giả không thành công!"; 
         return $mess;
    }
    public function ajax(Request $request)
    {
        return TacGiaDAO::getDataById($request);
    }
    public function sua(Request $request)
    {
        if(TacGiaDAO::sua($request))
            $mess = "Sửa tác giả thành công!";
        else      
            $mess = "Sửa tác giả không thành công!"; 
         return $mess;
    }
    public function search(Request $request)
    {
         $data = TacGiaDAO::search($request);
         return view('admin.ql_tac_gia')->with('data',$data); 
    }
}