<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    //$table = "donhang"là tên bảng trong database
    protected $table = "donhang";
    public function giaohang(){
        return $this->hasMany('App\GiaoHang','MaGH','ID');
    }

    public function khachhang(){
        return $this->belongsTo('App\KhachHang','MaKH','ID');//(linkfile, thuoc tinh bảng khoa chính, thuộc tính khoa phụ)
    }
    // public function sach(){
    //     return $this->belongsToMany('App\GiaoHang','MaGH','ID');
    // }
    public function chitietdonhang(){
        return $this->hasMany('App\ChiTietDonHang','MaDH','ID');///chua bit
    }

}


