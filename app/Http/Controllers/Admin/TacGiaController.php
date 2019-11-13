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
            $ten_tac_gia => 'required|max:50'
        ],[
            $ten_tac_gia.'.required'=> 'Tên tác giả không được để trống',
            $ten_tac_gia.'.max' => 'Độ dài tối đa 50 ký tự'
        ])->validate();
         $tac_gia= TacGiaDAO::them($request);
         $request->session()->flash('mess', ['status'=>"Thêm tác giả thành công",'name'=>'Tác giả vừa được thêm: '.$tac_gia->ten_tac_gia]);
         return redirect()->back();
                    
    }
    public function xoa(Request $request)
    {  
        $tac_gia = TacGiaDAO::getDataById($request);
        $tac_gia->delete();
        $request->session()->flash('mess', ['status'=>"Xóa tác giả thành công",'name'=>'Tác giả vừa được xoá: '. $tac_gia->ten_tac_gia]);
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
        $request->session()->flash('mess', ['status'=>"Sứa tác giả thành công",'name'=>'Tác giả vừa được sửa: '. $tac_gia->ten_tac_gia]);
        return redirect()->back();
    }
    public function search(Request $request)
    {
        if($request->key)
        {
            $data = TacGiaDAO::search($request);
            $data->withPath(TacGiaDAO::$url.'/search?key='.$request->key);
            $request->session()->flash('search', ['status'=>"Tìm kiếm thành công",'count'=>'Tìm được: '. $data->total().' kết quả']);
            return view('admin.ql_tac_gia')->with('data',$data)
                                            ->with('key',$request->key); 
        }
        else
            return redirect('admin/tac-gia');
      
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
                    $tac_gia = TacGiaDAO::updateTrangThai($request);
                    $request->session()->flash('mess', ['status'=>"Thao tác thành công",'name'=>'Kích hoạt '.count($array).' tác giả!']   );
                }
                break;
            case $array_action[1]: // Nếu là action disable
                $request->request->set('trang_thai',0); // Đưa trang thái về 0
                foreach($array as $id){
                    $request->request->set('id',$id);
                    $tac_gia = TacGiaDAO::updateTrangThai($request);
                    $request->session()->flash('mess', ['status'=>"Thao tác thành công",'name'=>'Vô hiệu hóa '.count($array).' tác giả!']   );
                 }
                break;
            case $array_action[2]: // Nếu là action delete
                    foreach($array as $id){
                        $request->request->set('id',$id);
                        $tac_gia = TacGiaDAO::xoa($request);
                        $request->session()->flash('mess', ['status'=>"Thao tác thành công",'name'=>'Đã xóa '.count($array).' tác giả!']   );
                     }
                    break;       
            default:
                break;
        }
        return redirect()->back();
    }
}