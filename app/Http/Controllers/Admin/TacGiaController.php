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

        $validator = Validator::make($request->all(),
        [
            $ten_tac_gia => 'unique:tb_tac_gia|required|max:50'
        ],[
            $ten_tac_gia.'.required'=> 'Tên tác giả không được để trống',
            $ten_tac_gia.'.unique' => 'Tên tác giả đã tồn tại',
            $ten_tac_gia.'.max' => 'Độ dài tối đa 50 ký tự'
        ])->validate();
         $tac_gia= TacGiaDAO::them($request);
         $request->session()->flash('mess', ['status'=>"Thêm tác giả thành công",'name'=>'Tác giả vừa được thêm: '.$tac_gia->ten_tac_gia]);
         return redirect()->back();
                    // ->with('mess', ['status'=>"Thêm tác giả thành công",'name'=>'Tác giả vừa được thêm: '.$tac_gia->ten_tac_gia]);
    }
    public function xoa(Request $request)
    {  
        $tac_gia = TacGiaDAO::getDataById($request);
        if(TacGiaDAO::xoa($request))
            $mess = "Xóa tác giả thành công!";
        else      
            $mess = "Xóa tác giả không thành công!"; 
            $request->session()->flash('mess', ['status'=>"Xóa tác giả thành công",'name'=>'Tác giả vừa được xoá: '. $tac_gia->ten_tac_gia]);
        return redirect()->back();
            // ->with('mess', ['status'=>$mess,'name'=>'Tác giả vừa được xóa: '. $tac_gia->ten_tac_gia]);
       
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
        $request->session()->flash('mess', ['status'=>"Sứa tác giả thành công",'name'=>'Tác giả vừa được sửa: '. $tac_gia->ten_tac_gia]);
        return redirect()->back();
        //  ->with('mess', ['status'=>'Sửa tác giả thành công!',
        //                  'name'=>'Tác giả vừa được sửa: '. $tac_gia->ten_tac_gia]);
    }
    public function search(Request $request)
    {
        if($request->key)
        {
            $data = TacGiaDAO::search($request);
            $count = $request->count > 0 ? $request->count : 0;
            $request->session()->flash('search', ['status'=>"Tìm kiếm thành công",'count'=>'Tìm được: '. $count.' kết quả']);
            return view('admin.ql_tac_gia')->with('data',$data)
                                            ->with('key',$request->key); 
        }
        else
            return redirect('admin/tac-gia');
      
    }
}