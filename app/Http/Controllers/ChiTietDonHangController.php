<?php

namespace App\Http\Controllers;

use App\ChiTietDonHang;
use Illuminate\Http\Request;

class ChiTietDonHangController extends Controller
{
    //
    public function getDanhSach()
    {
        $chitietdonhang=ChiTietDonHang::all();
        return view('admin.chitietdonhang.danhsach',['chitietdonhang'=>$chitietdonhang]);
    }
}
