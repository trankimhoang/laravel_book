<?php

namespace App\Http\Controllers;

use App\DonHang;
use App\KhachHang;
use App\User;
use Illuminate\Http\Request;

class DonHangController extends Controller
{
    //
    public function getDanhSach()
    {
        $donhang=DonHang::all();
        return view('admin.donhang.danhsach',['donhang'=>$donhang]);
    }
}
