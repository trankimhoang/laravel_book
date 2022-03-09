<?php

namespace App\Http\Controllers;

use App\GiaoHang;
use App\KhachHang;
use Illuminate\Http\Request;

class GiaoHangController extends Controller
{
    //
    public function getDanhSach()
    {
        $giaohang=GiaoHang::all();
        return view('admin.giaohang.danhsach',['giaohang'=>$giaohang]);
    }
}
