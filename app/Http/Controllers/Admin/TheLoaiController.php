<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\DAO\TheLoaiDAO;
use Illuminate\Routing\Controller as BaseController;

class TheLoaiController extends BaseController
{
    public function TheLoaiPage(){
        $data = TheLoaiDAO::getData();
        return view('admin.ql_the_loai')->with('data',$data);
    }
    public function them(Request $request){
        $ten_the_loai = 'ten_the_loai';

        $validator = Validator::make($request->all(),
        [
            $ten_the_loai => 'unique:tb_the_loai|required|max:50'
        ],[
            $ten_the_loai.'.required'=> 'Tên thể loại không được để trống',
            $ten_the_loai.'.unique' => 'Tên thể loại đã tồn tại',
            $ten_the_loai.'.max' => 'Độ dài tối đa 50 ký tự'
        ])->validate();
        
         $TheLoai = TheLoaiDAO::them($request);
         session(["mess" => "Thêm thể loại thành công!"]);
         return redirect()->back();;
    }
    public function xoa(Request $request,$id)
    {   
        if(TheLoaiDAO::xoa($request))
            $mess = "Xóa thể loại thành công!";
        else      
            $mess = "Xóa thể loại không thành công!"; 
        session(['mess'=>$mess]);
        return redirect()->back();
    }
    public function ajax(Request $request)
    {
        return TheLoaiDAO::getDataById($request);
    }
    public function sua(Request $request)
    {
        $ten_the_loai = 'ten_the_loai';
        $validator = Validator::make($request->all(), [
            $ten_the_loai => 'required|max:50'
        ],[
            $ten_the_loai.'.required' => 'Tên thể loại không được để trống',
            $ten_the_loai.'.max' => 'Độ dài tối đa 50 ký tự'
        ])->validate();
        $the_loai = TheLoaiDAO::sua($request);
        session(["mess" => "Sửa thể loại thành công!"]);
        return redirect()->back();
    }
    public function search(Request $request)
    {
         $data = TheLoaiDAO::search($request);
         return view('admin.ql_the_loai')->with('data',$data); 
    }
}
