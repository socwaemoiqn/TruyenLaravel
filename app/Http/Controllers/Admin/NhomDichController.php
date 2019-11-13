<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Models\DAO\NhomDichDAO;
use App\Models\DAO\TaiKhoanDAO;
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
                $ten_nhom_dich => 'unique:tb_nhom_dich|required|max:50',
            ],[
                $ten_nhom_dich.'.unique'=> 'Tên nhóm dịch đã tồn tại',
                $ten_nhom_dich.'.required'=> 'Tên nhóm dịch không được để trống',
                $ten_nhom_dich.'.max' => 'Tên nhóm dịch có độ dài tối đa 50 ký tự'
            ])->validate();
             $nhom_dich= NhomDichDAO::them($request);
             $request->session()->flash('mess', ['status'=>"Thêm nhóm dịch thành công",'name'=>'Nhóm dịch vừa được thêm: '.$nhom_dich->ten_nhom_dich]);

         return redirect()->back();
    }
    public function xoa(Request $request)
    {  
        $nhom_dich = NhomDichDAO::getDataById($request);
        $nhom_dich->delete();
        $request->session()->flash('mess', ['status'=>"Xóa nhóm dịch thành công",'name'=>'Nhóm dịch vừa được xoá: '. $nhom_dich->ten_nhom_dich]);
        return redirect()->back();
       
    }
    public function ajax(Request $request)
    {
        return NhomDichDAO::getDataById($request);
    }
    public function sua(Request $request)
    {
        $ten_nhom_dich = 'ten_nhom_dich';
            $validator = Validator::make($request->all(),
            [
                $ten_nhom_dich => 'required|max:50'
            ],[
                $ten_nhom_dich.'.required'=> 'Tên nhóm dịch không được để trống',
                $ten_nhom_dich.'.max' => 'Tên nhóm dịch có độ dài tối đa 50 ký tự'
            ])->validate();
             $nhom_dich= NhomDichDAO::sua($request);
             $request->session()->flash('mess', ['status'=>"Sửa nhóm dịch thành công",'name'=>'Nhóm dịch vừa được sửa: '.$nhom_dich->ten_nhom_dich]);
        return redirect()->back();
    }
    public function search(Request $request)
    {
        if($request->key)
        {
            $data = NhomDichDAO::search($request);
            $data->withPath(NhomDichDAO::$url.'/search?key='.$request->key);
            $request->session()->flash('search', ['status'=>"Tìm kiếm thành công",'count'=>'Tìm được: '. $data->total().' kết quả']);
            return view('admin.ql_nhom_dich')->with('data',$data)
                                            ->with('key',$request->key); 
        }
        else
            return redirect('admin/nhom-dich');
      
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
                    $nhom_dich = NhomDichDAO::updateTrangThai($request); 
                }
                $request->session()->flash('mess', ['status'=>"Thao tác thành công",'name'=>'Kích hoạt '.count($array).' nhóm dịch!']   );
                break;
            case $array_action[1]: // Nếu là action disable
                $request->request->set('trang_thai',0); // Đưa trang thái về 0
                foreach($array as $id){
                    $request->request->set('id',$id);
                    $nhom_dich = NhomDichDAO::updateTrangThai($request);
                 }
                 $request->session()->flash('mess', ['status'=>"Thao tác thành công",'name'=>'Vô hiệu hóa '.count($array).' nhóm dịch!']   );
                break;
            case $array_action[2]: // Nếu là action delete
                    foreach($array as $id){
                        $request->request->set('id',$id);
                        $nhom_dich = NhomDichDAO::xoa($request);
                     }
                    $request->session()->flash('mess', ['status'=>"Thao tác thành công",'name'=>'Đã xóa '.count($array).' nhóm dịch!']   );
                    break;       
            default:
                break;
        }
        return redirect()->back();
    }
    public function check(Request $request)
    {
        $ten_nhom_dich = 'ten_nhom_dich';
        $validator = Validator::make($request->all(),[
            $ten_nhom_dich => 'unique:tb_nhom_dich'
        ],[
            $ten_nhom_dich.".unique" => 'Nhóm dịch này đã tồn tại'
        ]);
        if($validator->fails())
        {
            return array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            );
            // return Response::json(array(
            //     'success' => false,
            //     'errors' => $validator->getMessageBag()->toArray()
        
            // ), 400); // 400 being the HTTP code for an invalid request. 
        }
        // return Response::json(array('success' => true), 200);
        return array('success'=>true);
    }
}