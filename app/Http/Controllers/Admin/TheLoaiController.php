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
         $request->session()->flash('mess', ['status'=>"Thêm thể loại thành công",'name'=>'thể loại vừa được thêm: '.$the_loai->ten_the_loai]);
         return redirect()->back();;
    }
    public function xoa(Request $request)
    {  
        $the_loai = TheLoaiDAO::getDataById($request);
        $the_loai->delete();
        $request->session()->flash('mess', ['status'=>"Xóa thể loại thành công",'name'=>'thể loại vừa được xoá: '. $the_loai->ten_the_loai]);
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
        $request->session()->flash('mess', ['status'=>"Sứa thể loại thành công",'name'=>'Thể loại vừa được sửa: '. $the_loai->ten_the_loai]);
        return redirect()->back();
    }
    public function search(Request $request)
    {
        if($request->key)
        {
            $data = TheLoaiDAO::search($request);
            $data->withPath(TheLoaiDAO::$url.'/search?key='.$request->key);
            $request->session()->flash('search', ['status'=>"Tìm kiếm thành công",'count'=>'Tìm được: '. $data->total().' kết quả']);
            return view('admin.ql_the_loai')->with('data',$data)
                                            ->with('key',$request->key); 
        }
        else
            return redirect('admin/the-loai');
      
    }
    public function selectAll(Request $request)
    {  
        $array_action = array('enable','disable','delete'); // Mảng các thao tác
        $array = json_decode($request->array_id); // Chuyển chuổi json thành mảng các id
        switch ($request->action) {
            case $array_action[0]: // Nếu là action enable
                $request->request->set('trang_thai',1); // Đưa trang thái về 1
                foreach($array as $id){
                    $request->request->set('id',$id);
                    $the_loai = TheLoaiDAO::updateTrangThai($request);
                    $request->session()->flash('mess', ['status'=>"Thao tác thành công",'name'=>'Kích hoạt '.count($array).' thể loại!']   );
                }
                break;
            case $array_action[1]: // Nếu là action disable
                $request->request->set('trang_thai',0); // Đưa trang thái về 0
                foreach($array as $id){
                    $request->request->set('id',$id);
                    $the_loai = TheLoaiDAO::updateTrangThai($request);
                    $request->session()->flash('mess', ['status'=>"Thao tác thành công",'name'=>'Vô hiệu hóa '.count($array).' thể loại!']   );
                 }
                break;
            case $array_action[2]: // Nếu là action delete
                    foreach($array as $id){
                        $request->request->set('id',$id);
                        $the_loai = TheLoaiDAO::xoa($request);
                        $request->session()->flash('mess', ['status'=>"Thao tác thành công",'name'=>'Đã xóa '.count($array).' thể loại!']   );
                     }
                    break;       
            default:
                break;
        }
        return redirect()->back();
    }
}
