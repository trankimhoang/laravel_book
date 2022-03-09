<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TacGia extends Model
{
    //"tacgia" là tên bảng trong database
    protected $table = "tacgia";

    public function sach(){
        return $this->hasMany('App\Sach','MaSach','ID');
    }

}


