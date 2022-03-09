<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
    //"theloai" là tên bảng trong database
    protected $table = "theloai";// ten bảng viết thường

    public function sach(){
        return $this->hasMany('App\Sach','MaSach','ID');
    }
}


