<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Models\DAO\NhomDichThanhVienDAO;
use App\Models\DAO\TaiKhoanDAO;
use App\Models\DAO\NhomDichDAO;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller as BaseController;

class NhomDichThanhVienController extends BaseController
{
    public function thanhVienPage(){
        $data = NhomDichThanhVienDAO::getData();
        return view('admin.ql_nhom_dich_thanh_vien')->with('data',$data);
    }
    public function them(Request $request)
    {
        $ten_tai_khoan = 'ten_tai_khoan';
        $ten_nhom_dich = 'ten_nhom_dich';
        $tai_khoan_id = 'tai_khoan_id';
        $tai_khoan = TaiKhoanDAO::getDataByUserName($request);
        if($tai_khoan) $request->request->set('tai_khoan_id',$tai_khoan->id);
        $validator = Validator::make($request->all(),[
            $ten_tai_khoan => 'required|max:50|exists:tb_tai_khoan',
            $ten_nhom_dich => 'required|max:50|exists:tb_nhom_dich',
            $tai_khoan_id => 'unique:tb_nhom_dich_thanh_vien'
        ],[
            $ten_tai_khoan.'.required'=> 'Tên tài khoản thành viên không được để trống',
            $ten_tai_khoan.'.max' => 'Tên tài khoản thành viên độ dài tối đa 50 ký tự',
            $ten_tai_khoan.'.exists' => 'Tài khoản thành viên không tồn tại',
            $tai_khoan_id.'.unique' => 'Tài khoản này đã ở nhóm khác',
            $ten_nhom_dich.'.exists'=> 'Nhóm dịch này không tồn tại',
            $ten_nhom_dich.'.required'=> 'Tên Nhóm dịch không được để trống',
            $ten_nhom_dich.'.max' => 'Tên nhóm dịch có độ dài tối đa 50 ký tự'
        ])->validate();
        $nhom_dich = NhomDichDAO::getDataByName($request);
        $request->request->set('nhom_dich_id',$nhom_dich->id);
        $nhom_dich_tv = NhomDichThanhVienDAO::them($request);
        $request->session()->flash('mess', ['status'=>"Thêm thành viên thành công",'name'=>'Thành viên vừa được thêm: '.$request->ten_tai_khoan]);
        return redirect()->back();
    }
    public function ajax(Request $request)
    {
        return NhomDichThanhVienDAO::getDataById($request);
    }
    public function sua(Request $request)
    {
        $ten_nhom_dich = 'ten_nhom_dich';
        $validator = Validator::make($request->all(),[
            $ten_nhom_dich => 'required|max:50|exists:tb_nhom_dich'
        ],[
            $ten_nhom_dich.'.exists'=> 'Nhóm dịch này không tồn tại',
            $ten_nhom_dich.'.required'=> 'Tên Nhóm dịch không được để trống',
            $ten_nhom_dich.'.max' => 'Tên nhóm dịch có độ dài tối đa 50 ký tự'
        ])->validate();
        $nhom_dich = NhomDichDAO::getDataByName($request);
        // Thiếu mã vai trò
        $request->request->set('nhom_dich_id',$nhom_dich->id);
        $nhom_dich_tv = NhomDichThanVienDAO::sua($request);
        $request->session()->flash('mess', ['status'=>"Sửa thành viên thành công",
        'name'=>'Thành viên vừa được sửa: '.$request->ten_tai_khoan]);
        return redirect()->back();
    }
    public function xoa(Request $request)
    {
        $nhom_dich_tv = NhomDichThanhVienDAO::getDataById($request);
        $ten_nhom_dich = $nhom_dich_tv->ten_nhom_dich;
        $ten_tai_khoan = $nhom_dich_tv->ten_tai_khoan;
        $nhom_dich_tv->delete();
        $request->session()->flash('mess', ['status'=>"Xóa thành viên thành công",'name'=>'Thành viên '.$ten_tai_khoan.' vừa được xóa ra khỏi nhóm dịch '.$ten_nhom_dich]);
        return redirect()->back();   
    }
    public function search(Request $request)
    {
        if($request->key)
        {
            $data = NhomDichThanhVienDAO::search($request);
            $data->withPath(NhomDichThanhVienDAO::$url."/search?key=".$request->key);
            $request->session()->flash('search', ['status'=>"Tìm kiếm thành công",'count'=>'Tìm được: '. $data->total().' kết quả']);
            return view('admin.ql_nhom_dich_thanh_vien')->with('data',$data)
                                                        ->with('key',$request->key);
        }
        else
            return redirect('admin/nhom-dich/thanh-vien');
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
                    $nhom_dich_tv = NhomDichThanhVienDAO::updateTrangThai($request);
                    $request->session()->flash('mess', ['status'=>"Thao tác thành công",'name'=>'Kích hoạt '.count($array).' thành viên!']   );
                }
                break;
            case $array_action[1]: // Nếu là action disable
                $request->request->set('trang_thai',0); // Đưa trang thái về 0
                foreach($array as $id){
                    $request->request->set('id',$id);
                    $nhom_dich_tv = NhomDichThanhVienDAO::updateTrangThai($request);
                    $request->session()->flash('mess', ['status'=>"Thao tác thành công",'name'=>'Vô hiệu hóa '.count($array).' thành viên!']   );
                 }
                break;
            case $array_action[2]: // Nếu là action delete
                    foreach($array as $id){
                        $request->request->set('id',$id);
                        $nhom_dich_tv = NhomDichThanhVienDAO::xoa($request);
                        $request->session()->flash('mess', ['status'=>"Thao tác thành công",'name'=>'Đã xóa '.count($array).' thành viên!']   );
                     }
                    break;       
            default:
                break;
        }
        return redirect()->back();
    }
}