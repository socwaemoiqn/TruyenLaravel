<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NhomDichThanhVien extends Model
{
    protected $table = "tb_nhom_dich_thanh_vien";
    public $timestamps = true;
    public function nhomDich(){
        return $this->hasOne('App\Models\NhomDich');
    }
}
