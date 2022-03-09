<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    //"khachhang" là tên bảng trong database
    protected $table = "khachhang";
    public function donhang(){
        return $this->hasMany('App\DonHang','MaKH','ID');
    }
}


