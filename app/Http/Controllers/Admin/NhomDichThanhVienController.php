<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Models\DAO\NhomDichThanhVienDAO;
use Illuminate\Routing\Controller as BaseController;

class NhomDichThanhVienController extends BaseController
{
    public function thanhVienPage(){
        $data = NhomDichThanhVienDAO::getData();
        return view('admin.ql_nhom_dich_thanh_vien')->with('data',$data);
    }

}