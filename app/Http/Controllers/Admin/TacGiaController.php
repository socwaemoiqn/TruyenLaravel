<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\DAO\TacGiaDAO;
use Illuminate\Routing\Controller as BaseController;

class TacGiaController extends BaseController
{
    public function tacGiaPage(){
        $data = TacGiaDAO::getData();
        return view('admin.ql_tac_gia')->with('data',$data);
    }
    public function them(Request $request){
        $ten_tac_gia = 'ten_tac_gia';
        $validator = Validator::make($request->all(), [
            $ten_tac_gia => 'unique:tb_tac_gia|required|max:50'
        ],[
            $ten_tac_gia.'.required'=> 'Tên tác giả không được để trống',
            $ten_tac_gia.'.unique' => 'Tên tác giả đã tồn tại',
            $ten_tac_gia.'.max' => 'Độ dài tối đa 50 ký tự'
        ])->validate();
         $TacGia = TacGiaDAO::them($request);
         session(["mess" => "Thêm tác giả thành công!"]);
         return redirect()->back();;
    }
    public function xoa(Request $request,$id)
    {   
        if(TacGiaDAO::xoa($request))
            $mess = "Xóa tác giả thành công!";
        else      
            $mess = "Xóa tác giả không thành công!"; 
        session(['mess'=>$mess]);
        return redirect()->back();
    }
    public function ajax(Request $request)
    {
        return TacGiaDAO::getDataById($request);
    }
    public function sua(Request $request)
    {
        $ten_tac_gia = 'ten_tac_gia';
        $validator = Validator::make($request->all(), [
            $ten_tac_gia => 'required|max:50'
        ],[
            $ten_tac_gia.'.required' => 'Tên tác giả không được để trống',
            $ten_tac_gia.'.max' => 'Độ dài tối đa 50 ký tự'
        ])->validate();
        $tac_gia = TacGiaDAO::sua($request);
        session(["mess" => "Sửa tác giả thành công!"]);
        return redirect()->back();
    }
    public function search(Request $request)
    {
         $data = TacGiaDAO::search($request);
         return view('admin.ql_tac_gia')->with('data',$data); 
    }
}