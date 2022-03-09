<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietDonHang extends Model
{
    //$table="chitietdonhang" là tên bảng trong database
    protected $table="chitietdonhang";

    public function donhang()
    {
        return $this->belongsTo('App\DonHang','MaDH','ID');
    }

    public function sach()
    {
        return $this->belongsTo('App\Sach','MaSach','ID');
    }
}
