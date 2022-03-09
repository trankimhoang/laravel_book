<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaoHang extends Model
{
    //"giaohang" là tên bảng trong database
    protected $table = "giaohang";
    public function donhang(){
        return $this->belongsTo('App\DonHang','MaDH','ID');
    }
}


