<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NhomDich extends Model
{
    protected $table = "tb_nhom_dich";
    public $timestamps = true;
    public function nhomDichThanhVien()
    {
        return $this->hasMany('App\Models\NhomDichThanhVien');
    }
}
