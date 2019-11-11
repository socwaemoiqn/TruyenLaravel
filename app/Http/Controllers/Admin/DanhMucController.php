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
         $request->session()->flash('mess', ['status'=>"Thêm danh mục thành công",'name'=>'Danh mục vừa được thêm: '.$danh_muc->ten_danh_muc]);
         return redirect()->back();;
    }
    public function xoa(Request $request)
    {  
        $danh_muc = DanhMucDAO::getDataById($request);
        if(DanhMucDAO::xoa($request))
            $mess = "Xóa danh mục thành công!";
        else      
            $mess = "Xóa danh mục không thành công!"; 
            $request->session()->flash('mess', ['status'=>"Xóa danh mục thành công",'name'=>'danh mục vừa được xoá: '. $danh_muc->ten_danh_muc]);
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
        $request->session()->flash('mess', ['status'=>"Sứa danh mục thành công",'name'=>'danh mục vừa được sửa: '. $danh_muc->ten_danh_muc]);
        return redirect()->back();
    }
    public function search(Request $request)
    {
        if($request->key)
        {
            $data = DanhMucDAO::search($request);
            $data->withPath(DanhMucDAO::$url.'/search?key='.$request->key);
            $request->session()->flash('search', ['status'=>"Tìm kiếm thành công",'count'=>'Tìm được: '. $data->total().' kết quả']);
            return view('admin.ql_danh_muc')->with('data',$data)
                                            ->with('key',$request->key); 
        }
        else
            return redirect('admin/danh-muc');
      
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
                    $danh_muc = DanhMucDAO::updateTrangThai($request);
                    $request->session()->flash('mess', ['status'=>"Thao tác thành công",'name'=>'Kích hoạt '.count($array).' danh mục!']   );
                }
                break;
            case $array_action[1]: // Nếu là action disable
                $request->request->set('trang_thai',0); // Đưa trang thái về 0
                foreach($array as $id){
                    $request->request->set('id',$id);
                    $danh_muc = DanhMucDAO::updateTrangThai($request);
                    $request->session()->flash('mess', ['status'=>"Thao tác thành công",'name'=>'Vô hiệu hóa '.count($array).' danh mục!']   );
                 }
                break;
            case $array_action[2]: // Nếu là action delete
                    foreach($array as $id){
                        $request->request->set('id',$id);
                        $danh_muc = DanhMucDAO::xoa($request);
                        $request->session()->flash('mess', ['status'=>"Thao tác thành công",'name'=>'Đã xóa '.count($array).' danh mục!']   );
                     }
                    break;       
            default:
                break;
        }
        return redirect()->back();
    }
}