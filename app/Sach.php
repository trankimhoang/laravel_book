<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sach extends Model
{
    //$table = "sach" là tên bảng trong database
    protected $table = "sach";

    public function theloai(){
        return $this->belongsTo('App\TheLoai','MaTL','ID');//(linkfile, thuoc tinh bảng khoa chính, thuộc tính khoa phụ)
    }
    public function tacgia(){
        return $this->belongsTo('App\TacGia','MaTG','ID');//(linkfile, thuoc tinh bảng khoa chính, thuộc tính khoa phụ)
    }
    // public function donhang(){
    //     return $this->belongsToMany('App\ChiTietDonHang','MaSach','ID');
    // }

    public function chitietdonhang(){
        return $this->hasMany('App\ChiTietDonHang','MaSach','ID');
    }
}

