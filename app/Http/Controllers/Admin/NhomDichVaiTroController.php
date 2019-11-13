<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\DAO\NhomDichVaiTroDAO;
use Illuminate\Routing\Controller as BaseController;

class NhomDichVaiTroController extends BaseController
{
    public function nhomDichVaiTroPage(){
        $data = NhomDichVaiTroDAO::getData();
        return view('admin.ql_nhom_dich_vai_tro')->with('data',$data);
    }
    public function them(Request $request){
        $ten_vai_tro = 'ten_vai_tro';
        $validator = Validator::make($request->all(),
        [
            $ten_vai_tro => 'required|max:50'
        ],[
            $ten_vai_tro.'.required'=> 'Tên vai trò không được để trống',
            $ten_vai_tro.'.max' => 'Độ dài tối đa 50 ký tự'
        ])->validate();
         $vai_tro= NhomDichVaiTroDAO::them($request);
         $request->session()->flash('mess', ['status'=>"Thêm vai trò thành công",'name'=>'Vai trò vừa được thêm: '.$vai_tro->ten_vai_tro]);
         return redirect()->back();
                    
    }
    public function xoa(Request $request)
    {  
        $vai_tro = NhomDichVaiTroDAO::getDataById($request);
        $vai_tro->delete();
        $request->session()->flash('mess', ['status'=>"Xóa vai trò thành công",'name'=>'Vai trò vừa được xoá: '. $vai_tro->ten_vai_tro]);
        return redirect()->back();
       
    }
    public function ajax(Request $request)
    {
        return NhomDichVaiTroDAO::getDataById($request);
    }
    public function sua(Request $request)
    {
        $ten_vai_tro = 'ten_vai_tro';
        $validator = Validator::make($request->all(), [
            $ten_vai_tro => 'required|max:50'
        ],[
            $ten_vai_tro.'.required' => 'Tên vai trò không được để trống',
            $ten_vai_tro.'.max' => 'Độ dài tối đa 50 ký tự'
        ])->validate();
        $vai_tro = NhomDichVaiTroDAO::sua($request);
        $request->session()->flash('mess', ['status'=>"Sứa vai trò thành công",'name'=>'vai trò vừa được sửa: '. $vai_tro->ten_vai_tro]);
        return redirect()->back();
    }
    public function search(Request $request)
    {
        if($request->key)
        {
            $data = NhomDichVaiTroDAO::search($request);
            $data->withPath(NhomDichVaiTroDAO::$url.'/search?key='.$request->key);
            $request->session()->flash('search', ['status'=>"Tìm kiếm thành công",'count'=>'Tìm được: '. $data->total().' kết quả']);
            return view('admin.ql_nhom_dich_vai_tro')->with('data',$data)
                                            ->with('key',$request->key); 
        }
        else
            return redirect('admin/nhom-dich/vai-tro');
      
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
                    $vai_tro = NhomDichVaiTroDAO::updateTrangThai($request);
                    $request->session()->flash('mess', ['status'=>"Thao tác thành công",'name'=>'Kích hoạt '.count($array).' vai trò!']   );
                }
                break;
            case $array_action[1]: // Nếu là action disable
                $request->request->set('trang_thai',0); // Đưa trang thái về 0
                foreach($array as $id){
                    $request->request->set('id',$id);
                    $vai_tro = NhomDichVaiTroDAO::updateTrangThai($request);
                    $request->session()->flash('mess', ['status'=>"Thao tác thành công",'name'=>'Vô hiệu hóa '.count($array).' vai trò!']   );
                 }
                break;
            case $array_action[2]: // Nếu là action delete
                    foreach($array as $id){
                        $request->request->set('id',$id);
                        $vai_tro = NhomDichVaiTroDAO::xoa($request);
                        $request->session()->flash('mess', ['status'=>"Thao tác thành công",'name'=>'Đã xóa '.count($array).' vai trò!']   );
                     }
                    break;       
            default:
                break;
        }
        return redirect()->back();
    }
}