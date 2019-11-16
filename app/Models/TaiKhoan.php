<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
class TaiKhoan extends Model implements Authenticatable
{
    use AuthenticableTrait;
    protected $fillable = ['email','ten_tai_khoan','mat_khau'];
    protected $table = "tb_tai_khoan";
    public $timestamps = true;
}